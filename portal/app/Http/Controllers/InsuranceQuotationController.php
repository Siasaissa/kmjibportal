<?php

namespace App\Http\Controllers;

use App\Models\Coverage;
use App\Models\InsuranceQuotation;
use App\Models\products;
use App\Models\QuotationDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Insurance;

class InsuranceQuotationController extends Controller
{
public function create(Request $request)
{
    // Capture the submitted IDs
    $coverageId  = $request->input('coverage_id');
    $insuranceId = $request->input('insurance_id');
    $productId   = $request->input('product_id');

    // Fetch product_code from products table
    $productCode = null;
    if ($productId) {
        $product = products::find($productId);
        $productCode = $product?->product_code; // safe navigation
    }

    // Fetch risk_code from coverages table
    $riskCode = null;
    if ($coverageId) {
        $coverage = Coverage::find($coverageId);
        $riskCode = $coverage?->risk_code;
    }

    // Pass everything to the next view
    return view('dash.Quotation1', [
        'coverageId'  => $coverageId,
        'insuranceId' => $insuranceId,
        'productId'   => $productId,
        'riskCode'    => $riskCode,
        'productCode' => $productCode,
    ]);
}



    public function store(Request $request)
    {
        try {
            $validated = $this->validateRequest($request);
            $quotationData = $this->prepareQuotationData($validated);
            $quotation = InsuranceQuotation::create($quotationData);
            $this->handleDocumentUploads($request, $quotation);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Quotation created successfully!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Redirect back with validation errors and old input
            return redirect()->back()->withErrors($e->errors())->withInput();

        } catch (\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with('error', 'Error creating quotation: ' . $e->getMessage())->withInput();
        }
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate([
            // Customer Information
            'insurance_type' => 'required|string|in:Vehicle,Marine,Property',
            'client_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'tin' => 'required|string|max:50',
            'vrn' => 'nullable|string|max:50',
            'id_type' => 'required|string|max:50',
            'id_number' => 'required|string|max:50',
            'dob' => 'nullable|date',
            'customer_type' => 'required|string|max:50',
            'client' => 'nullable|string|max:255',

            // Product Information
            'insurer' => 'nullable|string|max:255',
            'period' => 'required|string|max:50',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'currency' => 'required|string|max:50',
            'business_contact' => 'nullable|string|max:255',
            'no_days' => 'nullable|integer|min:1',
            'file_no' => 'nullable|string|max:50',
            'branch' => 'nullable|string|max:100',
            'fleet_type' => 'nullable|string|max:100',
            'motor_type' => 'required|string|max:50',
            'policy_type' => 'required|string|max:50',
            'previous_quote' => 'nullable|string|max:100',
            'loss_ratio_forecast' => 'nullable|string|max:100',
            'business_type' => 'nullable|string|max:100',
            'business_by' => 'nullable|string|max:100',
            'borrower_type' => 'nullable|string|max:100',
            'first_loss_payee' => 'nullable|string|max:100',
            'bind_collateral' => 'nullable|string|max:100',
            'collateral_name' => 'nullable|string|max:100',
            'fronting_business' => 'nullable|boolean',
            'non_renewable' => 'nullable|boolean',
            'fleet_id' => 'nullable|string|max:50',
            'fleet_seq' => 'nullable|string|max:50',

            // Risk Details
            'reg_no' => 'required|string|max:50',
            'chassis' => 'required|string|max:50',
            'engine' => 'required|string|max:50',
            'make' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'body_type' => 'required|string|max:100',
            'insurance_class' => 'required|string|max:100',
            'fuel_type' => 'required|string|max:50',
            'seats' => 'required|integer|min:1',
            'color' => 'required|string|max:50',
            'owner_category' => 'required|string|max:100',
            'cc' => 'required|string|max:50',
            'registration_year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'accessories_sum' => 'required|numeric|min:0',
            'accessories_info' => 'nullable|string|max:255',
            'windscreen_sum' => 'required|numeric|min:0',
            'windscreen_premium' => 'required|numeric|min:0',
            'axles' => 'required|integer|min:1',
            'short_period' => 'required|numeric|min:0',
            'override' => 'required|numeric|min:0',
            'tppd_sum' => 'required|numeric|min:0',
            'tppd_increase' => 'required|numeric|min:0',
            'enable' => 'nullable|boolean',
            'apply_depreciation' => 'nullable|boolean',

            // Premium Calculation
            'sum_insured' => 'required|numeric|min:0',
            'actual_premium' => 'required|numeric|min:0',
            'adjust_premium' => 'nullable|numeric',
            'discount' => 'nullable|numeric|min:0|max:100',
            'total_premium' => 'required|numeric|min:0',
            'payment_method' => 'required|string|max:50',

            // Finalization
            'additional_notes' => 'nullable|string',
            'confirmCheck' => 'required|accepted',
            'documents' => 'nullable|array',
            'documents.*' => 'file|max:5120', // 5MB
        ], [
            'confirmCheck.accepted' => 'You must confirm that all information is accurate and complete.',
            'end_date.after_or_equal' => 'End date must be after or equal to start date.',
        ]);
    }

