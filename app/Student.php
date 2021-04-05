<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public $table = "students";
   	public $timestamps = false;
   	
    protected $fillable = 
    [
        'name', 'last_name', 'age', 'date_of_birth', 'phone_number', 'password'
    ];
    
    	protected $reg =
    [
    		'password'
    ];
}
