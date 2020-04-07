<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function users(){
        return $this->belongsToMany('App\Models\User','log_user','log_id','user_id');
        // return $this->belongsToMany('App\Models\User')->using('App\Models\LogUser');
    }
}
