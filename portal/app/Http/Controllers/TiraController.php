<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Authentication\EncryptionServiceController;
use App\Models\Addons;
use App\Models\InsuranceQuotation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\Addon;
use App\Models\Coverage;
use App\Models\Quotation;
use App\Models\Receipt;
use App\Models\Motor;
use App\Models\Region;
use App\Models\CoverNoteType;
use App\Models\TiraCallback;
use Illuminate\Support\Facades\DB;

class TiraController extends Controller
{

    private $certPath;
    private $keyPath;
    private $headers;


    public function __construct()
    {
        $this->certPath = storage_path('tiramis_certs/tiramisclient.crt');
        $this->keyPath = storage_path('tiramis_certs/tiramisclient.key');
        $this->headers = [
            'Content-Type' => 'application/xml',
            'ClientCode' => 'IB10152',
            'ClientKey' => '1Xr@Jnq74&cYaSl2',
            'SystemCode' => 'TP_KMJ_001',
        ];
    }


    public function testTiramisClient()
    {
        try {

            $data = "<TIRAMIS>Test</TIRAMIS>";
            return ["requestId" => generateRequestID(), "signature" => EncryptionServiceController::createTiramisSignature($data)];
        } catch (\Exception $e) {
            return $e;
        }
    }


    public function requestNonMotorCover($id)
    {

        $cover = InsuranceQuotation::where('id', $id)->first();
        $data = [
            'CoverNoteHdr' => [
                'RequestId' => generateRequestID(),
                'CompanyCode' => 'IB10152',
                'SystemCode' => 'TP_KMJ_001',
                'CallBackUrl' => "https://nio.co.tz/api/CoverNoteref/response",
                'InsurerCompanyCode' => 'ICC100',
                'TranCompanyCode' => 'TRC200',
                'CoverNoteType' => $cover->cover_note_type,
            ],
            'CoverNoteDtl' => [
                'CoverNoteNumber' => $cover->cover_note_type == 3 ? $cover->cover_note_refere : otherUniqueID(),
                'PrevCoverNoteReferenceNumber' => null,
                'SalePointCode' => 'SPT01',
                'CoverNoteStartDate' => returnTiraDate('2025-09-15 18:00:00'),
                'CoverNoteEndDate' => returnTiraDate('2026-09-14 23:59:59'),
                'CoverNoteDesc' => "To cover the liability that will arise as a result of professional activities of the insured",
                'OperativeClause' => "To cover the liability that will arise as a result of professional activities of the insured",
                'PaymentMode' => 2,
                'CurrencyCode' => 'TZS',
                'ExchangeRate' => '1',
                'TotalPremiumExcludingTax' => 60000,
                'TotalPremiumIncludingTax' => 70800,
                'CommisionPaid' => 0,
                'CommisionRate' => 0,
                'OfficerName' => "John Doe",
                'OfficerTitle' => 'Agent',
                'ProductCode' => 'SP013010000000',
                'EndorsementType' => null,
                'EndorsementReason' => null,
                'EndorsementPremiumEarned' => null,
                'RisksCovered' => [
                    'RiskCovered' => [
                        [
                            'RiskCode' => 'SP013010000001',
                            'SumInsured' => 6000000,
                            'SumInsuredEquivalent' => 6000000,
                            'PremiumRate' => 0.01,
                            'PremiumBeforeDiscount' => 60000,
                            'PremiumAfterDiscount' => 60000,
                            'PremiumExcludingTaxEquivalent' => 60000,
                            'PremiumIncludingTax' => 70800,
                            'DiscountsOffered' => [],
                            'TaxesCharged' => [
                                'TaxCharged' => [
                                    'TaxCode' => 'VAT-MAINLAND',
                                    'IsTaxExempted' => 'N',
                                    'TaxExemptionType' => null,
                                    'TaxExemptionReference' => null,
                                    'TaxRate' => 0.18,
                                    'TaxAmount' => 10800,
                                ],
                            ],
                        ],
                    ]
                ],
                'SubjectMattersCovered' => [
                    'SubjectMatter' => [
                        'SubjectMatterReference' => 'HSB001',
                        'SubjectMatterDesc' => 'On contents including Domestic items',
                    ],
                ],
                'CoverNoteAddons' => [],
                'PolicyHolders' => [
                    'PolicyHolder' => [
                        'PolicyHolderName' => 'MASHAURI HUSSEIN',
                        'PolicyHolderBirthDate' => '2010-06-08',
                        'PolicyHolderType' => 2,
                        'PolicyHolderIdNumber' => '143041786',
                        'PolicyHolderIdType' => 6,
                        'Gender' => null,
                        'CountryCode' => 'TZA',
                        'Region' => 'Dar es Salaam',
                        'District' => 'Ilala',
                        'Street' => 'Ilala',
                        'PolicyHolderPhoneNumber' => '255742662230',
                        'PolicyHolderFax' => null,
                        'PostalAddress' => "P O BOX DA RES SALAAM",
                        'EmailAddress' => null,
                    ],
                ],
            ],
        ];

        $gen_data = generateXML('CoverNoteRefReq', $data);

        Log::channel('tiramisxml')->info($gen_data);
        //$res = TiraRequest('https://41.59.86.178:8091/ecovernote/api/covernote/non-life/other/v2/request', $gen_data);

        //return $res;
    }






