<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coverage extends Model
{
    use HasFactory;

    protected $fillable = [
    'quotation_id',
    'risk_code',
    'risk_name',
    'sum_insured',
    'sum_insured_equivalent',
    'rate',   // <-- keep as rate
    'premium_before_discount',
    'premium_after_discount',
    'premium_excluding_tax_equivalent',
    'premium_including_tax',
    'discounts_offered',
    'taxes_charged',
];


    protected $casts = [
        'discounts_offered' => 'array',
        'taxes_charged' => 'array',
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }
}
