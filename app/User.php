<?php

namespace App;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

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

    /**
     * Access all the transfers for the user
     *
     *
     * @return  \App\Transfer
     */
    public function getTransfers()
    {
        $id = $this->attributes['id'];
        $sender = Transfer::where('sender_id', $id)->get();
        $i = $sender->count();
        Transfer::where('recipient_id', $id)->each(function ($send) use ($sender, $i) {
            $sender[$i] = $send;
            $i++;
        });
        return $sender;
//        return Transfer::all();
//        return \App\Transfer::where('recipient_id', $this->id)->where('sender_id', $this->id);
    }
}
