<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [
        'insurance_id',
        'product_name',
        'product_code'
    ];
}
