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

    public function getMoneyAttribute()
    {
//        $cents = $this->attributes['cents'];
//        if ($cents == 0)
//            $cents = '00';
//        elseif ($cents % 10 == 0)
//            $cents = $cents . '0';
//        return $this->attributes['money'] . '.' . $cents;
        return floatval($this->attributes['money'])/100;
    }

    /*public function setMoneyAttribute($value)
    {
        $money = explode('.', $value, 1);
        $this->attributes['money'] = $this->attributes['money'] - (int)$money[0];
        $this->attributes['cents'] = $this->attributes['cents'] - (int)$money[1];
    }*/

}
