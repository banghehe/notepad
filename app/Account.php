<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = "account";
    protected $fillable = ['name' , 'email' , 'password','updated_at','created_at'];
}
