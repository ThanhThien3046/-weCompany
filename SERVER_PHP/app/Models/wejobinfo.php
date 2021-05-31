<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class wejobinfo extends Model
{
    protected $table = 'wejobinfo';

    protected $fillable = [
        'id', 
        'job_content', 
        'branch_id'
    ];  
}
