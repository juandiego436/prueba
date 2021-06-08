<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, SoftDeletes;
    protected $fillable = ['name','email','phone','dni','city_id'];
    protected $dates = ['date_birth','created_at','updated_at','deleted_at'];
    protected $hidden = ['password'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
