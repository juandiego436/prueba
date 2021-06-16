<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Inbox extends Model
{
    use Notifiable;
    protected $fillable = ['from','message','subject','status','user_id'];
    protected $dates = ['created_at','updated_at'];
    protected $appends = ['date_formatted'];

    public function getDateFormattedAttribute()
    {
        return $this->created_at ? $this->created_at->diffforHumans() : null;
    }

    public function status()
    {
        switch($this->status)
        {
            case 'send':
                return '<span class="badge bg-success">Enviado</span>';
                break;
            case 'fail':
                return '<span class="badge bg-danger">Error</span>';
                break;
            default:
                 return '<span class="badge bg-primary">pendiente</span>';
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
