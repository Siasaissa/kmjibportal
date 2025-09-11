<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
class CustomerController extends Controller
{
    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string',
            'client_name' => 'required|string|max:255',
            'client_status' => 'nullable|string',
            'client_sub_status' => 'nullable|string',
            'aml_risk' => 'nullable|string',
            'id_type' => 'nullable|string',
            'id_number' => 'nullable|string',
            'tin' => 'nullable|string',
            'zrb' => 'nullable|string',
            'appointment_date' => 'nullable|date',
            'account_number' => 'nullable|string',
            'dob' => 'nullable|date',
            'place_of_birth' => 'nullable|string',
            'nationality' => 'nullable|string',
            'gender' => 'nullable|string',
            'marital_status' => 'nullable|string',
            'occupation' => 'nullable|string',
            'disability' => 'nullable|string',
            'business_type' => 'nullable|string',
            'country_of_registration' => 'nullable|string',
            'registration_date' => 'nullable|date',
            'registration_number' => 'nullable|string',
            'contact_person' => 'nullable|string',
            'vrn_gst' => 'nullable|string',
            'region' => 'nullable|string',
            'district' => 'nullable|string',
            'village' => 'nullable|string',
            'sector' => 'nullable|string',
            'cell_street' => 'nullable|string',
            'mandate_expiry' => 'nullable|date',
            'profile_id' => 'nullable|string',
            'profile_category' => 'nullable|string',
            'screening_group_id' => 'nullable|string',
            'address' => 'nullable|string',
            'mobile1' => 'nullable|string',
            'mobile2' => 'nullable|string',
            'mobile3' => 'nullable|string',
            'telephone1' => 'nullable|string',
            'telephone2' => 'nullable|string',
            'telephone3' => 'nullable|string',
            'email1' => 'nullable|email',
            'email2' => 'nullable|email',
            'email3' => 'nullable|email',
            'language' => 'nullable|string',
            'pep' => 'nullable|in:yes,no',
            'additional_notes' => 'nullable|string',
        ]);

        //  Handle checkboxes separately
        $validated['tax_exempted'] = $request->has('tax_exempted');
        $validated['related_party'] = $request->has('related_party');
        $validated['notify_sms'] = $request->has('notify_sms');
        $validated['notify_email'] = $request->has('notify_email');

        try {
            Customer::create($validated);
            return redirect()->back()->with('success', 'Customer saved successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Save failed: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

public function autocomplete(Request $request)
{
    $query = $request->input('query');

    $matches = Customer::where('client_name', 'LIKE', "%{$query}%")
        ->pluck('client_name')
        ->take(10)
        ->toArray(); 

    return response()->json($matches);
}





}
