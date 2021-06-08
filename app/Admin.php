<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = ['name','email'];
    protected $dates = ['created_at','updated_at'];
    protected $hidden = ['password'];

}
