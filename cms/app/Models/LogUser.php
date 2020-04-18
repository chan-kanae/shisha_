<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// 多対多リレーション拡張
// class LogUser extends Pivot
class LogUser extends Model
{
    protected $table = 'log_user'; // テーブル名を定義
}