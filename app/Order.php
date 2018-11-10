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

        $order->user_id = auth()->user()->id;
        $order->products = json_encode($shoppingCart);
        $order->sub_total = 0;

        foreach ($shoppingCart as $key => $productArray) {
            $product = Product::getProductById(key($productArray));
            if (!$product) {
                break;
            }
            $order->sub_total += $product->price * reset($productArray);
            $product->update([
                'quantity' => $product->quantity
            ]);
        }

        $order->shipping = 10000;
        $order->total = $order->sub_total + $order->shipping;
        $order->status = config('constants.transactions.frontEnd')[0];
        $order->save();

        $subject = "Confirmación de pedido: ".$order->number;

        $content = "<h4>Pedido: #$order->number</h4>".
            "<h4 style='font-weight: normal;'>Solicitado por: ".auth()->user()->full_name."<br>";

        if (auth()->user()->dni_type) {
            $content .= "Tipo de documento: ".auth()->user()->dni_type."<br>".
            "Número de documento: ".auth()->user()->dni."<br>";
        }

        if (auth()->user()->phone) {
            $content .= "# Contacto: ".auth()->user()->phone->phone."<br>";
        }            
            
        if (auth()->user()->address) {
            $content .= "Dirección de entrega: <br>".
                "&nbsp;&nbsp;&nbsp;Dirección:".auth()->user()->address->full_address."<br>".
                "&nbsp;&nbsp;&nbsp;Municipio:".auth()->user()->address->city."<br>".
                "&nbsp;&nbsp;&nbsp;Departamento:".auth()->user()->address->state."<br>";
        }
        $content .= "</h4>";

        Utilities::sendConfirmationOrder(auth()->user(), $subject, $content, $shoppingCart);

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
}