    public function requestNonMotorCovertes(Request $request)
    {
        //dd($request->all());
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
        $CoverNoteStartDate = $request->cover_note_start_date; //Carbon::parse($request->cover_note_start_date)
        $CoverNoteEndDate = $request->cover_note_end_date; //$CoverNoteStartDate->copy()->addMonths($request->cover_note_duration)->subDay()
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
                'PrevCoverNoteReferenceNumber' => null,
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
                'CommisionPaid' => $CommisionPaid,
                'CommisionRate' => $CommisionRate,
                'OfficerName' => $OfficerName,
                'OfficerTitle' => $OfficerTitle,
                'ProductCode' => $ProductCode,
                'EndorsementType' => null,
                'EndorsementReason' => null,
                'EndorsementPremiumEarned' => null,
                'RisksCovered' => [
                    'RiskCovered' => [
                        [
                            'RiskCode' => $RiskCode,
                            'SumInsured' => $SumInsured,
                            'SumInsuredEquivalent' => $SumInsuredEquivalent,
                            'PremiumRate' => $PremiumRate,
                            'PremiumBeforeDiscount' => $PremiumBeforeDiscount,
                            'PremiumAfterDiscount' => $PremiumAfterDiscount,
                            'PremiumExcludingTaxEquivalent' => $PremiumExcludingTaxEquivalent,
                            'PremiumIncludingTax' => $PremiumIncludingTax,
                            'DiscountsOffered' => [],
                            'TaxesCharged' => [
                                'TaxCharged' => [
                                    'TaxCode' => $TaxCode,
                                    'IsTaxExempted' => $IsTaxExempted,
                                    'TaxExemptionType' => null,
                                    'TaxExemptionReference' => null,
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
                'CoverNoteAddons' => [],
                'PolicyHolders' => [
                    'PolicyHolder' => [
                        'PolicyHolderName' => $PolicyHolderName,
                        'PolicyHolderBirthDate' => $PolicyHolderBirthDate,
                        'PolicyHolderType' => $PolicyHolderType,
                        'PolicyHolderIdNumber' => $PolicyHolderIdNumber,
                        'PolicyHolderIdType' => $PolicyHolderIdType,
                        'Gender' => null,
                        'CountryCode' => $CountryCode,
                        'Region' => $Region,
                        'District' => $District,
                        'Street' => $Street,
                        'PolicyHolderPhoneNumber' => $PolicyHolderPhoneNumber,
                        'PolicyHolderFax' => null,
                        'PostalAddress' => $PostalAddress,
                        'EmailAddress' => null,
                    ],
                ],
            ],
        ];

        //covernote type 1 and 2
        $quotationData = [
            "coverage_id" => $coverage_id,
            "customer_id" => $customer_id,
            "cover_note_type_id" => $cover_note_type_id,
            "sale_point_code" => $salePointCode,
            "cover_note_desc" => $CoverNoteDesc ?? "",
            "operative_clause" => $OperativeClause ?? "",
            "cover_note_start_date" => $request->cover_note_start_date,
            "cover_note_end_date" => $CoverNoteEndDate,
            "cover_note_duration" => $request->cover_note_duration,
            "payment_mode" => $paymentModeId,
            "currency_code" => $currencyCodeId,
            "exchange_rate" => $exchangeRate,
            "total_premium_excluding_tax" => $TotalPremiumExcludingTax,
            "total_premium_including_tax" => $TotalPremiumIncludingTax,
            "commission_paid" => $CommisionPaid,
            "commission_rate" => $CommisionRate,
            "officer_name" => $OfficerName,
            "officer_title" => $OfficerTitle,
            "product_code" => $ProductCode,
            "cover_note_reference" => otherUniqueID(),
            "sum_insured" => $SumInsured,
            "sum_insured_equivalent" => $SumInsuredEquivalent,
            "premium_rate" => $PremiumRate,
            "premium_before_discount" => $PremiumBeforeDiscount,
            "premium_after_discount" => $PremiumAfterDiscount,
            "premium_excluding_tax_equivalent" => $PremiumExcludingTaxEquivalent,
            "premium_including_tax" => $PremiumIncludingTax,
            "tax_code" => $TaxCode,
            "is_tax_exempted" => $IsTaxExempted == "N" ? 0 : 1,
            "tax_rate" => $TaxRate,
            "tax_amount" => $TaxAmount,
            "subject_matter_reference" => $SubjectMatterReference,
            "subject_matter_description" => $SubjectMatterDescription,
            "policy_holder_name" => $PolicyHolderName,
            "policy_holder_birth_date" => $PolicyHolderBirthDate,
            "policy_holder_type" => $PolicyHolderType,
            "policy_holder_id_number" => $PolicyHolderIdNumber,
            "policy_holder_id_type" => $PolicyHolderIdType,
            "country_code" => $CountryCode,
            "region" => $Region,
            "district" => $District,
            "street" => $Street,
            "policy_holder_phone_number" => $PolicyHolderPhoneNumber,
            "postal_address" => $PostalAddress,
            "risk_code" => $RiskCode,
        ];

        try {

            $quotation = Quotation::create($quotationData);


            $gen_data = generateXML('CoverNoteRefReq', $data);

            Log::channel('tiramisxml')->info($gen_data);
            $res = TiraRequest('https://41.59.86.178:8091/ecovernote/api/covernote/non-life/other/v2/request', $gen_data);

            //return $res;

            return response()->json([
                'success' => 'Quotation created successfully',
                'quotation' => $quotation,
            ]);
        } catch (\Exception $e) {
            Log::channel('tiramisxml')->info($e->getMessage());
            return response()->json([
                'error' => 'An error occurred while processing your request.',
                'message' => $e->getMessage(),
                'response' => $res
            ]);
        }
    }

    // data insertion to quotations table
public function RequestnonMotor(Request $request)
{
    // Collect all request values
    $coverage_id = $request->coverage_id;
    $customer_id = $request->customer_id;
    $cover_note_type_id = $request->cover_note_type_id;
    $salePointCode = $request->sale_point_code;
    $CoverNoteDesc = $request->cover_note_desc;
    $OperativeClause = $request->operative_clause;
    $CoverNoteStartDate = $request->cover_note_start_date;
    $CoverNoteEndDate = $request->cover_note_end_date;
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

    $SubjectMatterReference = $request->subject_matter_reference;
    $SubjectMatterDescription = $request->subject_matter_description;

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

    // Added description and file upload
    $description = $request->description;
    $filePath = null;

    if ($request->hasFile('uploads')) {
        $file = $request->file('uploads');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');
    }

    // Build Quotation Data
    $quotationData = [
        "coverage_id" => $coverage_id,
        "customer_id" => $customer_id,
        "cover_note_type_id" => $cover_note_type_id,
        "sale_point_code" => $salePointCode,
        "cover_note_desc" => $CoverNoteDesc ?? "",
        "operative_clause" => $OperativeClause ?? "",
        "cover_note_start_date" => $request->cover_note_start_date,
        "cover_note_end_date" => $CoverNoteEndDate,
        "cover_note_duration" => $request->cover_note_duration,
        "payment_mode" => $paymentModeId,
        "currency_code" => $currencyCodeId,
        "exchange_rate" => $exchangeRate,
        "total_premium_excluding_tax" => $TotalPremiumExcludingTax,
        "total_premium_including_tax" => $TotalPremiumIncludingTax,
        "commission_paid" => $CommisionPaid,
        "commission_rate" => $CommisionRate,
        "officer_name" => $OfficerName,
        "officer_title" => $OfficerTitle,
        "product_code" => $ProductCode,
        "cover_note_reference" => otherUniqueID(),
        "sum_insured" => $SumInsured,
        "sum_insured_equivalent" => $SumInsuredEquivalent,
        "premium_rate" => $PremiumRate,
        "premium_before_discount" => $PremiumBeforeDiscount,
        "premium_after_discount" => $PremiumAfterDiscount,
        "premium_excluding_tax_equivalent" => $PremiumExcludingTaxEquivalent,
        "premium_including_tax" => $PremiumIncludingTax,
        "tax_code" => $TaxCode,
        "is_tax_exempted" => $IsTaxExempted == "N" ? 0 : 1,
        "tax_rate" => $TaxRate,
        "tax_amount" => $TaxAmount,
        "subject_matter_reference" => $SubjectMatterReference,
        "subject_matter_description" => $SubjectMatterDescription,
        "policy_holder_name" => $PolicyHolderName,
        "policy_holder_birth_date" => $PolicyHolderBirthDate,
        "policy_holder_type" => $PolicyHolderType,
        "policy_holder_id_number" => $PolicyHolderIdNumber,
        "policy_holder_id_type" => $PolicyHolderIdType,
        "country_code" => $CountryCode,
        "region" => $Region,
        "district" => $District,
        "street" => $Street,
        "policy_holder_phone_number" => $PolicyHolderPhoneNumber,
        "postal_address" => $PostalAddress,
        "risk_code" => $RiskCode,
        "description" => $description ?? null,
        "uploads" => $filePath, 
    ];

    try {
        $quotation = Quotation::create($quotationData);

        $gen_data = generateXML('CoverNoteRefReq', [
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
                'PrevCoverNoteReferenceNumber' => null,
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
                'CommisionPaid' => $CommisionPaid,
                'CommisionRate' => $CommisionRate,
                'OfficerName' => $OfficerName,
                'OfficerTitle' => $OfficerTitle,
                'ProductCode' => $ProductCode,
                'EndorsementType' => null,
                'EndorsementReason' => null,
                'EndorsementPremiumEarned' => null,
                'RisksCovered' => [
                    'RiskCovered' => [
                        [
                            'RiskCode' => $RiskCode,
                            'SumInsured' => $SumInsured,
                            'SumInsuredEquivalent' => $SumInsuredEquivalent,
                            'PremiumRate' => $PremiumRate,
                            'PremiumBeforeDiscount' => $PremiumBeforeDiscount,
                            'PremiumAfterDiscount' => $PremiumAfterDiscount,
                            'PremiumExcludingTaxEquivalent' => $PremiumExcludingTaxEquivalent,
                            'PremiumIncludingTax' => $PremiumIncludingTax,
                            'DiscountsOffered' => [],
                            'TaxesCharged' => [
                                'TaxCharged' => [
                                    'TaxCode' => $TaxCode,
                                    'IsTaxExempted' => $IsTaxExempted,
                                    'TaxExemptionType' => null,
                                    'TaxExemptionReference' => null,
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
                'CoverNoteAddons' => [],
                'PolicyHolders' => [
                    'PolicyHolder' => [
                        'PolicyHolderName' => $PolicyHolderName,
                        'PolicyHolderBirthDate' => $PolicyHolderBirthDate,
                        'PolicyHolderType' => $PolicyHolderType,
                        'PolicyHolderIdNumber' => $PolicyHolderIdNumber,
                        'PolicyHolderIdType' => $PolicyHolderIdType,
                        'Gender' => null,
                        'CountryCode' => $CountryCode,
                        'Region' => $Region,
                        'District' => $District,
                        'Street' => $Street,
                        'PolicyHolderPhoneNumber' => $PolicyHolderPhoneNumber,
                        'PolicyHolderFax' => null,
                        'PostalAddress' => $PostalAddress,
                        'EmailAddress' => null,
                    ],
                ],
            ],
        ]);
        
        Log::channel('tiramisxml')->info('Generated XML: ' . $gen_data);

        $res = TiraRequest(
            'https://41.59.86.178:8091/ecovernote/api/covernote/non-life/other/v2/request',
            $gen_data
        );
        
        Log::channel('tiramisxml')->info('TiraRequest response: ' . print_r($res, true));

        Log::channel('tiramisxml')->info('Raw API Response: ' . json_encode($res));

        $xmlstring = null;

        if (is_array($res) && isset($res['body'])) {
            $xmlstring = $res['body'];
        } elseif (is_object($res) && method_exists($res, 'getBody')) {
            $xmlstring = (string) $res->getBody();
        }

        if (!$xmlstring) {
            throw new \Exception('No response body received from API');
        }

        $xml = simplexml_load_string($res['body'], "SimpleXMLElement", LIBXML_NOCDATA);
        // Look for acknowledgment response (could be CoverNoteRefReqAck or MotorCoverNoteRefReqAck)
        $ack = $xml->CoverNoteRefReqAck ?? $xml->MotorCoverNoteRefReqAck ?? null;

        if ($ack) {
            // Extract acknowledgment data
            $acknowledgementId = (string) $ack->AcknowledgementId;
            $requestId = (string) $ack->RequestId;
            $statusCode = (string) $ack->AcknowledgementStatusCode;
            $statusDesc = (string) $ack->AcknowledgementStatusDesc;
            $msgSignature = (string) $xml->MsgSignature;

            // Update quotation with acknowledgment data
            $quotation->update([
                'acknowledgement_id' => $acknowledgementId,
                'request_id' => $requestId,
                'ack_status_code' => $statusCode,
                'ack_status_desc' => $statusDesc, // Fixed: was 'ack_status_description' in your comment
                'msg_signature' => $msgSignature,
            ]);

            Log::channel('tiramisxml')->info('Acknowledgment data saved: ' . json_encode([
                'acknowledgement_id' => $acknowledgementId,
                'request_id' => $requestId,
                'ack_status_code' => $statusCode,
                'ack_status_desc' => $statusDesc,
            ]));

            return response()->json([
                'success' => 'Quotation created and acknowledgment received successfully',
                'quotation' => $quotation->fresh(), // Get updated quotation data
                'acknowledgment' => [
                    'acknowledgement_id' => $acknowledgementId,
                    'request_id' => $requestId,
                    'status_code' => $statusCode,
                    'status_description' => $statusDesc,
                    'msg_signature' => $msgSignature,
                ]
            ]);
        } else {
            // No acknowledgment found in response
            Log::channel('tiramisxml')->warning('No acknowledgment found in XML response: ' . $xmlstring);
            
            return response()->json([
                'warning' => 'Quotation created but no acknowledgment received',
                'quotation' => $quotation,
                'raw_response' => $xmlstring,
            ]);
        }

    } catch (\Exception $e) {
        Log::channel('tiramisxml')->error('Error in RequestnonMotor: ' . $e->getMessage());
        Log::channel('tiramisxml')->error('Stack trace: ' . $e->getTraceAsString());

        return response()->json([
            'error' => 'An error occurred while processing your request.',
            'message' => $e->getMessage(),
            'response' => $res ?? null,
        ], 500);
    }
}






    public function tiraCallbackHandler(Request $request)
    {
        Log::info("=== TIRA Callback Received ===");

        try {
            $xmlString = $request->getContent();
            Log::info("Raw XML Content:\n" . $xmlString);

            $callback = new TiraCallback();
            $callback->raw_data = $xmlString;
            $callback->save();
            Log::info("Callback saved successfully with ID: " . $callback->id);

            Log::info("Response sent: success");

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error("Error occurred: " . $e->getMessage());
            Log::error("Stack trace:\n" . $e->getTraceAsString());

            return response()->json(['status' => 'error', 'message' => 'Callback failed'], 500);
        }
    }

    public function requestNonMotorCovertest($customerId)
    {
        DB::beginTransaction();
        try {
            // Find the customer or create a new one
            $customerData = [
                'client_name' => 'MASHAURI HUSSEIN',
                'birth_date' => '2010-06-08',
                'type' => 2,
                'id_type' => 6,
                'id_number' => '143041786', // ensure unique
                'gender' => null,
                'country_code' => 'TZA',
                'region' => 'Dar es Salaam',
                'district' => 'Ilala',
                'street' => 'Ilala',
                'phone' => '255742662230',
                'postal_address' => "P O BOX DA RES SALAAM",
                'email' => null,
            ];

            $customer = Customer::updateOrCreate(
                ['id_number' => $customerData['id_number']],
                $customerData
            );

            // Create quotation (parent for all related tables)
            $quotation = Quotation::create([
                'customer_id' => $customer->id,
                'product_id' => 1,
                'quotation_number' => 'CN-' . now()->timestamp,
                'total_premium' => 70800,
                'status' => 'pending',
                'officer_name' => 'John Doe',
                'officer_title' => 'Agent',
            ]);

            //  Create coverage (avoid duplicate for same quotation)
            $coverage = Coverage::firstOrCreate(
                [
                    'quotation_id' => $quotation->id,
                    'risk_code' => 'RSK10233898'
                ],
                [
                    'risk_name' => 'Professional Liability',
                    'sum_insured' => 6000000,
                    'sum_insured_equivalent' => 6000000,
                    'premium_rate' => 0.01,
                    'premium_before_discount' => 60000,
                    'premium_after_discount' => 60000,
                    'premium_excluding_tax_equivalent' => 60000,
                    'premium_including_tax' => 70800,
                    'taxes' => json_encode([
                        'TaxCharged' => [
                            'TaxCode' => 'VAT-MAINLAND',
                            'IsTaxExempted' => 'N',
                            'TaxRate' => 0.18,
                            'TaxAmount' => 10800,
                        ]
                    ]),
                ]
            );

            //  Create receipt (only if not exist)
            $receipt = Receipt::firstOrCreate(
                ['quotation_id' => $quotation->id],
                [
                    'customer_id' => $customer->id,
                    'premium_amount' => $quotation->total_premium,
                    'amount' => $quotation->total_premium,
                    'exchange_rate' => 1,
                    'equivalent_amount' => $quotation->total_premium,
                    'status' => 'unpaid',
                ]
            );

            // Create insurance (avoid duplicates)
            $insurance = \App\Models\Insurance::firstOrCreate(
                ['name' => 'Default Insurance Company']
            );
            $quotation->insurance_id = $insurance->id;

            // Create motor (only if not exist for this quotation)
            $motor = Motor::firstOrCreate(
                ['insurance_id' => $quotation->id],
                [
                    'registration_number' => 'T423 AQT',
                    'quotation_id' => $quotation->id,
                    'chassis_number' => 'CH123456',
                    'make' => 'Toyota',
                    'model' => 'Corolla',
                    'year_of_manufacture' => 2018,
                    'value' => 20000000,
                ]
            );

            $addon = Addons::create([
                'quotation_id' => $quotation->id,
                'addon_code' => 'ADD01',
                'addon_name' => 'Passenger Liability Cover',
                'rate' => 0.02,
                'minimum_amount' => 50000,

            ]);

            $quotation->coverage_id = $coverage->id;
            $quotation->receipt_id = $receipt->id;
            $quotation->motor_id = $motor->id;
            $quotation->addon_id = $addon->id;

            $quotation->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Quotation and related data created successfully.',
                'quotation_id' => $quotation->id,
                'customer_id' => $customer->id,
                'coverage_id' => $coverage->id,
                'receipt_id' => $receipt->id,
                'motor_id' => $motor->id,
                'insurance_id' => $insurance->id,
                'addon_id' => $addon->id,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }



    public function getQuotationWithRelations($id)
    {
        try {
            $quotation = Quotation::with([
                //'customer',
                //'coverages',
                //'receipt',
                'motor',
                'addon',
                // 'insurance'
            ])->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $quotation
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }






    function returnTiraDate($date): string
    {
        return (new Carbon($date))->format('Y-m-d\\TH:i:s');
    }

    //motor verifications
    public function covernote(Request $request)
    {

        $request_id = generateRequestID();
        $signature = "";

        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
                    <TiraMsg>
                    <CoverNoteVerificationReq>
                        <VerificationHdr>
                            <RequestId>' . $request_id . '</RequestId>
                            <CompanyCode>IB10152</CompanyCode>
                            <SystemCode>TP_KMJ_001</SystemCode>
                        </VerificationHdr>
                        <VerificationDtl>
                            <CoverNoteReferenceNumber>42424-246767-65768</CoverNoteReferenceNumber>
                            <StickerNumber>13143-14145-12412</StickerNumber>
                            <MotorRegistrationNumber>T233SQA</MotorRegistrationNumber>
                            <MotorChassisNumber>4353646</MotorChassisNumber>
                        </VerificationDtl>
                    </CoverNoteVerificationReq>
                    <MsgSignature>' . $signature . '</MsgSignature>
                    </TiraMsg>';
        $certPath = storage_path('tiramis_certs/tiramisclient.crt');
        $keyPath = storage_path('tiramis_certs/tiramisclient.key');

        $response = Http::withOptions([
            'cert' => $certPath,
            'ssl_key' => $keyPath,
            'verify' => false,
        ])
            ->withHeaders([
                'Content-Type' => 'application/xml',
                'ClientCode' => 'IB10152',
                'ClientKey' => '1Xr@Jnq74&cYaSl2',
                'SystemCode' => 'TP_KMJ_001',
                'SystemName' => 'KMJ System',
            ])
            ->withBody($xmlData, 'application/xml')
            ->post('https://41.59.86.178:8091/ecovernote/api/covernote/verification/min/v2/request');

        // Log the response for debugging
        //\Log::info('TIRA Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }

    //for covernote verification
    public function verifyCoverNote()
    {
        $request_id = generateRequestID();
        $xmlData = '<CoverNoteVerificationReq>
      <VerificationHdr>
         <RequestId>' . $request_id . '</RequestId>
         <CompanyCode>IB10152</CompanyCode>
         <SystemCode>TP_KMJ_001</SystemCode>
      </VerificationHdr>
      <VerificationDtl>
        <CoverNoteReferenceNumber>42424-246767-65768</CoverNoteReferenceNumber>
        <StickerNumber>13143-14145-12412</StickerNumber>
        <MotorRegistrationNumber>T233SQA</MotorRegistrationNumber>
        <MotorChassisNumber>4353646</MotorChassisNumber>
      </VerificationDtl>
   </CoverNoteVerificationReq>';


        //generate signature
        $signature = EncryptionServiceController::createTiramisSignature($xmlData);

        $xmlRequest = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
   ' . $xmlData . '
   <MsgSignature>' . $signature . '</MsgSignature>
</TiraMsg>';

        Log::channel('tiramisxml')->info($xmlRequest);

        $certPath = storage_path('tiramis_certs/tiramisclient.crt');
        $keyPath = storage_path('tiramis_certs/tiramisclient.key');

        $response = Http::withOptions([
            'cert' => $certPath,
            'ssl_key' => $keyPath,
            'verify' => false,
        ])
            ->withHeaders([
                'Content-Type' => 'application/xml',
                'ClientCode' => 'IB10152',
                'ClientKey' => '1Xr@Jnq74&cYaSl2',
                'SystemCode' => 'TP_KMJ_001',
                'SystemName' => 'KMJ System',
            ])
            ->withBody($xmlRequest, 'application/xml')
            ->post('https://41.59.86.178:8091/ecovernote/api/covernote/verification/min/v2/request');

        // Log the response for debugging
        //\Log::info('TIRA Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }




    // Prepared to test 1.1 Non-Life Other Covernote - To verify if the user can submit real-time other non-life cover note details successfully
    public function submitCoverNoteRefReq()
    {
        $request_id = generateRequestID();
        $other_id = otherUniqueID();

        $xmlData = '<CoverNoteRefReq>
        <CoverNoteHdr>
            <RequestId>' . $request_id . '</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallbackUrl>https://nio.co.tz/api/CoverNoteref/response</CallbackUrl>
            <InsurerCompanyCode>ICC100</InsurerCompanyCode>
            <TranCompanyCode>TRC200</TranCompanyCode>
            <CoverNoteType>1</CoverNoteType>
        </CoverNoteHdr>
        <CoverNoteDtl>
            <CoverNoteNumber>' . $other_id . '</CoverNoteNumber>
            <PrevCoverNoteReferenceNumber></PrevCoverNoteReferenceNumber>
            <SalePointCode>SPT01</SalePointCode>
            <CoverNoteStartDate>2025-01-01T09:00:00</CoverNoteStartDate>
            <CoverNoteEndDate>2025-12-31T23:59:59</CoverNoteEndDate>
            <CoverNoteDesc>Cover note for Motor Vehicle Comprehensive Insurance</CoverNoteDesc>
            <OperativeClause>Accidental Damage and Theft</OperativeClause>
            <PaymentMode>2</PaymentMode>
            <CurrencyCode>TZS</CurrencyCode>
            <ExchangeRate>1.00</ExchangeRate>
            <TotalPremiumExcludingTax>150000.00</TotalPremiumExcludingTax>
            <TotalPremiumIncludingTax>177000.00</TotalPremiumIncludingTax>
            <CommissionPaid>5000.00</CommissionPaid>
            <CommissionRate>0.05</CommissionRate>
            <OfficerName>Mary Johnson</OfficerName>
            <OfficerTitle>Insurance Officer</OfficerTitle>
            <ProductCode>PRD001200</ProductCode>
            <EndorsementType>Amendment</EndorsementType>
            <EndorsementReason>Change of Vehicle</EndorsementReason>
            <EndorsementPremiumEarned>25000.00</EndorsementPremiumEarned>
            <RisksCovered>
                <RiskCovered>
                    <RiskCode>RISK001</RiskCode>
                    <SumInsured>20000000.00</SumInsured>
                    <SumInsuredEquivalent>20000000.00</SumInsuredEquivalent>
                    <PremiumRate>0.0075</PremiumRate>
                    <PremiumBeforeDiscount>150000.00</PremiumBeforeDiscount>
                    <PremiumAfterDiscount>140000.00</PremiumAfterDiscount>
                    <PremiumExcludingTaxEquivalent>140000.00</PremiumExcludingTaxEquivalent>
                    <PremiumIncludingTax>165200.00</PremiumIncludingTax>
                    <DiscountsOffered>
                        <DiscountOffered>
                            <DiscountType>1</DiscountType>
                            <DiscountRate>0.05</DiscountRate>
                            <DiscountAmount>10000.00</DiscountAmount>
                        </DiscountOffered>
                    </DiscountsOffered>
                    <TaxesCharged>
                        <TaxCharged>
                            <TaxCode>VAT-MAINLAND</TaxCode>
                            <IsTaxExempted>N</IsTaxExempted>
                            <TaxExemptionType>0</TaxExemptionType>
                            <TaxExemptionReference>NONE</TaxExemptionReference>
                            <TaxRate>0.18</TaxRate>
                            <TaxAmount>25200.00</TaxAmount>
                        </TaxCharged>
                    </TaxesCharged>
                </RiskCovered>
            </RisksCovered>
            <SubjectMattersCovered>
                <SubjectMatter>
                    <SubjectMatterReference>VEH12345</SubjectMatterReference>
                    <SubjectMatterDesc>Toyota Land Cruiser Prado, Registration T123 ABC</SubjectMatterDesc>
                </SubjectMatter>
            </SubjectMattersCovered>
            <CoverNoteAddons>
                <CoverNoteAddon>
                    <AddonReference>ADD01</AddonReference>
                    <AddonDesc>Passenger Liability Cover</AddonDesc>
                    <AddonAmount>50000.00</AddonAmount>
                    <AddonPremiumRate>0.02</AddonPremiumRate>
                    <PremiumExcludingTax>1000.00</PremiumExcludingTax>
                    <PremiumExcludingTaxEquivalent>1000.00</PremiumExcludingTaxEquivalent>
                    <PremiumIncludingTax>1180.00</PremiumIncludingTax>
                    <TaxesCharged>
                        <TaxCharged>
                            <TaxCode>VAT-MAINLAND</TaxCode>
                            <IsTaxExempted>N</IsTaxExempted>
                            <TaxExemptionType>0</TaxExemptionType>
                            <TaxExemptionReference>NONE</TaxExemptionReference>
                            <TaxRate>0.18</TaxRate>
                            <TaxAmount>180.00</TaxAmount>
                        </TaxCharged>
                    </TaxesCharged>
                </CoverNoteAddon>
            </CoverNoteAddons>
            <PolicyHolders>
                <PolicyHolder>
                    <PolicyHolderName>Ahmed Issa</PolicyHolderName>
                    <PolicyHolderBirthDate>1990-06-15</PolicyHolderBirthDate>
                    <PolicyHolderType>1</PolicyHolderType>
                    <PolicyHolderIdNumber>987654321</PolicyHolderIdNumber>
                    <PolicyHolderIdType>1</PolicyHolderIdType>
                    <Gender>M</Gender>
                    <CountryCode>TZA</CountryCode>
                    <Region>Dar es Salaam</Region>
                    <District>Kinondoni</District>
                    <Street>Sinza Mori</Street>
                    <PolicyHolderPhoneNumber>255715000123</PolicyHolderPhoneNumber>
                    <PolicyHolderFax>+25522250000</PolicyHolderFax>
                    <PostalAddress>P.O. BOX 400, Dar es Salaam</PostalAddress>
                    <EmailAddress>ahmed.issa@example.com</EmailAddress>
                </PolicyHolder>
            </PolicyHolders>
        </CoverNoteDtl>
    </CoverNoteRefReq>';


        //generate signature
        $signature = EncryptionServiceController::createTiramisSignature($xmlData);

        $xmlRequest = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
   ' . $xmlData . '
   <MsgSignature>' . $signature . '</MsgSignature>
</TiraMsg>';

        Log::channel('tiramisxml')->info($xmlRequest);

        $certPath = storage_path('tiramis_certs/tiramisclient.crt');
        $keyPath = storage_path('tiramis_certs/tiramisclient.key');

        $response = Http::withOptions([
            'cert' => $certPath,
            'ssl_key' => $keyPath,
            'verify' => false,
        ])
            ->withHeaders([
                'Content-Type' => 'application/xml',
                'ClientCode' => 'IB10152',
                'ClientKey' => '1Xr@Jnq74&cYaSl2',
                'SystemCode' => 'TP_KMJ_001',
                'SystemName' => 'KMJ System',
            ])
            ->withBody($xmlRequest, 'application/xml')
            ->post('https://41.59.86.178:8091/ecovernote/api/covernote/non-life/other/v1/request');

        // Log the response for debugging
        //\Log::info('TIRA Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }



    public function SubmitMotorCovernote(Request $request)
    {
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

        //Addons
        $AddonReference = $request->addon_reference;
        $AddonDesc = $request->addon_desc;
        $AddonAmount = $request->addon_amount;
        $AddonPremiumRate = $request->addon_premium_rate;
        $PremiumExcludingTax = $request->premium_excluding_tax;

        //taxcharged
        $TaxExemptionType = $request->tax_exception_type;
        $TaxExemptionReference = $request->tax_exception_reference;

        //motordtl
        $MotorCategory = $request->motor_category;
        $MotorType = $request->motor_type;
        $RegistrationNumber = $request->registration_number;
        $ChassisNumber = $request->chassis_number;
        $Make = $request->make;
        $Model = $request->model;
        $ModelNumber = $request->model_number;
        $BodyType = $request->body_type;
        $Color = $request->color;
        $EngineNumber = $request->engine_number;
        $EngineCapacity = $request->engine_capacity;
        $FuelUsed = $request->fuel_used;

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
                'PrevCoverNoteReferenceNumber' => null,
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
                'CommisionPaid' => $CommisionPaid,
                'CommisionRate' => $CommisionRate,
                'OfficerName' => $OfficerName,
                'OfficerTitle' => $OfficerTitle,
                'ProductCode' => $ProductCode,
                'EndorsementType' => null,
                'EndorsementReason' => null,
                'EndorsementPremiumEarned' => null,
                'RisksCovered' => [
                    'RiskCovered' => [
                        [
                            'RiskCode' => $RiskCode,
                            'SumInsured' => $SumInsured,
                            'SumInsuredEquivalent' => $SumInsuredEquivalent,
                            'PremiumRate' => $PremiumRate,
                            'PremiumBeforeDiscount' => $PremiumBeforeDiscount,
                            'PremiumAfterDiscount' => $PremiumAfterDiscount,
                            'PremiumExcludingTaxEquivalent' => $PremiumExcludingTaxEquivalent,
                            'PremiumIncludingTax' => $PremiumIncludingTax,
                            'DiscountsOffered' => [],
                            'TaxesCharged' => [
                                'TaxCharged' => [
                                    'TaxCode' => $TaxCode,
                                    'IsTaxExempted' => $IsTaxExempted,
                                    'TaxExemptionType' => null,
                                    'TaxExemptionReference' => null,
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
                                'IsTaxExempted' => $IsTaxExempted,
                                'TaxExemptionType' => $TaxExemptionType,
                                'TaxExemptionReference' => $TaxExemptionReference,
                                'TaxRate' => $TaxRate,
                                'TaxAmount' => $TaxAmount
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
                        'Gender' => null,
                        'CountryCode' => $CountryCode,
                        'Region' => $Region,
                        'District' => $District,
                        'Street' => $Street,
                        'PolicyHolderPhoneNumber' => $PolicyHolderPhoneNumber,
                        'PolicyHolderFax' => null,
                        'PostalAddress' => $PostalAddress,
                        'EmailAddress' => null,
                    ],
                ],
                'MotorDtl' => [
                    'MotorCategory' => $MotorCategory,
                    'MotorType' => $MotorType,
                    'RegistrationNumber' => $RegistrationNumber,
                    'ChassisNumber' => $ChassisNumber,
                    'Make' => $Make,
                    'Model' => $Model,
                    'ModelNumber' => $ModelNumber,
                    'BodyType' => $BodyType,
                    'Color' => $Color,
                    'EngineNumber' => $EngineNumber,
                    'EngineCapacity' => $EngineCapacity,
                    'FuelUsed' => $FuelUsed,
                    'NumberOfAxles' => $NumberOfAxles,
                    'AxleDistance' => $AxleDistance,
                    'SittingCapacity' => $SittingCapacity,
                    'YearOfManufacture' => $YearOfManufacture,
                    'TareWeight' => $TareWeight,
                    'GrossWeight' => $GrossWeight,
                    'MotorUsage' => $MotorUsage,
                    'OwnerName' => $OwnerName,
                    'OwnerCategory' => $OwnerCategory,
                    'OwnerAddress' => $OwnerAddress,
                ],

            ],
        ];


        $Motor = [
            "coverage_id" => $coverage_id,
            "customer_id" => $customer_id,
            "cover_note_type_id" => $cover_note_type_id,
            "sale_point_code" => $salePointCode,
            "cover_note_desc" => $CoverNoteDesc ?? "",
            "operative_clause" => $OperativeClause ?? "",
            "cover_note_start_date" => $request->cover_note_start_date,
            "cover_note_end_date" => $CoverNoteEndDate,
            "cover_note_duration" => $request->cover_note_duration,
            "payment_mode" => $paymentModeId,
            "currency_code" => $currencyCodeId,
            "exchange_rate" => $exchangeRate,
            "total_premium_excluding_tax" => $TotalPremiumExcludingTax,
            "total_premium_including_tax" => $TotalPremiumIncludingTax,
            "commission_paid" => $CommisionPaid,
            "commission_rate" => $CommisionRate,
            "officer_name" => $OfficerName,
            "officer_title" => $OfficerTitle,
            "product_code" => $ProductCode,
            "cover_note_reference" => otherUniqueID(),
            "sum_insured" => $SumInsured,
            "sum_insured_equivalent" => $SumInsuredEquivalent,
            "premium_rate" => $PremiumRate,
            "premium_before_discount" => $PremiumBeforeDiscount,
            "premium_after_discount" => $PremiumAfterDiscount,
            "premium_excluding_tax_equivalent" => $PremiumExcludingTaxEquivalent,
            "premium_including_tax" => $PremiumIncludingTax,
            "tax_code" => $TaxCode,
            "is_tax_exempted" => $IsTaxExempted == "N" ? 0 : 1,
            "tax_rate" => $TaxRate,
            "tax_amount" => $TaxAmount,
            "subject_matter_reference" => $SubjectMatterReference,
            "subject_matter_description" => $SubjectMatterDescription,
            "policy_holder_name" => $PolicyHolderName,
            "policy_holder_birth_date" => $PolicyHolderBirthDate,
            "policy_holder_type" => $PolicyHolderType,
            "policy_holder_id_number" => $PolicyHolderIdNumber,
            "policy_holder_id_type" => $PolicyHolderIdType,
            "country_code" => $CountryCode,
            "region" => $Region,
            "district" => $District,
            "street" => $Street,
            "policy_holder_phone_number" => $PolicyHolderPhoneNumber,
            "postal_address" => $PostalAddress,
            "risk_code" => $RiskCode,
            "motor_category" => $MotorCategory,
            "motor_type" => $MotorType,
            "registration_number" => $RegistrationNumber,
            "chassis_number" => $ChassisNumber,
            "make" => $Make,
            "model" => $Model,
            "model_number" => $ModelNumber,
            "body_type" => $BodyType,
            "color" => $Color,
            "engine_number" => $EngineNumber,
            "engine_capacity" => $EngineCapacity,
            "fuel_used" => $fuel_used,
        ];
        try {

            $quotation = Quotation::create($Motor);


            $gen_data = generateXML('MotorCoverNoteRefReq', $data);

            Log::channel('tiramisxml')->info($gen_data);
            $res = TiraRequest('http://41.59.86.178:8091/ecovernote/api/covernote/non-life/motor/v2/request', $gen_data);

            // return $res;

            return response()->json([
                'success' => 'Quotation created successfully',
                'quotation' => $quotation,
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



    // Prepared to test 1.2 Non-Life Motor Covernote - To verify if the user can submit real-time non-life motor cover note details for a registered vehicle successfully
    public function submitMotorCoverNoteRefReq()
    {
        $request_id = generateRequestID();
        $other_id = otherUniqueID();
        $xmlData = '<MotorCoverNoteRefReq>
        <CoverNoteHdr>
            <RequestId>' . $request_id . '</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallBackUrl>http://nio.co.tz/api/CoverNoteref/response</CallBackUrl>
            <InsurerCompanyCode>IC001</InsurerCompanyCode>
            <TranCompanyCode>IC001</TranCompanyCode>
            <CoverNoteType>1</CoverNoteType>
        </CoverNoteHdr>
        <CoverNoteDtl>
            <CoverNoteNumber>' . $other_id . '</CoverNoteNumber>
            <PrevCoverNoteReferenceNumber></PrevCoverNoteReferenceNumber>
            <SalePointCode>SP001</SalePointCode>
            <CoverNoteStartDate>2020-09-15T13:55:22</CoverNoteStartDate>
            <CoverNoteEndDate>2021-07-30T23:59:59</CoverNoteEndDate>
            <CoverNoteDesc>CoverNote for private hatchback motor</CoverNoteDesc>
            <OperativeClause>Motor Comprehensive cover</OperativeClause>
            <PaymentMode>1</PaymentMode>
            <CurrencyCode>USD</CurrencyCode>
            <ExchangeRate>2000.00</ExchangeRate>
            <TotalPremiumExcludingTax>3000.00</TotalPremiumExcludingTax>
            <TotalPremiumIncludingTax>3380.00</TotalPremiumIncludingTax>
            <CommissionPaid>0.00</CommissionPaid>
            <CommissionRate>0.00</CommissionRate>
            <OfficerName>John Doe</OfficerName>
            <OfficerTitle>Underwriter</OfficerTitle>
            <ProductCode>CP20100000</ProductCode>
            <EndorsementType></EndorsementType>
            <EndorsementReason></EndorsementReason>
            <EndorsementPremiumEarned></EndorsementPremiumEarned>
            <RisksCovered>
                <RiskCovered>
                    <RiskCode>RK20100001</RiskCode>
                    <SumInsured>5000</SumInsured>
                    <SumInsuredEquivalent>5000</SumInsuredEquivalent>
                    <PremiumRate>0.20</PremiumRate>
                    <PremiumBeforeDiscount>1000.00</PremiumBeforeDiscount>
                    <PremiumAfterDiscount>1000.00</PremiumAfterDiscount>
                    <PremiumExcludingTaxEquivalent>1000.00</PremiumExcludingTaxEquivalent>
                    <PremiumIncludingTax>1190.00</PremiumIncludingTax>
                    <DiscountsOffered>
                        <DiscountOffered>
                            <DiscountType>1</DiscountType>
                            <DiscountRate>0.02</DiscountRate>
                            <DiscountAmount>10000</DiscountAmount>
                        </DiscountOffered>
                    </DiscountsOffered>
                    <TaxesCharged>
                        <TaxCharged>
                            <TaxCode>VAT-MAINLAND</TaxCode>
                            <IsTaxExempted>Y</IsTaxExempted>
                            <TaxExemptionType>2</TaxExemptionType>
                            <TaxExemptionReference>14-RF</TaxExemptionReference>
                            <TaxRate>0.18</TaxRate>
                            <TaxAmount>180</TaxAmount>
                        </TaxCharged>
                    </TaxesCharged>
                </RiskCovered>
            </RisksCovered>
            <SubjectMattersCovered>
                <SubjectMatter>
                    <SubjectMatterReference>HSB001</SubjectMatterReference>
                    <SubjectMatterDesc>School Bus</SubjectMatterDesc>
                </SubjectMatter>
            </SubjectMattersCovered>
            <CoverNoteAddons>
                <CoverNoteAddon>
                    <AddonReference>1</AddonReference>
                    <AddonDesc>Wind Shield</AddonDesc>
                    <AddonAmount>2000</AddonAmount>
                    <AddonPremiumRate>0.02</AddonPremiumRate>
                    <PremiumExcludingTax>2000.00</PremiumExcludingTax>
                    <PremiumExcludingTaxEquivalent>2000.00</PremiumExcludingTaxEquivalent>
                    <PremiumIncludingTax>2380.00</PremiumIncludingTax>
                    <TaxesCharged>
                        <TaxCharged>
                            <TaxCode>VAT</TaxCode>
                            <IsTaxExempted>N</IsTaxExempted>
                            <TaxExemptionType></TaxExemptionType>
                            <TaxExemptionReference></TaxExemptionReference>
                            <TaxRate>0.18</TaxRate>
                            <TaxAmount>360</TaxAmount>
                        </TaxCharged>
                    </TaxesCharged>
                </CoverNoteAddon>
            </CoverNoteAddons>
            <PolicyHolders>
                <PolicyHolder>
                    <PolicyHolderName>Augustino Aidan Mwageni</PolicyHolderName>
                    <PolicyHolderBirthDate>1920-02-05</PolicyHolderBirthDate>
                    <PolicyHolderType>1</PolicyHolderType>
                    <PolicyHolderIdNumber>24241241</PolicyHolderIdNumber>
                    <PolicyHolderIdType>1</PolicyHolderIdType>
                    <Gender>M</Gender>
                    <CountryCode>TZA</CountryCode>
                    <Region>Region</Region>
                    <District>Ilala</District>
                    <Street></Street>
                    <PolicyHolderPhoneNumber>255713525539</PolicyHolderPhoneNumber>
                    <PolicyHolderFax></PolicyHolderFax>
                    <PostalAddress>P.O.BOX 1231,Dar es Salaam</PostalAddress>
                    <EmailAddress>minni@email.com</EmailAddress>
                </PolicyHolder>
            </PolicyHolders>
            <MotorDtl>
                <MotorCategory>1</MotorCategory>
                <MotorType>1</MotorType>
                <RegistrationNumber>T2410WA</RegistrationNumber>
                <ChassisNumber>NCP314345436334</ChassisNumber>
                <Make>Toyota</Make>
                <Model>ISF</Model>
                <ModelNumber>TA232353455</ModelNumber>
                <BodyType>Station Wagon</BodyType>
                <Color>Blue</Color>
                <EngineNumber>2423253535</EngineNumber>
                <EngineCapacity>2300</EngineCapacity>
                <FuelUsed>Petrol</FuelUsed>
                <NumberOfAxles>3</NumberOfAxles>
                <AxleDistance></AxleDistance>
                <SittingCapacity></SittingCapacity>
                <YearOfManufacture>2001</YearOfManufacture>
                <TareWeight>2000</TareWeight>
                <GrossWeight>2000</GrossWeight>
                <MotorUsage>1</MotorUsage>
                <OwnerName>Juma Wamugamba</OwnerName>
                <OwnerCategory>1</OwnerCategory>
                <OwnerAddress>2242-34/23 Dar es Salaam</OwnerAddress>
            </MotorDtl>
        </CoverNoteDtl>
    </MotorCoverNoteRefReq>';


        //generate signature
        $signature = EncryptionServiceController::createTiramisSignature($xmlData);

        $xmlRequest = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
   ' . $xmlData . '
   <MsgSignature>' . $signature . '</MsgSignature>
</TiraMsg>';

        Log::channel('tiramisxml')->info($xmlRequest);


        $certPath = storage_path('tiramis_certs/tiramisclient.crt');
        $keyPath = storage_path('tiramis_certs/tiramisclient.key');

        $response = Http::withOptions([
            'cert' => $certPath,
            'ssl_key' => $keyPath,
            'verify' => false,
        ])
            ->withHeaders([
                'Content-Type' => 'application/xml',
                'ClientCode' => 'IB10152',
                'ClientKey' => '1Xr@Jnq74&cYaSl2',
                'SystemCode' => 'TP_KMJ_001',
                'SystemName' => 'KMJ System',
            ])
            ->withBody($xmlRequest, 'application/xml')
            ->post('http://41.59.86.178:8091/ecovernote/api/covernote/non-life/motor/v2/request');

        // Log the response for debugging
        //\Log::info('TIRA Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }





    // Prepared to test 1.3 Motor Fleet Submission - To verify if the Motor fleet can be submitted successfully
    public function submitMotorCoverNoteRefReqWithFleet()
    {
        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
    <MotorCoverNoteRefReq>
        <CoverNoteHdr>
            <RequestId>KMJTEST004</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallBackUrl>http://nic.co.tz/api/CoverNoteref/response</CallBackUrl>
            <InsurerCompanyCode>IC001</InsurerCompanyCode>
            <TranCompanyCode>IC001</TranCompanyCode>
            <CoverNoteType>1</CoverNoteType>
        </CoverNoteHdr>
        <CoverNoteDtl>
            <FleetHdr>
                <FleetId>FL122340</FleetId>
                <FleetType>1</FleetType>
                <FleetSize>69</FleetSize>
                <ComprehensiveInsured>20</ComprehensiveInsured>
                <SalePointCode>SP001</SalePointCode>
                <CoverNoteStartDate>2020-09-15T13:55:22</CoverNoteStartDate>
                <CoverNoteEndDate>2021-07-30T23:59:59</CoverNoteEndDate>
                <PaymentMode>1</PaymentMode>
                <CurrencyCode>USD</CurrencyCode>
                <ExchangeRate>2000.00</ExchangeRate>
                <TotalPremiumExcludingTax>3000.00</TotalPremiumExcludingTax>
                <TotalPremiumIncludingTax>3380.00</TotalPremiumIncludingTax>
                <CommissionPaid>0.00</CommissionPaid>
                <CommissionRate>0.00</CommissionRate>
                <OfficerName>John Doe</OfficerName>
                <OfficerTitle>Underwriter</OfficerTitle>
                <ProductCode>CP20100000</ProductCode>
                <PolicyHolders>
                    <PolicyHolder>
                        <PolicyHolderName>Augustino Aidan Mwageni</PolicyHolderName>
                        <PolicyHolderBirthDate>1920-02-05</PolicyHolderBirthDate>
                        <PolicyHolderType>1</PolicyHolderType>
                        <PolicyHolderIdNumber>24241241</PolicyHolderIdNumber>
                        <PolicyHolderIdType>1</PolicyHolderIdType>
                        <Gender>M</Gender>
                        <CountryCode>TZA</CountryCode>
                        <Region>Region</Region>
                        <District>Ilala</District>
                        <Street></Street>
                        <PolicyHolderPhoneNumber>255713525539</PolicyHolderPhoneNumber>
                        <PolicyHolderFax></PolicyHolderFax>
                        <PostalAddress>P.O.BOX 1231,Dar es Salaam</PostalAddress>
                        <EmailAddress>minni@email.com</EmailAddress>
                    </PolicyHolder>
                </PolicyHolders>
            </FleetHdr>
            <FleetDtl>
                <FleetEntry>1</FleetEntry>
                <CoverNoteNumber>NIC00004</CoverNoteNumber>
                <PrevCoverNoteReferenceNumber>32525-25211-33344</PrevCoverNoteReferenceNumber>
                <CoverNoteDesc>CoverNote for private vehicle</CoverNoteDesc>
                <OperativeClause>Fire and Allied Perils</OperativeClause>
                <EndorsementType></EndorsementType>
                <EndorsementReason></EndorsementReason>
                <EndorsementPremiumEarned></EndorsementPremiumEarned>
                <RisksCovered>
                    <RiskCovered>
                        <RiskCode>RK20100001</RiskCode>
                        <SumInsured>5000</SumInsured>
                        <SumInsuredEquivalent>5000</SumInsuredEquivalent>
                        <PremiumRate>0.20</PremiumRate>
                        <PremiumBeforeDiscount>1000.00</PremiumBeforeDiscount>
                        <PremiumAfterDiscount>1000.00</PremiumAfterDiscount>
                        <PremiumExcludingTaxEquivalent>1000.00</PremiumExcludingTaxEquivalent>
                        <PremiumIncludingTax>1190.00</PremiumIncludingTax>
                        <DiscountsOffered>
                            <DiscountOffered>
                                <DiscountType>1</DiscountType>
                                <DiscountRate>0.02</DiscountRate>
                                <DiscountAmount>10000</DiscountAmount>
                            </DiscountOffered>
                        </DiscountsOffered>
                        <TaxesCharged>
                            <TaxCharged>
                                <TaxCode>VAT</TaxCode>
                                <IsTaxExempted>N</IsTaxExempted>
                                <TaxExemptionType></TaxExemptionType>
                                <TaxExemptionReference></TaxExemptionReference>
                                <TaxRate>0.18</TaxRate>
                                <TaxAmount>180</TaxAmount>
                            </TaxCharged>
                            <TaxCharged>
                                <TaxCode>WITHHOLDING</TaxCode>
                                <IsTaxExempted>N</IsTaxExempted>
                                <TaxExemptionType></TaxExemptionType>
                                <TaxExemptionReference></TaxExemptionReference>
                                <TaxRate>0.01</TaxRate>
                                <TaxAmount>10</TaxAmount>
                            </TaxCharged>
                        </TaxesCharged>
                    </RiskCovered>
                </RisksCovered>
                <SubjectMattersCovered>
                    <SubjectMatter>
                        <SubjectMatterReference>HSB001</SubjectMatterReference>
                        <SubjectMatterDesc>School Bus</SubjectMatterDesc>
                    </SubjectMatter>
                </SubjectMattersCovered>
                <CoverNoteAddons>
                    <CoverNoteAddon>
                        <AddonReference>1</AddonReference>
                        <AddonDesc>Wind Shield</AddonDesc>
                        <AddonAmount>2000</AddonAmount>
                        <AddonPremiumRate>0.02</AddonPremiumRate>
                        <PremiumExcludingTax>2000.00</PremiumExcludingTax>
                        <PremiumExcludingTaxEquivalent>2000.00</PremiumExcludingTaxEquivalent>
                        <PremiumIncludingTax>2380.00</PremiumIncludingTax>
                        <TaxesCharged>
                            <TaxCharged>
                                <TaxCode>VAT</TaxCode>
                                <IsTaxExempted>N</IsTaxExempted>
                                <TaxExemptionType></TaxExemptionType>
                                <TaxExemptionReference></TaxExemptionReference>
                                <TaxRate>0.18</TaxRate>
                                <TaxAmount>360</TaxAmount>
                            </TaxCharged>
                        </TaxesCharged>
                    </CoverNoteAddon>
                </CoverNoteAddons>
                <MotorDtl>
                    <MotorCategory>1</MotorCategory>
                    <MotorType>1</MotorType>
                    <RegistrationNumber>T136DBC</RegistrationNumber>
                    <ChassisNumber>NCP604345436334</ChassisNumber>
                    <Make>Toyota</Make>
                    <Model>Noah</Model>
                    <ModelNumber>TA23411132353455</ModelNumber>
                    <BodyType>Min Van</BodyType>
                    <Color>Silver</Color>
                    <EngineNumber>11134331423253535</EngineNumber>
                    <EngineCapacity>1800</EngineCapacity>
                    <FuelUsed>Petrol</FuelUsed>
                    <NumberOfAxles>2</NumberOfAxles>
                    <AxleDistance></AxleDistance>
                    <SittingCapacity>8</SittingCapacity>
                    <YearOfManufacture>2003</YearOfManufacture>
                    <TareWeight>2000</TareWeight>
                    <GrossWeight>2000</GrossWeight>
                    <MotorUsage>1</MotorUsage>
                    <OwnerName>KISWIGU Company Ltd</OwnerName>
                    <OwnerCategory>1</OwnerCategory>
                    <OwnerAddress></OwnerAddress>
                </MotorDtl>
            </FleetDtl>
        </CoverNoteDtl>
    </MotorCoverNoteRefReq>
    <MsgSignature>M+72ByujGraprJHL8JJIHuOZeg0pqXQf2FVqB/K6nLqKp2BPhY/WNsEq8OuzNeXVMlyGLIU87otrkqZtNNAt7WWwIdY9qz3rm+cpwRsycrP1rxUlrA1ypS82XqNkJtmNfL8aiXjkuh6QSKzNfuaRVNPFIYzsnTvpYQlTk4/gW0Wv8568Qri1l8rKISmuSIvGcBhCMspUPwj2E9JaOujARljojVaCtXC0YnmtDIsfb2x8tOnqvuIX8yGL4fydrP1aull+A4agyzjN93XWcjL2nZ16Pl8MySYWNJ3qc74fT6o6y6cbfqyFg/T4tUIXDykY4tWplNxYGo9O2fTSv0c/rg==</MsgSignature>
</TiraMsg>';

        $response = Http::withOptions([
            'cert' => $this->certPath,
            'ssl_key' => $this->keyPath,
            'verify' => false,
        ])
            ->withHeaders($this->headers)
            ->withBody($xmlData, 'application/xml')
            ->post('https://41.59.86.178:8091/ecovernote/api/covernote/non-life/motor-fleet/v2/request');

        Log::info('TIRA MotorCoverNoteRefReq With Fleet Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }





    // Prepared to test 3 Reinsurance - To verify if the reinsurance details can be submitted successfully
    public function submitReinsuranceReq()
    {
        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
    <ReinsuranceReq>
        <ReinsuranceHdr>
            <RequestId>KMJTEST005</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallBackUrl>http://nic.co.tz/api/coverNoteref/response</CallBackUrl>
            <InsurerCompanyCode>IC0003</InsurerCompanyCode>
            <CoverNoteReferenceNumber>CV224223255</CoverNoteReferenceNumber>
            <PremiumIncludingTax>1220.00</PremiumIncludingTax>
            <CurrencyCode>USD</CurrencyCode>
            <ExchangeRate>2000.00</ExchangeRate>
            <AuthorizingOfficerName>John Doe</AuthorizingOfficerName>
            <AuthorizingOfficerTitle>CFO</AuthorizingOfficerTitle>
            <ReinsuranceCategory>1</ReinsuranceCategory>
        </ReinsuranceHdr>
        <ReinsuranceDtl>
            <ParticipantCode>IC0003</ParticipantCode>
            <ParticipantType>1</ParticipantType>
            <ReinsuranceForm>1</ReinsuranceForm>
            <ReinsuranceType>1</ReinsuranceType>
            <ReBrokerCode></ReBrokerCode>
            <BrokerageCommission>1</BrokerageCommission>
            <ReinsuranceCommission>0.87</ReinsuranceCommission>
            <PremiumShare>1061.40</PremiumShare>
            <ParticipationDate>2021-07-30T23:59:59</ParticipationDate>
        </ReinsuranceDtl>
    </ReinsuranceReq>
    <MsgSignature>figntiojwjfuuehgrbphechehefefewbfwiufwnihfergiengi</MsgSignature>
</TiraMsg>';

        $response = Http::withOptions([
            'cert' => $this->certPath,
            'ssl_key' => $this->keyPath,
            'verify' => false,
        ])
            ->withHeaders($this->headers)
            ->withBody($xmlData, 'application/xml')
            ->post('https://41.59.86.178:8091/ecovernote/api/reinsurance/v1/request');

        Log::info('TIRA ReinsuranceReq Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }





    // Prepared to test 2 Policy - To verify if the covernote policy details can be submitted successfully
    public function submitPolicyReq()
    {
        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
    <PolicyReq>
        <PolicyHdr>
            <RequestId>KMJTEST006</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallBackUrl>http://nic.co.tz/api/CoverNoteref/response</CallBackUrl>
            <InsurerCompanyCode>IC001</InsurerCompanyCode>
        </PolicyHdr>
        <PolicyDtl>
            <PolicyNumber>CV224223255</PolicyNumber>
            <PolicyOperativeClause>Motor Comprehensive cover</PolicyOperativeClause>
            <SpecialConditions>No special conditions</SpecialConditions>
            <Exclusions>War and nuclear risks excluded</Exclusions>
            <AppliedCoverNotes>
                <CoverNoteReferenceNumber>4242424</CoverNoteReferenceNumber>
                <CoverNoteReferenceNumber>2323235</CoverNoteReferenceNumber>
                <CoverNoteReferenceNumber>4353646</CoverNoteReferenceNumber>
            </AppliedCoverNotes>
        </PolicyDtl>
    </PolicyReq>
    <MsgSignature>7N5IcbgergreSWgergiwwgwHRCAb57yFP+uHD3Cee9EH548u9we/YPPzYOH+ipo4uTuBBkMS3mbvZDUaRK6Pe22koaQEVekX0W9HtcDt803AoWH1OeTYkCX294pB7iJTNGlu3jThvxXSIGEiiFWAcYIsgyjjIIij9aNvoNux7As3Iph0Gs2I3cZHjnEkuYMNsb40H7tpkXZD53saVzUvJEkniswvKhmDTyi/vd8odstltvX4ElPhTyaJopyzMhLVifFMybEUzdGZjAyAdeaFAx6NyWPAwKQu/uj05rQfcC4baWDophq4bjj15K67jCI95wOrk+m03n9A5qvtyhouLgn4Jg==</MsgSignature>
</TiraMsg>';

        $response = Http::withOptions([
            'cert' => $this->certPath,
            'ssl_key' => $this->keyPath,
            'verify' => false,
        ])
            ->withHeaders($this->headers)
            ->withBody($xmlData, 'application/xml')
            ->post('https://41.59.86.178:8091/ecovernote/api/policy/v1/request');

        Log::info('TIRA PolicyReq Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }





    // Prepared to test 4.1 Claim Notification - To verify if claim notification details can be submitted and a claim reference number generated successfully
    public function submitClaimNotificationRefReq()
    {
        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
    <ClaimNotificationRefReq>
        <ClaimNotificationHdr>
            <RequestId>KMJTEST007</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallBackUrl>http://ndc.co.tz/api/CoverNoteref/response</CallBackUrl>
            <InsurerCompanyCode>IC001</InsurerCompanyCode>
            <TranCompanyCode>IC001</TranCompanyCode>
        </ClaimNotificationHdr>
        <ClaimNotificationDtl>
            <ClaimNotificationNumber>NIC00004</ClaimNotificationNumber>
            <CoverNoteReferenceNumber>3252-5252</CoverNoteReferenceNumber>
            <ClaimReportDate>2020-09-15T13:55:22</ClaimReportDate>
            <ClaimFormDullyFilled>Y</ClaimFormDullyFilled>
            <LossDate>2020-09-15T13:55:22</LossDate>
            <LossNature>Fire and Allied Perils</LossNature>
            <LossType>Bodily Injury</LossType>
            <LossLocation>Morogoro</LossLocation>
            <OfficerName>John Doe</OfficerName>
            <OfficerTitle>Underwriter</OfficerTitle>
            <ProductCode>CP20100000</ProductCode>
        </ClaimNotificationDtl>
    </ClaimNotificationRefReq>
    <MsgSignature>fiquitojwjfuuehgrbqhecheihfeqheheiofwhefioewiofhiwhfiowhfi</MsgSignature>
</TiraMsg>';

        $response = Http::withOptions([
            'cert' => $this->certPath,
            'ssl_key' => $this->keyPath,
            'verify' => false,
        ])
            ->withHeaders($this->headers)
            ->withBody($xmlData, 'application/xml')
            ->post('https://41.59.86.178:8091/eclaim/api/claim/claim-notification/v1/request');

        Log::info('TIRA ClaimNotificationRefReq Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }





    // Prepared to test 4.2 Claim Intimation - To verify if claim intimation details can be submitted successfully
    public function submitClaimIntimationReq()
    {
        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
    <ClaimIntimationReq>
        <ClaimIntimationHdr>
            <RequestId>KMJTEST008</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallBackUrl>http://hic.co.tz/api/CoverNoteref/response</CallBackUrl>
            <InsurerCompanyCode>IC100</InsurerCompanyCode>
        </ClaimIntimationHdr>
        <ClaimIntimationDtl>
            <ClaimIntimationNumber>322WQ25234234</ClaimIntimationNumber>
            <ClaimReferenceNumber>10020-25400-07720</ClaimReferenceNumber>
            <CoverNoteReferenceNumber>10020-25400-07720</CoverNoteReferenceNumber>
            <ClaimIntimationDate>2020-09-10T13:55:22</ClaimIntimationDate>
            <CurrencyCode>USD</CurrencyCode>
            <ExchangeRate>2000.00</ExchangeRate>
            <ClaimEstimatedAmount>2000000.00</ClaimEstimatedAmount>
            <ClaimReserveAmount>1000000.00</ClaimReserveAmount>
            <ClaimReserveMethod>Chain_Ladder</ClaimReserveMethod>
            <LossAssessmentOption>1</LossAssessmentOption>
            <AssessorName>Baraka_Kiswigu</AssessorName>
            <AssessorIdNumber>124214114</AssessorIdNumber>
            <AssessorIdType>1</AssessorIdType>
            <Claimants>
                <Claimant>
                    <ClaimantName>Augustino_Aidan_Mwageni</ClaimantName>
                    <ClaimantBirthDate>1920-02-05</ClaimantBirthDate>
                    <ClaimantCategory>2</ClaimantCategory>
                    <ClaimantType>1</ClaimantType>
                    <ClaimantIdNumber>24241241</ClaimantIdNumber>
                    <ClaimantIdType>1</ClaimantIdType>
                    <Gender>M</Gender>
                    <CountryCode>TZA</CountryCode>
                    <Region>Region</Region>
                    <District>Ilala</District>
                    <Street></Street>
                    <ClaimantPhoneNumber>255713525539</ClaimantPhoneNumber>
                    <ClaimantFax></ClaimantFax>
                    <PostalAddress></PostalAddress>
                    <EmailAddress></EmailAddress>
                </Claimant>
            </Claimants>
        </ClaimIntimationDtl>
    </ClaimIntimationReq>
    <MsgSignature>fiquilojwjfuuehgrhghecheihfeqheheiofwhefioewiofhiwhfiowhfi</MsgSignature>
</TiraMsg>';

        $response = Http::withOptions([
            'cert' => $this->certPath,
            'ssl_key' => $this->keyPath,
            'verify' => false,
        ])
            ->withHeaders($this->headers)
            ->withBody($xmlData, 'application/xml')
            ->post('https://41.59.86.178:8091/eclaim/api/claim/claim-intimation/v1/request');

        Log::info('TIRA ClaimIntimationReq Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }






    // Prepared to test 4.3 Claim Assessment - To verify if claim assessment details can be submitted successfully
    public function submitClaimAssessmentReq()
    {
        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
    <ClaimAssessmentReq>
        <ClaimAssessmentHdr>
            <RequestId>KMJTEST009</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallBackUrl>http://hic.co.tz/api/CoverNoteref/response</CallBackUrl>
            <InsurerCompanyCode>IC100</InsurerCompanyCode>
        </ClaimAssessmentHdr>
        <ClaimAssessmentDtl>
            <ClaimAssessmentNumber>322WQ25234234</ClaimAssessmentNumber>
            <ClaimIntimationNumber>35234234</ClaimIntimationNumber>
            <ClaimReferenceNumber>10020-25400-07720</ClaimReferenceNumber>
            <CoverNoteReferenceNumber>10020-25400-07720</CoverNoteReferenceNumber>
            <AssessmentReceivedDate>2020-09-10T13:55:22</AssessmentReceivedDate>
            <AssessmentReportSummary>Vehicle total loss due to fire accident</AssessmentReportSummary>
            <CurrencyCode>USD</CurrencyCode>
            <ExchangeRate>2000.00</ExchangeRate>
            <AssessmentAmount>20000.00</AssessmentAmount>
            <ApprovedClaimAmount>20000.00</ApprovedClaimAmount>
            <ClaimApprovalDate>2020-09-10T13:55:22</ClaimApprovalDate>
            <ClaimApprovalAuthority>CEO</ClaimApprovalAuthority>
            <IsReAssessment>Y</IsReAssessment>
            <Claimants>
                <Claimant>
                    <ClaimantCategory>2</ClaimantCategory>
                    <ClaimantType>1</ClaimantType>
                    <ClaimantIdNumber>24241241</ClaimantIdNumber>
                    <ClaimantIdType>1</ClaimantIdType>
                </Claimant>
            </Claimants>
        </ClaimAssessmentDtl>
    </ClaimAssessmentReq>
    <MsgSignature>fiquitojwjfuuehgrhghecheihfeqheheiofwhefiowiofhiwhfiowhfi</MsgSignature>
</TiraMsg>';

        $response = Http::withOptions([
            'cert' => $this->certPath,
            'ssl_key' => $this->keyPath,
            'verify' => false,
        ])
            ->withHeaders($this->headers)
            ->withBody($xmlData, 'application/xml')
            ->post('https://41.59.86.178:8091/eclaim/api/claim/claim-assessment/v1/request');

        Log::info('TIRA ClaimAssessmentReq Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }





    // Prepared to test 4.4 Claim Discharge Voucher - To verify if the discharge voucher details can be submitted successfully
    public function submitDischargeVoucherReq()
    {
        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
    <DischargeVoucherReq>
        <DischargeVoucherHdr>
            <RequestId>KMJTEST010</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallBackUrl>http://nic.co.tz/api/CoverNoteref/response</CallBackUrl>
            <InsurerCompanyCode>IC100</InsurerCompanyCode>
        </DischargeVoucherHdr>
        <DischargeVoucherDtl>
            <DischargeVoucherNumber>322WQ25234234</DischargeVoucherNumber>
            <ClaimAssessmentNumber>322WQ252323423q4</ClaimAssessmentNumber>
            <ClaimReferenceNumber>10020-25400-07720</ClaimReferenceNumber>
            <CoverNoteReferenceNumber>10020-25400-07720</CoverNoteReferenceNumber>
            <DischargeVoucherDate>2020-09-10T13:55:22</DischargeVoucherDate>
            <CurrencyCode>USD</CurrencyCode>
            <ExchangeRate>2000.00</ExchangeRate>
            <ClaimOfferCommunicationDate>2020-09-10T13:55:22</ClaimOfferCommunicationDate>
            <ClaimOfferAmount>5000000</ClaimOfferAmount>
            <ClaimantResponseDate>2020-09-10T13:55:22</ClaimantResponseDate>
            <AdjustmentDate>2020-09-10T13:55:22</AdjustmentDate>
            <AdjustmentReason>Additional documentation provided</AdjustmentReason>
            <AdjustmentAmount>1000000.00</AdjustmentAmount>
            <ReconciliationDate>2020-09-10T13:55:22</ReconciliationDate>
            <ReconciliationSummary>Agreed settlement amount</ReconciliationSummary>
            <ReconciledAmount>200000</ReconciledAmount>
            <OfferAccepted>N</OfferAccepted>
            <Claimants>
                <Claimant>
                    <ClaimantCategory>2</ClaimantCategory>
                    <ClaimantType>1</ClaimantType>
                    <ClaimantIdNumber>2424241</ClaimantIdNumber>
                    <ClaimantIdType>1</ClaimantIdType>
                </Claimant>
            </Claimants>
        </DischargeVoucherDtl>
    </DischargeVoucherReq>
    <MsgSignature>figniidjwjfuuehgrhphecheihfeqheheidrhefioewiofhiwhfiowhfi</MsgSignature>
</TiraMsg>';

        $response = Http::withOptions([
            'cert' => $this->certPath,
            'ssl_key' => $this->keyPath,
            'verify' => false,
        ])
            ->withHeaders($this->headers)
            ->withBody($xmlData, 'application/xml')
            ->post('https://41.59.86.178:8091/eclaim/api/claim/claim-dischargevoucher/v1/request');

        Log::info('TIRA DischargeVoucherReq Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }





    // Prepared to test 4.5 Claim Payment - To verify if payment details can be submitted successfully
    public function submitClaimPaymentReq()
    {
        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
    <ClaimPaymentReq>
        <ClaimPaymentHdr>
            <RequestId>KMJTEST011</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallBackUrl>http://nic.co.tz/api/CovernNotePref/response</CallBackUrl>
            <InsurerCompanyCode>IC100</InsurerCompanyCode>
        </ClaimPaymentHdr>
        <ClaimPaymentDtl>
            <ClaimPaymentNumber>322WQ25234234</ClaimPaymentNumber>
            <ClaimReferenceNumber>10020-25400-07720</ClaimReferenceNumber>
            <ClaimIntimationNumber>322WQ25234234</ClaimIntimationNumber>
            <CoverNoteReferenceNumber>10020-25400-07720</CoverNoteReferenceNumber>
            <PaymentDate>2020-09-10T13:55:22</PaymentDate>
            <PaidAmount>20000</PaidAmount>
            <PaymentMode>1</PaymentMode>
            <PartiesNotified>Y</PartiesNotified>
            <NetPremiumEarned>200</NetPremiumEarned>
            <ClaimResultedLitigation>N</ClaimResultedLitigation>
            <LitigationReason></LitigationReason>
            <CurrencyCode>USD</CurrencyCode>
            <ExchangeRate>2000.00</ExchangeRate>
            <Claimants>
                <Claimant>
                    <ClaimantCategory>2</ClaimantCategory>
                    <ClaimantType>1</ClaimantType>
                    <ClaimantIdNumber>24241241</ClaimantIdNumber>
                    <ClaimantIdType>1</ClaimantIdType>
                </Claimant>
            </Claimants>
        </ClaimPaymentDtl>
    </ClaimPaymentReq>
    <MsgSignature>fiquitojwjfuuehgrhghecheihfegheheiofwhefioewiofhiwhfiowhfi</MsgSignature>
</TiraMsg>';

        $response = Http::withOptions([
            'cert' => $this->certPath,
            'ssl_key' => $this->keyPath,
            'verify' => false,
        ])
            ->withHeaders($this->headers)
            ->withBody($xmlData, 'application/xml')
            ->post('https://41.59.86.178:8091/eclaim/api/claim/claim-payment/v1/request');

        Log::info('TIRA ClaimPaymentReq Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }





    // Prepared to test 4.6 Claim Rejection - To verify if the claim can be rejected at any stage
    public function submitClaimRejectionReq()
    {
        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
    <ClaimRejectionReq>
        <ClaimRejectionHdr>
            <RequestId>KMJTEST012</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallBackUrl>http://nic.co.tz/api/CoverNoteref/response</CallBackUrl>
            <InsurerCompanyCode>IC100</InsurerCompanyCode>
        </ClaimRejectionHdr>
        <ClaimRejectionDtl>
            <ClaimRejectionNumber>322WQ25234234</ClaimRejectionNumber>
            <ClaimReferenceNumber>10020-25400-07720</ClaimReferenceNumber>
            <ClaimIntimationNumber>322WQ25234234</ClaimIntimationNumber>
            <CoverNoteReferenceNumber>10020-25400-07720</CoverNoteReferenceNumber>
            <RejectionDate>2020-09-10T13:55:22</RejectionDate>
            <RejectionReason>Policy exclusion applies</RejectionReason>
            <ClaimResultedLitigation>N</ClaimResultedLitigation>
            <ClaimAmount>20000</ClaimAmount>
            <CurrencyCode>USD</CurrencyCode>
            <ExchangeRate>2000.00</ExchangeRate>
            <Claimants>
                <Claimant>
                    <ClaimantCategory>2</ClaimantCategory>
                    <ClaimantType>1</ClaimantType>
                    <ClaimantIdNumber>24241241</ClaimantIdNumber>
                    <ClaimantIdType>1</ClaimantIdType>
                </Claimant>
            </Claimants>
        </ClaimRejectionDtl>
    </ClaimRejectionReq>
    <MsgSignature>figuilojwjfuuehgrhphecheihfepheheiofwheflowiofhiwhfiowhfi</MsgSignature>
</TiraMsg>';

        $response = Http::withOptions([
            'cert' => $this->certPath,
            'ssl_key' => $this->keyPath,
            'verify' => false,
        ])
            ->withHeaders($this->headers)
            ->withBody($xmlData, 'application/xml')
            ->post('https://41.59.86.178:8091/eclaim/api/claim/claim-rejection/v1/request');

        Log::info('TIRA ClaimRejectionReq Response: ' . $response->body());

        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }
}
