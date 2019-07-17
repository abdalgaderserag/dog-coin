<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'listed_id'
    ];

    public function recipient()
    {
        return $this->belongsTo('App\User','listed_id','id');
    }
}
