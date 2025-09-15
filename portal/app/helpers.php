<?php




//return unique request id to be used on tiramis request
use App\Http\Controllers\Authentication\EncryptionServiceController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
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

function generateTiraXml($data, $signature): string
{
    return "<TiraMsg>$data<MsgSignature>$signature</MsgSignature></TiraMsg>";
}

function TiraRequest($endPoint, $data): array
{
    $signature = EncryptionServiceController::createTiramisSignature($data);
    $xml = generateTiraXml($data, $signature);

    $res = Http::withOptions(['verify' => false])->withHeaders(
        [
            'Content-Type' => 'application/xml',
            'ClientCode'   => 'IB10152',
            'ClientKey'    => '1Xr@Jnq74&cYaSl2',
            'SystemCode'   => 'TP_KMJ_001',
            'SystemName'   => 'KMJ System',
        ]
        )
        ->withBody($xml, 'application/xml')
        ->post($endPoint)
        ->body();

    return $res;

}


function returnTiraDate($date): string
{
    return (new Carbon($date))->format('Y-m-d\\TH:i:s');
}
