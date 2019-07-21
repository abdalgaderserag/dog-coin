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
        'money', 'creditCardNumber'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $hidden = [
        'bits'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getMoneyAttribute($key)
    {
        return (double) $key;
    }

    public function setMoneyAttribute(float $value)
    {
        $this->attributes['money'] = $value;
    }

}
