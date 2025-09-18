<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'region_code',
        'region',
        'district_code',
        'district',
        
    ];
}
