<?php

namespace App\Http\Controllers;

use App\Models\InsuranceQuotation;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'quotation_id' => 'required|exists:insurance_quotations,id',
            'premium_amount' => 'required|numeric|min:0',
            'premium_currency' => 'required|string|max:3',
            'payment_mode' => 'required|string|max:50',
            'reference_no' => 'required|string|max:100',
            'issuer_bank' => 'nullable|string|max:100',
            'collecting_bank' => 'nullable|string|max:100',
            'amount' => 'required|numeric|min:0',
            'currency' => 'required|string|max:3',
            'exchange_rate' => 'nullable|numeric|min:0',
            'equivalent_amount' => 'nullable|numeric|min:0',
        ]);

       try {
    $receipt = Receipt::create([
        'quotation_id'       => $validated['quotation_id'],
        'premium_amount'     => $validated['premium_amount'],
        'premium_currency'   => $validated['premium_currency'],
        'payment_mode'       => $validated['payment_mode'],
        'reference_no'       => $validated['reference_no'],
        'issuer_bank'        => $validated['issuer_bank'] ?? null,
        'collecting_bank'    => $validated['collecting_bank'] ?? null,
        'amount'             => $validated['amount'],
        'currency'           => $validated['currency'],
        'exchange_rate'      => $validated['exchange_rate'] ?? 1,
        'equivalent_amount'  => $validated['equivalent_amount'] ?? $validated['amount'],
        'receipt_date'       => now(),
    ]);


            // Mark quotation as having a receipt
            InsuranceQuotation::where('id', $validated['quotation_id'])
                ->update([
                    'status' => '1'
                ]);

            DB::commit();

            return redirect()
                ->route('dash.Quotation')
                ->with('success', 'Receipt captured successfully');


        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to capture receipt: ' . $e->getMessage()
            ], 500);
        }
    }
}
