<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiTiraController extends Controller
{

    // Motor Covernotes
    public function motorCoverNotes(Request $request)
    {



        // $coverNote = CoverNoteType::where('id', $request->cover_note_id)->first();
        // $quotation = Quotation::where('id', $id)->first();
        //$customer = Customer::where('id', $request->customer_id)->first();

        // CoverNoteDtl
        $coverage_id = $request->coverage_id;
        $customer_id = $request->customer_id;
        $cover_note_type_id = $request->cover_note_type_id;
        $salePointCode = $request->sale_point_code;
        $CoverNoteDesc = $request->cover_note_desc;
        $OperativeClause = $request->operative_clause;
        $CoverNoteStartDate = Carbon::parse($request->cover_note_start_date);
        $CoverNoteEndDate = $CoverNoteStartDate->copy()->addMonths($request->cover_note_duration)->subDay();
        $paymentModeId = $request->payment_mode_id;
        $currencyCodeId = $request->currency_code;
        $exchangeRate = $request->exchange_rate;
        $TotalPremiumExcludingTax = $request->total_premium_excluding_tax;
        $TotalPremiumIncludingTax = $request->total_premium_including_tax;
        $CommisionPaid = $request->commission_paid;
        $CommisionRate = $request->commission_rate;
        $OfficerName = $request->officer_name;
        $OfficerTitle = $request->officer_title;
        $ProductCode = $request->product_code;

        // RiskCovered
        $SumInsured = $request->sum_insured;
        $SumInsuredEquivalent = $request->sum_insured_equivalent;
        $PremiumRate = $request->premium_rate;
        $PremiumBeforeDiscount = $request->premium_before_discount;
        $PremiumAfterDiscount = $request->premium_after_discount;
        $PremiumExcludingTaxEquivalent = $request->premium_excluding_tax_equivalent;
        $PremiumIncludingTax = $request->premium_including_tax;
        $TaxCode = $request->tax_code;
        $IsTaxExempted = $request->is_tax_exempted;
        $TaxRate = $request->tax_rate;
        $TaxAmount = $request->tax_amount;

        // SubjectMattersCovered
        $SubjectMatterReference = $request->subject_matter_reference;
        $SubjectMatterDescription = $request->subject_matter_description;

        //PolicyHolders
        $PolicyHolderName = $request->policy_holder_name;
        $PolicyHolderBirthDate = $request->policy_holder_birth_date;
        $PolicyHolderType = $request->policy_holder_type;
        $PolicyHolderIdNumber = $request->policy_holder_id_number;
        $PolicyHolderIdType = $request->policy_holder_id_type;
        $CountryCode = $request->country_code;
        $Region = $request->region;
        $District = $request->district;
        $Street = $request->street;
        $PolicyHolderPhoneNumber = $request->policy_holder_phone_number;
        $PostalAddress = $request->postal_address;
        $RiskCode = $request->risk_code;
        $PrevCoverNoteReferenceNumber = $request->prev_cover_note_reference_number;

        $IsFleet = $request->is_fleet;
        $FleetId = $request->fleet_id;
        $FleetSize = $request->fleet_size;
        $ComprehensiveInsured = $request->comprehensive_insured;
        $FleetEntry = $request->fleet_entry;

        $PremiumDiscount = $request->premium_discount;
        $DiscountType = $request->discount_type;

        $AddonReference = $request->addon_reference;
        $AddonDesc = $request->addon_desc;
        $AddonAmount = $request->addon_amount;
        $AddonPremiumRate = $request->addon_premium_rate;
        $PremiumExcludingTax = $request->premium_excluding_tax;

        $Gender = $request->gender;
        $PolicyHolderFax = $request->policy_holder_fax;
        $PostalAddress = $request->postal_address;
        $EmailAddress = $request->email_address;

        // MotorDtl
        $MotorCategory = $request->motor_category;          // mfano: 1
        $RegistrationNumber = $request->registration_number; // mfano: 'T241QWA'
        $ChassisNumber = $request->chassis_number;         // mfano: 'NCP314345436334'
        $Make = $request->make;                            // mfano: 'Toyota'
        $Model = $request->model;                          // mfano: 'IST'
        $ModelNumber = $request->model_number;            // mfano: 'TA232353455'
        $BodyType = $request->body_type;                  // mfano: 'Station Wagon'
        $Color = $request->color;                         // mfano: 'Blue'
        $EngineNumber = $request->engine_number;          // mfano: '2423253535'
        $EngineCapacity = $request->engine_capacity;      // mfano: 2300
        $FuelUsed = $request->fuel_used;                  // mfano: 'Petrol'
        $NumberOfAxles = $request->number_of_axles;       // mfano: 3
        $AxleDistance = $request->axle_distance;    // inaweza kuwa empty string
        $SittingCapacity = $request->sitting_capacity; // inaweza kuwa empty string
        $YearOfManufacture = $request->year_of_manufacture; // mfano: 2001
        $TareWeight = $request->tare_weight;              // mfano: 2000
        $GrossWeight = $request->gross_weight;            // mfano: 2000
        $MotorUsage = $request->motor_usage;              // mfano: 1
        $OwnerName = $request->owner_name;                // mfano: 'Juma Wamugamba'
        $OwnerCategory = $request->owner_category;        // mfano: 1
        $OwnerAddress = $request->owner_address;    // inaweza kuwa empty string

        $data = [
            'CoverNoteHdr' => [
                'RequestId' => generateRequestID(),
                'CompanyCode' => 'IB10152',
                'SystemCode' => 'TP_KMJ_001',
                'CallBackUrl' => "https://suretech.co.tz/api/tiramis/callback",
                'InsurerCompanyCode' => 'ICC100',
                'TranCompanyCode' => 'TRC200',
                'CoverNoteType' => $cover_note_type_id,
            ],
            'CoverNoteDtl' => [
                'CoverNoteNumber' => otherUniqueID(),
                'PrevCoverNoteReferenceNumber' => $PrevCoverNoteReferenceNumber,
                'SalePointCode' => $salePointCode,
                'CoverNoteStartDate' => returnTiraDate($CoverNoteStartDate),
                'CoverNoteEndDate' => returnTiraDate($CoverNoteEndDate),
                'CoverNoteDesc' => $CoverNoteDesc ?? "To cover the liability that will arise as a result of professional activities of the insured",
                'OperativeClause' => $OperativeClause ?? "To cover the liability that will arise as a result of professional activities of the insured",
                'PaymentMode' => $paymentModeId,
                'CurrencyCode' => $currencyCodeId,
                'ExchangeRate' => $exchangeRate,
                'TotalPremiumExcludingTax' => $TotalPremiumExcludingTax,
                'TotalPremiumIncludingTax' => $TotalPremiumIncludingTax,
                'CommissionPaid' => $CommisionPaid,
                'CommissionRate' => $CommisionRate,
                'OfficerName' => $OfficerName,
                'OfficerTitle' => $OfficerTitle,
                'ProductCode' => $ProductCode,
                'IsFleet' => ($IsFleet === 'Y' || $IsFleet === 'N') ? $IsFleet : ((bool)$IsFleet ? 'Y' : 'N'),
                // Fleet fields will only be considered by TIRA when IsFleet = 'Y'
                'FleetId' => $IsFleet ? $FleetId : null,
                'FleetSize' => $IsFleet ? $FleetSize : null,
                'ComprehensiveInsured' => $IsFleet ? $ComprehensiveInsured : null,
                'FleetEntry' => $IsFleet ? $FleetEntry : null,
                'RisksCovered' => [
                    'RiskCovered' => [
                        [
                            'RiskCode' => $RiskCode,
                            'SumInsured' => $SumInsured,
                            'SumInsuredEquivalent' => $SumInsuredEquivalent,
                            'PremiumRate' => $PremiumRate,
                            'PremiumBeforeDiscount' => $PremiumBeforeDiscount,
                            'PremiumAfterDiscount' => $PremiumAfterDiscount,
                            'PremiumDiscount' => $PremiumDiscount,
                            'DiscountType' => $DiscountType,
                            'PremiumExcludingTaxEquivalent' => $PremiumExcludingTaxEquivalent,
                            'PremiumIncludingTax' => $PremiumIncludingTax,
                            'TaxesCharged' => [
                                'TaxCharged' => [
                                    'TaxCode' => $TaxCode,
                                    'TaxRate' => $TaxRate,
                                    'TaxAmount' => $TaxAmount,
                                ],
                            ],
                        ],
                    ]
                ],
                'SubjectMattersCovered' => [
                    'SubjectMatter' => [
                        'SubjectMatterReference' => $SubjectMatterReference,
                        'SubjectMatterDesc' => $SubjectMatterDescription,
                    ],
                ],
                'CoverNoteAddons' => [
                    'CoverNoteAddon' => [
                        [
                            'AddonReference' => $AddonReference,
                            'AddonDesc' => $AddonDesc,
                            'AddonAmount' => $AddonAmount,
                            'AddonPremiumRate' => $AddonPremiumRate,
                            'PremiumExcludingTax' => $PremiumExcludingTax,
                            'PremiumExcludingTaxEquivalent' => $PremiumExcludingTaxEquivalent,
                            'PremiumIncludingTax' => $PremiumIncludingTax,
                            'TaxesCharged' => [
                                'TaxCharged' => [
                                    'TaxCode' => $TaxCode,
                                    'TaxRate' => $TaxRate,
                                    'TaxAmount' => $TaxAmount,
                                ],
                            ],
                        ],
                    ],
                ],

                'PolicyHolders' => [
                    'PolicyHolder' => [
                        'PolicyHolderName' => $PolicyHolderName,
                        'PolicyHolderBirthDate' => $PolicyHolderBirthDate,
                        'PolicyHolderType' => $PolicyHolderType,
                        'PolicyHolderIdNumber' => $PolicyHolderIdNumber,
                        'PolicyHolderIdType' => $PolicyHolderIdType,
                        'Gender' => $Gender,
                        'CountryCode' => $CountryCode,
                        'Region' => $Region,
                        'District' => $District,
                        'Street' => $Street,
                        'PolicyHolderPhoneNumber' => $PolicyHolderPhoneNumber,
                        'PolicyHolderFax' => $PolicyHolderFax,
                        'PostalAddress' => $PostalAddress,
                        'EmailAddress' => $EmailAddress,
                    ],
                ],

                'MotorDtl' => [
                    'MotorCategory' => $MotorCategory,         // mfano: 1
                    'RegistrationNumber' => $RegistrationNumber, // mfano: 'T241QWA'
                    'ChassisNumber' => $ChassisNumber,         // mfano: 'NCP314345436334'
                    'Make' => $Make,                           // mfano: 'Toyota'
                    'Model' => $Model,                         // mfano: 'IST'
                    'ModelNumber' => $ModelNumber,             // mfano: 'TA232353455'
                    'BodyType' => $BodyType,                   // mfano: 'Station Wagon'
                    'Color' => $Color,                         // mfano: 'Blue'
                    'EngineNumber' => $EngineNumber,           // mfano: '2423253535'
                    'EngineCapacity' => $EngineCapacity,       // mfano: 2300
                    'FuelUsed' => $FuelUsed,                   // mfano: 'Petrol'
                    'NumberOfAxles' => $NumberOfAxles,         // mfano: 3
                    'AxleDistance' => $AxleDistance,     // inaweza kuwa empty string
                    'SittingCapacity' => $SittingCapacity, // inaweza kuwa empty string
                    'YearOfManufacture' => $YearOfManufacture, // mfano: 2001
                    'TareWeight' => $TareWeight,               // mfano: 2000
                    'GrossWeight' => $GrossWeight,             // mfano: 2000
                    'MotorUsage' => $MotorUsage,               // mfano: 1
                    'OwnerName' => $OwnerName,                 // mfano: 'Juma Wamugamba'
                    'OwnerCategory' => $OwnerCategory,         // mfano: 1
                    'OwnerAddress' => $OwnerAddress,     // inaweza kuwa empty string
                ],

            ],
        ];

        //covernote type 1 and 2
        // $quotationData = [
        //     "coverage_id" => $coverage_id,
        //     "customer_id" => $customer_id,
        //     "cover_note_type_id" => $cover_note_type_id,
        //     "sale_point_code" => $salePointCode,
        //     "cover_note_desc" => $CoverNoteDesc ?? "",
        //     "operative_clause" => $OperativeClause ?? "",
        //     "cover_note_start_date" => $request->cover_note_start_date,
        //     "cover_note_end_date" => $CoverNoteEndDate,
        //     "cover_note_duration" => $request->cover_note_duration,
        //     "payment_mode" => $paymentModeId,
        //     "currency_code" => $currencyCodeId,
        //     "exchange_rate" => $exchangeRate,
        //     "total_premium_excluding_tax" => $TotalPremiumExcludingTax,
        //     "total_premium_including_tax" => $TotalPremiumIncludingTax,
        //     "commission_paid" => $CommisionPaid,
        //     "commission_rate" => $CommisionRate,
        //     "officer_name" => $OfficerName,
        //     "officer_title" => $OfficerTitle,
        //     "product_code" => $ProductCode,
        //     "cover_note_reference" => otherUniqueID(),
        //     "sum_insured" => $SumInsured,
        //     "sum_insured_equivalent" => $SumInsuredEquivalent,
        //     "premium_rate" => $PremiumRate,
        //     "premium_before_discount" => $PremiumBeforeDiscount,
        //     "premium_after_discount" => $PremiumAfterDiscount,
        //     "premium_excluding_tax_equivalent" => $PremiumExcludingTaxEquivalent,
        //     "premium_including_tax" => $PremiumIncludingTax,
        //     "tax_code" => $TaxCode,
        //     "is_tax_exempted" => $IsTaxExempted == "N" ? 0 : 1,
        //     "tax_rate" => $TaxRate,
        //     "tax_amount" => $TaxAmount,
        //     "subject_matter_reference" => $SubjectMatterReference,
        //     "subject_matter_description" => $SubjectMatterDescription,
        //     "policy_holder_name" => $PolicyHolderName,
        //     "policy_holder_birth_date" => $PolicyHolderBirthDate,
        //     "policy_holder_type" => $PolicyHolderType,
        //     "policy_holder_id_number" => $PolicyHolderIdNumber,
        //     "policy_holder_id_type" => $PolicyHolderIdType,
        //     "country_code" => $CountryCode,
        //     "region" => $Region,
        //     "district" => $District,
        //     "street" => $Street,
        //     "policy_holder_phone_number" => $PolicyHolderPhoneNumber,
        //     "postal_address" => $PostalAddress,
        //     "risk_code" => $RiskCode,
        // ];

        try {

            // $quotation = Quotation::create($quotationData);


            $cleanData = removeNullsRecursive($data);
            $gen_data = generateXML('MotorCoverNoteRefReq', $cleanData);

            Log::channel('tiramisxml')->info($gen_data);
            $res = TiraRequest('https://41.59.86.178:8091/ecovernote/api/covernote/non-life/motor/v2/request', $gen_data);

            // return $res;

            return response()->json([
                'success' => 'TRA Response',
                // 'quotation' => $quotation,
                'response' => $res
            ]);
        } catch (\Exception $e) {
            Log::channel('tiramisxml')->info($e->getMessage());
            return response()->json([
                'error' => 'An error occurred while processing your request.',
                'message' => $e->getMessage()
            ]);
        }
    }
}
