<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{
    protected $fillable = [
        'website_id',
        'visitor_ip',
        'timestamp',
        'user_agent',
    ];
}
