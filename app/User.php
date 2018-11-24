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

    protected function checkEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    protected function storeRecord($request)
    {
        $user = new User();

        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->password = bcrypt($user->email);
        $user->user_type = $request->get('user_type');
        $user->purchases = $request->get('purchases');
        $user->dni_type = $request->get('dni_type');
        $user->dni = $request->get('dni');
        $user->notes = $request->get('notes');

        $user->save();

        $address = new Address();

        $address->address1 = $request->get('address');
        $address->address2 = $request->get('address2');
        $address->city = $request->get('city');
        $address->state = $request->get('state');
        // $address->zip = $request->get('zip');

        $user->address()->save($address);

        $phone = new Phone();

        $phone->phone = $request->get('phone');

        $user->phone()->save($phone);

        $user->assignRole(config('constants.userRolesString')[$user->user_type]);

        return $user;        
    }

    protected function updateRecord($request, $user)
    {
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->user_type = $request->get('user_type');
        $user->purchases = $request->get('purchases');
        $user->dni_type = $request->get('dni_type');
        $user->dni = $request->get('dni');
        $user->notes = $request->get('notes');

        $user->save();

        $address = new Address();
        $address->address1 = $request->get('address');
        $address->address2 = $request->get('address2');
        $address->city = $request->get('city');
        $address->state = $request->get('state');
        // $address->zip = $request->get('zip');

        $user->address()->save($address);

        $phone = $user->phone;
        if ($phone) {
            $phone->phone = $request->get('phone');

            $user->phone()->save($phone);            
        }

        $user->syncRoles(config('constants.userRolesString')[$user->user_type]);

        return $user;
    }

}
