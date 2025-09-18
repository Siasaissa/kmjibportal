<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TiraCallback extends Model
{
    use HasFactory;
    protected $table = 'tira_callbacks';

    protected $fillable = [
        'raw_data',
    ];
}
