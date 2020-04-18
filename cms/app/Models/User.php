<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function logs(){
        return $this->belongsToMany('App\Models\Log',
        'log_user',
        'user_id',
        'log_id')
        ->withPivot('id')
        ->orderBy('pivot_id', 'desc');
    }

    public function log(){
        return $this->hasMany(Log::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
