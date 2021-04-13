<?php

namespace App\Models;

use App\Helpers\SupportString;
use Illuminate\Database\Eloquent\Model;

class Iplogin extends Model
{
    protected $table = 'iplogins';

    protected $fillable = ['id', 'ip', 'block', 'mail' ];
}
