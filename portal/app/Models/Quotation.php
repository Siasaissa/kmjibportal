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
    public function coverages()
    {
        return $this->hasMany(Coverage::class, 'quotation_id', 'id');
    }

    // 2️⃣ One quotation has one receipt
    public function receipt()
    {
        return $this->hasOne(Receipt::class, 'quotation_id', 'id');
    }

    // 3️⃣ One quotation has one motor
    public function motor()
    {
        return $this->hasOne(Motor::class, 'quotation_id', 'id');
    }

    // 4️⃣ One quotation has one addon (if needed)
    public function addon()
    {
        return $this->hasOne(Addons::class, 'quotation_id', 'id');
    }

    // 5️⃣ One quotation belongs to one customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    // 6️⃣ One quotation belongs to one insurance
    public function insurance()
    {
        return $this->belongsTo(Insurance::class, 'insurance_id', 'id');
    }
}
