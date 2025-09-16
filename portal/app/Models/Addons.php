<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addons extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'addon_code',
        'addon_name',
        'rate',
        'minimum_amount',
        'amount',
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }
}
