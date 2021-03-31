<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestTime extends Model
{
    protected $table = 'request_times';

    public $timestamps = false;

    protected $fillable = ['id', 'at_time', 'router', 'method', 'referer', 'uri' ,'route', 'request_id'];
}
