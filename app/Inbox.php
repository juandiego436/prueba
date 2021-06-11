<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = ['from','message','subject','status','user_id'];
    protected $dates = ['created_at','updated_at'];
}
