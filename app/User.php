<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class test extends Authenticatable
{
   
    pyblic $table = "test"; 
    protected $fillable = 
    [
        'name', 'lokal_name', 'age',
    ];

}
