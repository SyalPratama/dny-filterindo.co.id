<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitors';

    protected $fillable = [
        'ip_address',

        'browser',
        'browser_version',

        'platform',
        'platform_version',

        'device',

        'is_mobile',
        'is_tablet',
        'is_desktop',
        'is_robot',

        'user_agent',
    ];


    protected $casts = [
        'is_mobile' => 'boolean',
        'is_tablet' => 'boolean',
        'is_desktop' => 'boolean',
        'is_robot' => 'boolean',
    ];
}