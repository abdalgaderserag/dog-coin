<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $fillable = [
        'sender_id', 'recipient_id', 'amount',
    ];

    public function sender()
    {
        return $this->belongsTo('App\User', 'sender_id', 'id');
    }

    public function recipient()
    {
        return $this->belongsTo('App\User', 'recipient_id', 'id');
    }
}
