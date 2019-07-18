<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    protected $fillable = [
        'details', 'work', 'company', 'work_address', 'site',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
