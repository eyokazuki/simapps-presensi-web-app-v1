<?php
defined('BASEPATH') or exit('No direct script access allowed');
ini_set("memory_limit", "256M");
ini_set('max_execution_time', 0);

class Get_data_api
{

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function get_data($url, $header, $parameter, $is_json_respon)
    {
        $result = [];
        $ch     = curl_init($url);

        /* pass encoded JSON string to the POST fields */
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameter);
        /* pass encoded JSON string to the HEADER fields */
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        /* curl connection timeout */
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
        /* set return type json */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        /*SSL Verifier*/
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        /* execute request */
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        $info = curl_getinfo($ch);
        $time = $info['total_time'];

        if ($httpCode == 200) {
            if ($is_json_respon) {
                $response = json_decode($response, true);
            }
            $result  = [
                "status"    => true,
                "code"      => $httpCode,
                "time"      => $time,
                "response"  => $response
            ];
        } else {
            $response = json_decode($response);
            $result  = [
                "status"    => false,
                "code"      => $httpCode,
                "time"      => $time,
                "response"  => "Gagal sinkron data dengan API"
            ];
        }
        curl_close($ch);

        return $result;
    }
}
