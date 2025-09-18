<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    // Table name (optional because Laravel will automatically use 'quotations')
    protected $table = 'quotations';

    // Mass assignable fields
    protected $fillable = [
        'cover_note_type_id',
        'customer_id',
        'coverage_id',
        'sale_point_code',
        'cover_note_desc',
        'operative_clause',
        'cover_note_start_date',
        'cover_note_end_date',
        'payment_mode',
        'currency_code',
        'exchange_rate',
        'total_premium_excluding_tax',
        'total_premium_including_tax',
        'commission_paid',
        'commission_rate',
        'officer_name',
        'officer_title',
        'product_code',
        'cover_note_reference',
        'sum_insured',
        'sum_insured_equivalent',
        'premium_rate',
        'premium_before_discount',
        'premium_after_discount',
        'premium_excluding_tax_equivalent',
        'premium_including_tax',
        'tax_code',
        'is_tax_exempted',
        'tax_rate',
        'tax_amount',
        'subject_matter_reference',
        'subject_matter_description',
        'policy_holder_name',
        'policy_holder_birth_date',
        'policy_holder_type',
        'policy_holder_id_number',
        'policy_holder_id_type',
        'country_code',
        'region',
        'district',
        'street',
        'policy_holder_phone_number',
        'postal_address',
    ];

    // Relationships

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function coverNoteType()
    {
        return $this->belongsTo(CoverNoteType::class, 'cover_note_type_id');
    }

    public function coverage()
    {
        return $this->belongsTo(Coverage::class, 'coverage_id');
    }
}
