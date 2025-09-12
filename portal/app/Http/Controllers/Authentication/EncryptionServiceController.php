<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class EncryptionServiceController extends Controller
{
    public static function createTiramisSignature($data)
    {
        try {

            $encry_method = 'sha1WithRSAEncryption';
            $private_key = env('TIRAMIS_PRIVATE_KEY');

            $cert_path = Storage::disk('local')->get('tiramis_certs/tiramisclientprivate.pfx');
            openssl_pkcs12_read($cert_path, $cert_info, $private_key);
            openssl_sign($data, $signature, $cert_info['pkey'], $encry_method);
            return base64_encode($signature);

        } catch(\Exception $e) {
            return $e;
        }
    }

    public static function checkTiramisSignature($data, $signature)
    {
        try {

            $client_key = env('TIRAMIS_PUBLIC_KEY');

            $pcert_path = Storage::disk('local')->get('tiramis_certs/tiramispublic.pfx');
            openssl_pkcs12_read($pcert_path, $pcert_info, $client_key);
            $raw_sig = base64_decode($signature);
            return openssl_verify($data, $raw_sig, $pcert_info['extracerts']['0']);

        } catch (\Exception $e) {
            return $e;
        }
    }
}
