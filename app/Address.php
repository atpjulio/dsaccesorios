<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address_country',
        'address_state',
        'address_city',
        'address_1',
        'address_2',
    ];
    /**
     * Relations
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
