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
}
