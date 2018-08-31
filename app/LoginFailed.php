<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginFailed extends Model
{
    protected $fillable = [
        'email',
        'password',
    ];
}
