<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

    public function motors()
    {
        return $this->hasMany(Motor::class);
    }
}
