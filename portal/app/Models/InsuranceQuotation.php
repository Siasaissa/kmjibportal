<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceQuotation extends Model
{
    use HasFactory;

    protected $table = 'insurance_quotations';
    protected $guarded = [];

    protected $casts = [
        // Dates
        'created_date' => 'datetime',
        'start_date' => 'date',
        'end_date' => 'date',
        'date_of_birth' => 'date',

        // Booleans
        'fronting_business' => 'boolean',
        'non_renewable' => 'boolean',
        'enable' => 'boolean',
        'apply_depreciation' => 'boolean',
        'terms_accepted' => 'boolean',

        // Integers
        'no_of_days' => 'integer',
        'seat_capacity' => 'integer',
        'registration_year' => 'integer',
        'number_of_axles' => 'integer',

        // Numeric/Decimal fields
        'accessories_sum_insured' => 'decimal:2',
        'windscreen_sum_insured' => 'decimal:2',
        'windscreen_premium' => 'decimal:2',
        'short_period_percentage' => 'decimal:2',
        'override_percentage' => 'decimal:2',
        'tppd_sum_insured' => 'decimal:2',
        'tppd_increase_limit' => 'decimal:2',
        'sum_insured' => 'decimal:2',
        'actual_premium' => 'decimal:2',
        'adjust_premium' => 'decimal:2',
        'discount_percentage' => 'decimal:2',
        'total_premium' => 'decimal:2',
    ];

    protected $fillable = [
        // Customer Information
        'insurance_type',
        'client_name',
        'address',
        'tin_number',
        'vrn_number',
        'id_type',
        'id_number',
        'date_of_birth',
        'customer_type',

        // Product Information
        'insurer',
        'period',
        'start_date',
        'end_date',
        'currency',
        'business_contact_person',
        'no_of_days',
        'file_no',
        'branch',
        'fleet_type',
        'motor_type',
        'policy_type',
        'previous_quote',
        'loss_ratio_forecast',
        'business_type',
        'business_by',
        'borrower_type',
        'first_loss_payee',
        'bind_collateral',
        'collateral_name',
        'fronting_business',
        'non_renewable',
        'fleet_id',
        'fleet_seq',

        // Risk Details
        'registration_no',
        'chassis_number',
        'engine_number',
        'vehicle_make',
        'vehicle_model',
        'body_type',
        'insurance_class',
        'fuel_type',
        'seat_capacity',
        'color',
        'owner_category',
        'cc',
        'registration_year',
        'accessories_sum_insured',
        'accessories_info',
        'windscreen_sum_insured',
        'windscreen_premium',
        'number_of_axles',
        'short_period_percentage',
        'override_percentage',
        'tppd_sum_insured',
        'tppd_increase_limit',
        'enable',
        'apply_depreciation',

        // Premium Calculation
        'sum_insured',
        'actual_premium',
        'adjust_premium',
        'discount_percentage',
        'total_premium',
        'payment_method',

        // Finalization
        'additional_notes',
        'terms_accepted',

        // System Generated
        'reference_number',
        'created_date',
    ];


    public function documents()
    {
        return $this->hasMany(QuotationDocument::class, 'quotation_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($quotation) {
            $quotation->reference_number = 'RN-' . date('Y') . '-' . str_pad(static::count() + 1, 5, '0', STR_PAD_LEFT);
            $quotation->created_date = now();
        });
    }

public function receipt()
{
    return $this->hasOne(Receipt::class);
}

}
