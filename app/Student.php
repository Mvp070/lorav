<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	public $table = "students";
   	public $timestamps = false;
   	
    protected $fillable = 
    [
        'name', 'lokal_name', 'age',
    ];
}
