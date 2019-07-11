<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'money', 'ID'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
