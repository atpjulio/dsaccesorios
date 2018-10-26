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
        }

        // TODO: Update product inventory

        $order->shipping = 10000;
        $order->total = $order->sub_total + $order->shipping;
        $order->status = config('constants.transactions.frontEnd')[0];

        $order->save();

        return $order;
    }
}
