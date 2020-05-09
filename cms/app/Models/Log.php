<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function users(){
        return $this->belongsToMany('App\Models\User',
        'log_user',
        'log_id',
        'user_id')
        // ->using('users_id')
        ->withPivot('id')
        ->orderBy('pivot_id', 'desc');
    }

    public function userss(){
        return $this->belongsTo(User::class);
    }


}
