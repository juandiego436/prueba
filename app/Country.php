<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name'];
    protected $dates = ['created_at','updated_at'];

    public function city()
    {
        return $this->hasMany(City::class);
    }
}
