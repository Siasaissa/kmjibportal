<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    public function clients(Request $request)
{
    \Log::debug('Autocomplete request received', ['query' => $request->input('query')]);
    
    $query = $request->input('query');
    
    if (empty($query)) {
        return response()->json([]);
    }

    try {
        $matches = Customer::where('client_name', 'LIKE', "%{$query}%")
                    ->take(10)                 // take 10 first
                    ->pluck('client_name')      // then get only client_name
                    ->toArray();                // convert to array

        \Log::debug('Autocomplete results', ['matches' => $matches]);
        
        return response()->json($matches);
    } catch (\Exception $e) {
        \Log::error('Autocomplete error', ['error' => $e->getMessage()]);
        return response()->json([], 500);
    }
}

}