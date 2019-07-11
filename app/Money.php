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
        if ((int)$key < 9999) {
            $dec = (float)$key - (int)$key;
            if ($dec === 0)
                return $key . '.00';
            $dec = (float)$dec * 10 - (int)$dec * 10;
            if ($dec > 0)
                return $key . '0';
        }

        return (int) $key;
    }

    public function setMoneyAttribute(float $value)
    {
        $this->attributes['money'] = $value;
    }

}
