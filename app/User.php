<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'pin',
        'user_type',
        'purchases',
        'picture',
        'notes',
        'dni',
        'dni_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Attritbutes
     */
    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * Relations
     */
    public function creditCard()
    {
        return $this->hasOne(CreditCard::class, 'user_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'user_id');
    }

    public function phone()
    {
        return $this->hasOne(Phone::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    protected function updateProfile($request)
    {
        $user = $this->find(auth()->user()->id);

        if ($user) {
            $user->password = bcrypt($request->get('password'));
            $user->save();
        }

        return $user;
    }

}
