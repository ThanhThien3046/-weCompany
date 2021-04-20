<?php

namespace App\Models;

use App\Helpers\SupportString;
use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    protected $table = 'recruits';

    protected $fillable = ['id', 'title', 'content', 'branch_id', 'show'];

}
