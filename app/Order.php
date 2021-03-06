<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'products',
        'sub_total',
        'shipping',
        'tax',
        'total',
        'status',
        'transaction_id',
        'trazability_code',
        'response_code',
        'extra_parameters',
        'card_number',
        'card_name',
        'exp_month',
        'exp_year',
        'cvv_number',
        'address_country',
        'address_state',
        'address_city',
        'address_1',
        'address_2',
        'phone',
        'notes',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Relations
     */     
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Dynamic attributes
     */     
    public function getNumberAttribute()
    {
        return sprintf("%09d", $this->id);
    }

    public function getFullAddressAttribute()
    {
        return $this->address_1.' '.$this->address_2;
    }

    public function getCreatedAtFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->created_at)->format("d/m/Y");
    }

    /**
     * Methods
     */     
    protected function getOrdersByUserId($id)
    {
        return $this->where('user_id', $id)
            ->get();
    }

    protected function storeRecord($shoppingCart)
    {
        $order = new Order();

        $user = auth()->user();
        $order->user_id = $user->id;
        $order->products = json_encode($shoppingCart);
        $order->sub_total = 0;

        foreach ($shoppingCart as $key => $productArray) {
            $product = Product::getProductById(key($productArray));
            if (!$product) {
                break;
            }
            $order->sub_total += $product->price * reset($productArray);
            $product->update([
                'quantity' => $product->quantity - reset($productArray)
            ]);
        }

        if ($user->phone) {
            $order->phone = $user->phone->phone;
        }            
            
        if ($user->address) {
            $order->address_1 = $user->address->address1;
            $order->address_2 = $user->address->address2;
            $order->address_city = $user->address->city;
            $order->address_state = $user->address->state;
        }
        $order->shipping = 0;
        $order->total = $order->sub_total + $order->shipping;
        $order->status = config('constants.transactions.status.unpaid');
        $order->save();

        $subject = "Confirmación de pedido: ".$order->number;

        $content = "<h4>Pedido: #$order->number</h4>".
            "<h4 style='font-weight: normal;'>Solicitado por: ".$user->full_name."<br>";

        if ($user->dni_type) {
            $content .= "Tipo de documento: ".$user->dni_type."<br>".
            "Número de documento: ".$user->dni."<br>";
        }

        if ($user->phone) {
            $content .= "# Contacto: ".$user->phone->phone."<br>";
        }            
            
        if ($user->address) {
            $content .= "Dirección de entrega: <br>".
                "&nbsp;&nbsp;&nbsp;Dirección:".$user->address->full_address."<br>".
                "&nbsp;&nbsp;&nbsp;Municipio:".$user->address->city."<br>".
                "&nbsp;&nbsp;&nbsp;Departamento:".$user->address->state."<br>";                
        }
        $content .= "</h4><strong>NOTA:</strong> El precio del envío será actualizado al momento de procesar su compra<br><br>";

        Utilities::sendConfirmationOrder($user, $subject, $content, $shoppingCart);

        $subject = "Nueva compra! Pedido #: ".$order->number;

        $content = "<h3>Fecha de solicitud: ".\Carbon\Carbon::now()->format("d/m/Y")."</h3>".$content;
        $content .= "Ingresa a tu sesión para ver los detalles del pedido<br>".
            env("APP_URL")."/login";

        $admin = User::checkEmail(config('constants.emails.admin'));
        if ($admin) {
            Utilities::sendEmail($admin->toArray(), $subject, $content);
        }

        return $order;
    }

    protected function updateRecord($request, $id)
    {
        $order = $this::find($id);
        if (!$order) {
            return null;
        }

        $order->shipping = $request->get('shipping');
        $order->total = $request->get('total');
        $order->status = $request->get('status');
        $order->address_1 = $request->get('full_address');
        $order->address_city = $request->get('address_city');
        $order->address_state = $request->get('address_state');
        $order->phone = $request->get('order_phone');
        $order->notes = $request->get('notes');

        $user = $order->user;

        if ($user and $order->status == config('constants.transactions.status.paid')) {
            $user->update([
                'purchases' => ++$user->purchases
            ]);
        }

        $order->save();
    }

}
