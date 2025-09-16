<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Coverage;
use App\Models\Addon;
use App\Models\User;
use App\Models\Insurance;
use App\Models\Receipt;
use App\Models\Motor;

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
        'addon_id', // optional — keep only if you actually store a primary addon in quotations
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

    protected $casts = [
        'valid_from' => 'datetime',
        'valid_to' => 'datetime',
        'total_premium' => 'decimal:2',
        'commission_paid' => 'decimal:2',
        'commission_rate' => 'decimal:4',
    ];

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // A quotation normally has many coverage items (risks)
    public function coverages()
    {
        return $this->hasMany(Coverage::class);
    }

    // A quotation can have multiple addons
    public function addons()
    {
        return $this->hasMany(Addons::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function insurance()
    {
        return $this->belongsTo(Insurance::class);
    }

    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class);
    }
}
