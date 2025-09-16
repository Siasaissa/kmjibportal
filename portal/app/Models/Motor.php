<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'chassis_number',
        'make',
        'model',
        'year_of_manufacture',
        'value',
        'insurance_id',
    ];

    protected $casts = [
        'year_of_manufacture' => 'integer',
        'value' => 'decimal:2',
    ];

    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }
}
