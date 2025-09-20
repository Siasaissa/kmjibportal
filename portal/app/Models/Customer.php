<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'client_name', 'client_status', 'client_sub_status', 'aml_risk', 
        'id_type', 'id_number', 'tin', 'zrb', 'appointment_date', 'account_number',
        'dob', 'place_of_birth', 'nationality', 'gender', 'marital_status', 'occupation', 'disability',
        'business_type', 'country_of_registration', 'registration_date', 'registration_number', 
        'contact_person', 'vrn_gst',
        'region', 'district', 'village', 'sector', 'cell_street', 'mandate_expiry',
        'profile_id', 'profile_category', 'screening_group_id', 'address',
        'mobile1', 'mobile2', 'mobile3', 'telephone1', 'telephone2', 'telephone3',
        'email1', 'email2', 'email3', 'tax_exempted', 'related_party', 'notify_sms',
        'notify_email', 'language', 'pep', 'additional_notes'
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'dob' => 'date',
        'registration_date' => 'date',
        'mandate_expiry' => 'date',
        'tax_exempted' => 'boolean',
        'related_party' => 'boolean',
        'notify_sms' => 'boolean',
        'notify_email' => 'boolean',
    ];

        public function quotations()
    {
        return $this->hasMany(Quotation::class, 'customer_id');
    }
}