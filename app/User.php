<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function money()
    {
        return $this->hasOne('App\Money');
    }

    public function favorite()
    {
        return $this->hasMany('App\Favorite');
    }


    /**
     * Access all the transfers for the user
     *
     *
     * @return  \App\Transfer
     */
    public function getTransfers()
    {
        $id = $this->attributes['id'];
        $sender = Transfer::where('sender_id', $id)->with('sender', 'recipient')->get();
//        $i = $sender->count();
//        Transfer::where('recipient_id', $id)->each(function ($send) use ($sender, $i) {
//            $sender[$i] = $send;
//            $i++;
//        });
        return $sender;
    }

    public function bio()
    {
        return $this->hasOne('App\Bio');
    }
}