    protected function prepareQuotationData(array $validated): array
    {
        return [
            'insurance_type' => $validated['insurance_type'],
            'client_name' => $validated['client_name'],
            'address' => $validated['address'],
            'tin_number' => $validated['tin'],
            'vrn_number' => $validated['vrn'] ?? null,
            'id_type' => $validated['id_type'],
            'id_number' => $validated['id_number'],
            'date_of_birth' => $validated['dob'] ?? null,
            'customer_type' => $validated['customer_type'],
            'insurer' => $validated['insurer'] ?? null,
            'period' => $validated['period'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'currency' => $validated['currency'],
            'business_contact_person' => $validated['business_contact'] ?? null,
            'no_of_days' => $validated['no_days'] ?? null,
            'file_no' => $validated['file_no'] ?? null,
            'branch' => $validated['branch'] ?? null,
            'fleet_type' => $validated['fleet_type'] ?? null,
            'motor_type' => $validated['motor_type'],
            'policy_type' => $validated['policy_type'],
            'previous_quote' => $validated['previous_quote'] ?? null,
            'loss_ratio_forecast' => $validated['loss_ratio_forecast'] ?? null,
            'business_type' => $validated['business_type'] ?? null,
            'business_by' => $validated['business_by'] ?? null,
            'borrower_type' => $validated['borrower_type'] ?? null,
            'first_loss_payee' => $validated['first_loss_payee'] ?? null,
            'bind_collateral' => $validated['bind_collateral'] ?? null,
            'collateral_name' => $validated['collateral_name'] ?? null,
            'fronting_business' => $validated['fronting_business'] ?? false,
            'non_renewable' => $validated['non_renewable'] ?? false,
            'fleet_id' => $validated['fleet_id'] ?? null,
            'fleet_seq' => $validated['fleet_seq'] ?? null,
            'registration_no' => $validated['reg_no'],
            'chassis_number' => $validated['chassis'],
            'engine_number' => $validated['engine'],
            'vehicle_make' => $validated['make'],
            'vehicle_model' => $validated['model'],
            'body_type' => $validated['body_type'],
            'insurance_class' => $validated['insurance_class'],
            'fuel_type' => $validated['fuel_type'],
            'seat_capacity' => $validated['seats'],
            'color' => $validated['color'],
            'owner_category' => $validated['owner_category'],
            'cc' => $validated['cc'],
            'registration_year' => $validated['registration_year'],
            'accessories_sum_insured' => $validated['accessories_sum'],
            'accessories_info' => $validated['accessories_info'] ?? null,
            'windscreen_sum_insured' => $validated['windscreen_sum'],
            'windscreen_premium' => $validated['windscreen_premium'],
            'number_of_axles' => $validated['axles'],
            'short_period_percentage' => $validated['short_period'],
            'override_percentage' => $validated['override'],
            'tppd_sum_insured' => $validated['tppd_sum'],
            'tppd_increase_limit' => $validated['tppd_increase'],
            'enable' => $validated['enable'] ?? true,
            'apply_depreciation' => $validated['apply_depreciation'] ?? false,
            'sum_insured' => $validated['sum_insured'],
            'actual_premium' => $validated['actual_premium'],
            'adjust_premium' => $validated['adjust_premium'] ?? null,
            'discount_percentage' => $validated['discount'] ?? null,
            'total_premium' => $validated['total_premium'],
            'payment_method' => $validated['payment_method'],
            'additional_notes' => $validated['additional_notes'] ?? null,
            'terms_accepted' => $validated['confirmCheck'],
        ];
    }

    protected function handleDocumentUploads(Request $request, InsuranceQuotation $quotation)
    {
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                try {
                    $path = $file->store('quotation_documents/' . $quotation->id, 'public');

                    QuotationDocument::create([
                        'quotation_id' => $quotation->id,
                        'file_path' => $path,
                        'original_name' => $file->getClientOriginalName(),
                        'mime_type' => $file->getClientMimeType(),
                        'size' => $file->getSize(),
                    ]);
                } catch (\Exception $e) {
                    \Log::error('Document upload failed: ' . $e->getMessage());
                    // Continue with other files even if one fails
                    continue;
                }
            }
        }
    }

    public function show(InsuranceQuotation $quotation)
    {
        $quotation->load('documents');
        return view('quotations.show', compact('quotation'));
    }

    public function downloadDocument(InsuranceQuotation $quotation, QuotationDocument $document)
    {
        if ($document->quotation_id !== $quotation->id) {
            abort(404);
        }

        if (!Storage::disk('public')->exists($document->file_path)) {
            abort(404);
        }

        return response()->file(
            Storage::disk('public')->path($document->file_path),
            [
                'Content-Disposition' => 'attachment; filename="' . $document->original_name . '"',
                'Content-Type' => $document->mime_type,
            ]
        );
    }

    public function index()
{
    // Fetch all insurance quotations (you can paginate if needed)
    $quotations = InsuranceQuotation::all();
    $insurance = Insurance::all();

    // Pass to the view
    return view('dash.Quotation', compact('quotations','insurance'));
}

public function getProducts($insuranceId)
{
    // Return both id and product_name
    return Products::where('insurance_id', $insuranceId)
        ->get(['id', 'product_name']);
}

public function getCoverages($productId)
{
    // Return both id and risk_name
    return Coverage::where('product_id', $productId)
        ->get(['id', 'risk_name']);
}




public function qr()
{
    $quotations = InsuranceQuotation::all();

    // Generate QR for each quotation
    foreach ($quotations as $quotation) {
        $data = [
            'client_name' => $quotation->client_name,
            'id_type'     => $quotation->id_type,
            'id_number'   => $quotation->id_number,
            'mobile'      => $quotation->mobile1 ?? '',
            'email'       => $quotation->email1 ?? '',
            'id'          => $quotation->id
        ];

        $jsonData = json_encode($data);

        // Add QR as base64 string to the model instance
        $quotation->qrCode = 'data:image/png;base64,' . base64_encode(
            QrCode::format('png')->size(200)->generate($jsonData)
        );
    }

    return view('dash.Quotation', compact('quotations'));
}


}
