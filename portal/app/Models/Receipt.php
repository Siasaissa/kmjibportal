<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'premium_amount',
        'premium_currency',
        'payment_mode',
        'reference_no',
        'issuer_bank',
        'collecting_bank',
        'amount',
        'currency',
        'exchange_rate',
        'equivalent_amount',
        'receipt_date'
    ];

    protected $casts = [
        'premium_amount' => 'decimal:2',
        'amount' => 'decimal:2',
        'exchange_rate' => 'decimal:4',
        'equivalent_amount' => 'decimal:2',
        'receipt_date' => 'datetime'
    ];

    protected $attributes = [
        'exchange_rate' => 1.0,
    ];

    // Relationship to InsuranceQuotation
public function quotation()
{
    return $this->belongsTo(InsuranceQuotation::class);
}


    // Automatically set equivalent amount if not provided
    protected static function booted()
    {
        static::saving(function ($receipt) {
            if (empty($receipt->equivalent_amount)) {
                $receipt->equivalent_amount = $receipt->amount * $receipt->exchange_rate;
            }
        });
    }

}