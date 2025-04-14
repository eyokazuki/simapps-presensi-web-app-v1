<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("api_m", "models");
    }

    private function authentication($method_controller)
    {
        $headers = $this->input->request_headers();
        $method = $this->input->method();

        if (strtolower($method) == strtolower($method_controller)) {
            $signature = isset($headers["X-Signature"]) ? $headers["X-Signature"] : "";
            $auth = isset($headers["X-Auth"]) ? $headers["X-Auth"] : "";
            $time = isset($headers["X-Time"]) ? $headers["X-Time"] : "";
            $device = isset($headers["X-Device"]) ? $headers["X-Device"] : "";
            if ($signature != "" && $auth != "" && $time != "" && $device != "") {
                $get_setting = $this->models->get_setting_api($device);
                if ($get_setting->num_rows() > 0) {
                    $data_setting = $get_setting->row();
                    $batas_waktu  = $data_setting->limit_time;
                    $sk = $data_setting->secret_key;
                    if (time() - $time <= $batas_waktu) {
                        $make_signature = $this->makeSignature($device, $sk, $time);
                        if ($make_signature["signature"] == $signature && $make_signature["auth"] == $auth) {
                            $response = [
                                "status" => 200,
                                "message"   => "OK",
                                "response"    => true
                            ];
                        } else {
                            $response = [
                                "status" => 401,
                                "message"   => "Unauthorized",
                                "response"    => false
                            ];
                        }
                    } else {
                        $response = [
                            "status" => 410,
                            "message"   => "Gone",
                            "response"    => false
                        ];
                    }
                } else {
                    $response = [
                        "status" => 404,
                        "message"   => "Not Found",
                        "response"    => false
                    ];
                }
            } else {
                $response = [
                    "status" => 404,
                    "message"   => "Not Found",
                    "response"    => false
                ];
            }
        } else {
            $response = [
                "status" => 405,
                "message"   => "Method Not Allowed",
                "response"    => false
            ];
        }




        return $response;
    }

    private function makeSignature($device, $secret_key, $timestamp)
    {
        $signature =  hash_hmac('sha256', $secret_key . "-" . $timestamp . "-" . $device, $secret_key);
        $auth = base64_encode($signature);

        return [
            "signature" => $signature,
            "auth" => $auth,
            "time" => $timestamp,
            "device" => $device
        ];
    }

    public function create_sign()
    {
        $sk = $this->input->post("sk");
        $device = $this->input->post("device");
        $timestamp = time();

        $data_sign = $this->makeSignature($device, $sk, $timestamp);
        $data = [
            "status" => 200,
            "message"   => "OK",
            "time"  => time(),
            "response"    => true,
            "data"  => $data_sign
        ];

        $this->response($data);
    }

    private function response($data)
    {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header($data["status"])
            ->set_output(json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
            ->_display();
        exit();
    }

    public function index()
    {

        $response_auth = $this->authentication("post");

        $this->response($response_auth);
    }
}
