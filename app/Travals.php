<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travals extends Model
{
    public $table = "ticket";
    public $timestamps=false;
    protected $fillable=
    [
    	'from', 'to','price','from_id','from_data','back_id','back_data'
    ];
}
