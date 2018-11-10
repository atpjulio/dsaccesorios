<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'address1',
        'address2',
        'city',
        'country',
        'state',
    ];
    
    /**
     * Relations
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    /**
     * Dynamic attributes
     */
    public function getFullAddressAttribute()
    {
        return $this->address1.' '.$this->address2;
    }
}
