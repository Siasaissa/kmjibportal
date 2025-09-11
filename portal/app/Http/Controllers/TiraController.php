<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TiraController extends Controller
{

    private $certPath;
    private $keyPath;
    private $headers;


     public function __construct()
    {
        $this->certPath = storage_path('tiramis_certs/tiramisclient.crt');
        $this->keyPath  = storage_path('tiramis_certs/tiramisclient.key');
        $this->headers = [
            'Content-Type' => 'application/xml',
            'ClientCode' => 'IB10152',
            'ClientKey' => '1Xr@Jnq74&cYaSl2',
            'SystemCode' => 'TP_KMJ_001',
        ];
    }


    //for covernote verification
    public function verifyCoverNote()
    {
        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
   <CoverNoteVerificationReq>
      <VerificationHdr>
         <RequestId>KMJTEST001</RequestId>
         <CompanyCode>IB10152</CompanyCode>
         <SystemCode>TP_KMJ_001</SystemCode>
      </VerificationHdr>
      <VerificationDtl>
         <CoverNoteReferenceNumber>0000-0000-0000</CoverNoteReferenceNumber>
         <StickerNumber>0000-0000-0000</StickerNumber>
         <MotorRegistrationNumber>T000AAA</MotorRegistrationNumber>
         <MotorChassisNumber>CH00000000</MotorChassisNumber>
      </VerificationDtl>
   </CoverNoteVerificationReq>
   <MsgSignature>figuiiojwjfuufewbfwiufwnihfergiengi</MsgSignature>
</TiraMsg>';

        $certPath = storage_path('tiramis_certs/tiramisclient.crt');
        $keyPath  = storage_path('tiramis_certs/tiramisclient.key');

        $response = Http::withOptions([
            'cert'    => $certPath,
            'ssl_key' => $keyPath,
            'verify'  => false,
        ])
        ->withHeaders([
            'Content-Type' => 'application/xml',
            'ClientCode'   => 'IB10152',
            'ClientKey'    => '1Xr@Jnq74&cYaSl2',
            'SystemCode'   => 'TP_KMJ_001',
            'SystemName'   => 'KMJ System',
        ])
        ->withBody($xmlData, 'application/xml')
        ->post('https://41.59.86.178:8091/ecovernote/api/covernote/verification/min/v2/request');

        // Log the response for debugging
        //\Log::info('TIRA Response: ' . $response->body());

        return response($response->body(), 200)
                ->header('Content-Type', 'application/xml');
    }



      // Prepared to test 1.1 Non-Life Other Covernote - To verify if the user can submit real-time other non-life cover note details successfully
    public function submitCoverNoteRefReq()
    {
        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
    <CoverNoteRefReq>
        <CoverNoteHdr>
            <RequestId>KMJTEST002</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallbackUrl>http://nic.co.tz/api/CoverNoteref/response</CallbackUrl>
            <InsurerCompanyCode>ICC001</InsurerCompanyCode>
            <TranCompanyCode>ICC001</TranCompanyCode>
            <CoverNoteType>1</CoverNoteType>
        </CoverNoteHdr>
        <CoverNoteDtl>
            <CoverNoteNumber>NIC00004</CoverNoteNumber>
            <PrevCoverNoteReferenceNumber></PrevCoverNoteReferenceNumber>
            <SalePointCode>SP001</SalePointCode>
            <CoverNoteStartDate>2021-07-04T01:15:22</CoverNoteStartDate>
            <CoverNoteEndDate>2022-07-04T23:59:59</CoverNoteEndDate>
            <CoverNoteDesc>CoverNote for Residential House Insurance at Dar es Salaam Magomens</CoverNoteDesc>
            <OperativeClause>Fire and Allied Perils</OperativeClause>
            <PaymentMode>1</PaymentMode>
            <CurrencyCode>TZS</CurrencyCode>
            <ExchangeRate>1.00</ExchangeRate>
            <TotalPremiumExcludingTax>29060.00</TotalPremiumExcludingTax>
            <TotalPremiumIncludingTax>33570.80</TotalPremiumIncludingTax>
            <CommissionPaid>0.00</CommissionPaid>
            <CommissionRate>0.00</CommissionRate>
            <OfficerName>John Doe</OfficerName>
            <OfficerTitle>Underwriter</OfficerTitle>
            <ProductCode>SP005001000000</ProductCode>
            <EndorsementType></EndorsementType>
            <EndorsementReason></EndorsementReason>
            <EndorsementPremiumEarned></EndorsementPremiumEarned>
            <RisksCovered>
                <RiskCovered>
                    <RiskCode>SP005001000001</RiskCode>
                    <SumInsured>1000000.00</SumInsured>
                    <SumInsuredEquivalent>1000000.00</SumInsuredEquivalent>
                    <PremiumRate>0.005</PremiumRate>
                    <PremiumBeforeDiscount>5000.00</PremiumBeforeDiscount>
                    <PremiumAfterDiscount>4000.00</PremiumAfterDiscount>
                    <PremiumExcludingTaxEquivalent>4000.00</PremiumExcludingTaxEquivalent>
                    <PremiumIncludingTax>4000.00</PremiumIncludingTax>
                    <DiscountsOffered>
                        <DiscountOffered>
                            <DiscountType>2</DiscountType>
                            <DiscountRate>0.00</DiscountRate>
                            <DiscountAmount>1000.00</DiscountAmount>
                        </DiscountOffered>
                    </DiscountsOffered>
                    <TaxesCharged>
                        <TaxCharged>
                            <TaxCode>VAT-MAINLAND</TaxCode>
                            <IsTaxExempted>Y</IsTaxExempted>
                            <TaxExemptionType>1</TaxExemptionType>
                            <TaxExemptionReference>2334ER232TYU</TaxExemptionReference>
                            <TaxRate>0.18</TaxRate>
                            <TaxAmount>720.0</TaxAmount>
                        </TaxCharged>
                    </TaxesCharged>
                </RiskCovered>
            </RisksCovered>
            <SubjectMattersCovered>
                <SubjectMatter>
                    <SubjectMatterReference>HSB001</SubjectMatterReference>
                    <SubjectMatterDesc>House water systems</SubjectMatterDesc>
                </SubjectMatter>
            </SubjectMattersCovered>
            <CoverNoteAddons>
                <CoverNoteAddon>
                    <AddonReference>1</AddonReference>
                    <AddonDesc>Underground Water and Sewer Service Lines</AddonDesc>
                    <AddonAmount>2000.00</AddonAmount>
                    <AddonPremiumRate>0.02</AddonPremiumRate>
                    <PremiumExcludingTax>40.00</PremiumExcludingTax>
                    <PremiumExcludingTaxEquivalent>40.00</PremiumExcludingTaxEquivalent>
                    <PremiumIncludingTax>47.20</PremiumIncludingTax>
                    <TaxesCharged>
                        <TaxCharged>
                            <TaxCode>VAT-MAINLAND</TaxCode>
                            <IsTaxExempted>Y</IsTaxExempted>
                            <TaxExemptionType>1</TaxExemptionType>
                            <TaxExemptionReference>2334ER232TYU</TaxExemptionReference>
                            <TaxRate>0.18</TaxRate>
                            <TaxAmount>7.20</TaxAmount>
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
                    <Region>Regions</Region>
                    <District>Ilala</District>
                    <Street></Street>
                    <PolicyHolderPhoneNumber>255713525539</PolicyHolderPhoneNumber>
                    <PolicyHolderFax></PolicyHolderFax>
                    <PostalAddress>P.O.BOX 1231,Dar es Salaam</PostalAddress>
                    <EmailAddress>mini@email.com</EmailAddress>
                </PolicyHolder>
            </PolicyHolders>
        </CoverNoteDtl>
    </CoverNoteRefReq>
    <MsgSignature>V2vTYbg4G7F4NYb4R/U6VNGdOa+5HRBPPdh+y/jzKwkJrFf3B0J+MOGer39XGHWSiXAZX1qEx13U/0xBgCY8rqK3HcWoMLkhxyspENNizd99WprHW/xR1B3HSUWDEdSkO+yQBstx1LFU0lqkSjzzkqjbDEwI69i2Iw0GoQQcv6r9UyW6tlICqvC+av0U0+oRNIF+tRPvizn3K0e2E6V23s5k5Hn3FOhk1d6P7VhJk1sRdkglh6Yxd11+eerI+xPkeWSeZbdDiAKwCbtFsIxaLDVXegE0ZJEAs/DwTZJhaM2dbrBIFWZB468mUnUoRmf1HFgQR2cSg8/jU2Ng4A4rXQ==</MsgSignature>

</TiraMsg>';

        $response = Http::withOptions([
            'cert' => $this->certPath,
            'ssl_key' => $this->keyPath,
            'verify' => false,
        ])
        ->withHeaders($this->headers)
        ->withBody($xmlData, 'application/xml')
        ->post('https://41.59.86.178:8091/ecovernote/api/covernote/non-life/other/v2/request');

        Log::info('TIRA CoverNoteRefReq Response: ' . $response->body());
        
        return response($response->body(), 200)
            ->header('Content-Type', 'application/xml');
    }






    // Prepared to test 1.2 Non-Life Motor Covernote - To verify if the user can submit real-time non-life motor cover note details for a registered vehicle successfully
    public function submitMotorCoverNoteRefReq()
    {
        $xmlData = '<?xml version="1.0" encoding="UTF-8"?>
<TiraMsg>
    <MotorCoverNoteRefReq>
        <CoverNoteHdr>
            <RequestId>KMJTEST003</RequestId>
            <CompanyCode>IB10152</CompanyCode>
            <SystemCode>TP_KMJ_001</SystemCode>
            <CallBackUrl>http://nio.co.tz/api/CoverNoteref/response</CallBackUrl>
            <InsurerCompanyCode>IC001</InsurerCompanyCode>
            <TranCompanyCode>IC001</TranCompanyCode>
            <CoverNoteType>1</CoverNoteType>
        </CoverNoteHdr>
        <CoverNoteDtl>
            <CoverNoteNumber>NIC00004</CoverNoteNumber>
            <PrevCoverNoteReferenceNumber>32525252</PrevCoverNoteReferenceNumber>
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
    </MotorCoverNoteRefReq>
    <MsgSignature>qrrvrewrwer456354gfwe344/UbyG9YedrOAarU0EJ0frrBpSyBKQpGajIZLh6rz943NSuv8+wzRcRFk2xvJDOm73oYcjeYF4d7Se11HODOsrNS8xBkTJhhvOlaYK/gYHs1SaW6KBI41vzo/9FTJYdGj9vBt9tGMUrDXvDho4dOmNIFFyDDfn80j1K+x07CaxDdLC6R1wJcN51hF9zhC9gfQz3MpN521SDGWzcvgE3tgD22ofy6eh5L2uy56as2TmeHRLOPFbgHo1E0NYh094LR01nyk25w40BKFCXbNMRgAs3L+hsOJu3F7emMWuDSi.zuTgbf10aqipUEF4J2ETOBt1HZ5AczA==</MsgSignature>
</TiraMsg>';

        $response = Http::withOptions([
            'cert' => $this->certPath,
            'ssl_key' => $this->keyPath,
            'verify' => false,
        ])
        ->withHeaders($this->headers)
        ->withBody($xmlData, 'application/xml')
        ->post('https://41.59.86.178:8091/ecovernote/api/covernote/non-life/motor/v2/request');

        Log::info('TIRA MotorCoverNoteRefReq Response: ' . $response->body());
        
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
    <MsgSignature>figni10jwjfuuehgrhghecheihfegheheiofwheflowiofhiwhfiowhfi</MsgSignature>
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
