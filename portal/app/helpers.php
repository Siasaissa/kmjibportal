<?php




//return unique request id to be used on tiramis request
use App\Http\Controllers\Authentication\EncryptionServiceController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Spatie\ArrayToXml\ArrayToXml;

function generateRequestID()
{
    return 'RID-KMJ'.date('ymdHis').time();
}


//return unique id for other request
function otherUniqueID()
{
    return 'KMJ'.date('ymdHis').time();
}

function generateXML($tiraTag, $data): string
{
    try {
        return (new ArrayToXml($data, $tiraTag))->dropXmlDeclaration()->prettify()->toXml();
    }
    catch (\Exception $e) {
        report($e);
    }
}

/**
 * Recursively remove null, empty string, and empty array values from an array.
 * Helps prevent emitting empty XML tags that TIRA may reject as incomplete.
 */
function removeNullsRecursive($value)
{
    if (is_array($value)) {
        $filtered = [];
        foreach ($value as $key => $child) {
            $cleanChild = removeNullsRecursive($child);
            $isEmptyArray = is_array($cleanChild) && count($cleanChild) === 0;
            $isEmptyString = $cleanChild === '';
            if ($cleanChild === null || $isEmptyString || $isEmptyArray) {
                continue;
            }
            $filtered[$key] = $cleanChild;
        }
        return $filtered;
    }

    return $value;
}

function generateTiraXml($data, $signature): string
{
    try {
        return "<TiraMsg>$data<MsgSignature>$signature</MsgSignature></TiraMsg>";
    }
    catch (\Exception $e) {
        report($e);
    }
}

function TiraRequest($endPoint, $data): array
{
    $signature = EncryptionServiceController::createTiramisSignature($data);
    $xml = generateTiraXml($data, $signature);

    $res = Http::withOptions(['verify' => false])->withHeaders([
            'ClientCode'   => 'IB10152',
            'ClientKey'    => '1Xr@Jnq74&cYaSl2',
            'SystemCode'   => 'TP_KMJ_001',
            'SystemName'   => 'KMJ System',])
        ->withBody($xml, 'application/xml')
        ->post($endPoint)
        ->body();

    Log::channel('tiramisxml')->info($res);

    return ["response" => $res] ;

}


function returnTiraDate($date): string
{
    return (new Carbon($date))->format('Y-m-d\\TH:i:s');
}

 function getProductId($productCode)
{
    $product = Product::where('product_code', $productCode)->first();
    if (!$product) {
        // Optional: create the product if not found
        $product = Product::create([
            'product_code' => $productCode,
            'name' => 'Unknown Product', // or provide a name dynamically
        ]);
    }
    return $product->id;
}
