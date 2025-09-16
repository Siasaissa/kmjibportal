<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'coverage_id',
        'insurance_id',
        'user_id',
        'receipt_id',
        'motor_id',
        'quotation_number',
        'total_premium',
        'valid_from',
        'valid_to',
        'status',
        'officer_name',
        'officer_title',
        'product_code',
        'payment_mode',
        'currency_code',
        'exchange_rate',
        'commission_paid',
        'commission_rate',
        'endorsement_type',
        'endorsement_reason',
        'endorsement_premium_earned'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function coverage()
    {
        return $this->hasMany(Coverage::class);
    }

    public function addons()
    {
        return $this->hasMany(Addon::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
