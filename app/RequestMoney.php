<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestMoney extends Model
{
    protected $fillable = [
        'user_id',
        'recipient_id',
        'money',
        'details',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function recipient()
    {
        return $this->belongsTo('App\User','recipient_id','id');
    }
}
