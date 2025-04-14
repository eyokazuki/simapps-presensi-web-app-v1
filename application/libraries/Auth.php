<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth
{

    protected $CI;
    protected $batas;
    protected $sk;
    protected $mime;
    protected $maks_file;

    public function __construct()
    {
        $this->CI = &get_instance();

        $setting = $this->getSetting();
        $this->maks_file = $setting["maks_file"];
        $this->batas = $setting["batas_waktu"];
        $this->sk = $setting["key_node"];
        $this->mime = 'jpg|jpeg|pdf|gif|docx|xlsx|doc|xls|csv|ppt|zip|rar|tar|tgz';
    }

    public function AuthLog()
    {
        $modul  = $this->CI->config->item("modul_application");
        $path1  = $this->CI->uri->segment(1);
        $path2  = $this->CI->uri->segment(2);
        if ($this->CI->session->has_userdata($modul) == false) {
            if ($path1 != "login") {
                $param          = array(
                    "b.controller"      => $path1,
                    "b.need_auth" => 0
                );

                $query  = $this->CI->db->select("b.*")
                    ->from("m_menu as b")
                    ->where($param)
                    ->get();

                if ($query->num_rows() <= 0) {
                    redirect(base_url() . "login");
                }
            }

            // if ($path1 != "login") {
            //     redirect(base_url() . "login");
            // }
        } else if ($this->CI->session->has_userdata($modul) == true) {
            /*Cek Privelege*/
            $ses            = $this->CI->session->userdata($modul);
            $id_priv        = $ses["s_id_priv"];

            $param          = array(
                "a.id_privilege"    => $id_priv,
                "b.controller"     => $path1
            );

            $query  = $this->CI->db->select("a.*, b.controller,b.nama_menu ")
                ->from("privilege_menu as a")
                ->join("m_menu as b", "a.id_menu=b.id_menu", "left")
                ->where($param)
                ->get();

            $auth           = false;
            if ($query->num_rows() > 0) {
                $auth       = true;
            } else {
                $param2          = array(
                    "b.controller"      => $path1,
                    "b.need_auth"       => 0
                );

                $query2  = $this->CI->db->select("b.* ")
                    ->from("m_menu as b")
                    ->where($param2)
                    ->get();

                if ($query2->num_rows() > 0) {
                    $auth   = true;
                }
            }



            if ($auth == false && $path2 != "noauth") {
                if ($path1 != "") {
                    if ($path1 == "login") {
                        if ($path2 != "logout" && $path2 != "change_pass") {
                            redirect(base_url() . "dashboard");
                        }
                    } else {
                        redirect(base_url() . "" . $path1 . "/noauth");
                    }
                } else {
                    redirect(base_url() . "dashboard");
                }
            }

            if ($auth == true && $path2 == "noauth") {
                redirect(base_url() . "" . $path1);
            } else if ($auth == true && $path1 == "") {
                redirect(base_url() . "dashboard");
            }

            if ($path1 == "login") {
                if ($path2 != "logout" && $path2 != "change_pass") {
                    redirect(base_url() . "dashboard");
                }
            }
        }
    }

    public function cekAuth()
    {
        $modul  = $this->CI->config->item("modul_application");
        if ($this->CI->session->has_userdata($modul) == false) {
            return "1";
        } else {
            return "0";
        }
    }

    public function cek_auth_api($method)
    {
        $respon = [];
        $status = false;
        $code = $this->code_http("wrong_key")["code"];
        $desc = $this->code_http("wrong_key")["msg"];
        $id_user   = null;
        $sk = null;
        $sekarang = time();
        $method_user = $this->CI->input->method();
        $headers = $this->CI->input->request_headers();
        $batas = $this->batas;

        if (strtolower($method_user) == strtolower($method)) {
            $secret_key = isset($headers["X-Key"]) ? $headers["X-Key"] : "";
            $timestamp = isset($headers["X-Timestamp"]) ? $headers["X-Timestamp"] : ($sekarang + ($batas * 2));
            $signature = isset($headers["X-Signature"]) ? $headers["X-Signature"] : "";
            $auth = isset($headers["X-Authorization"]) ? $headers["X-Authorization"] : "";
            $host = isset($headers["Host"]) ? $headers["Host"] : "";
            if (($sekarang - $timestamp) < $batas) {
                $get_user = $this->CI->db->get_where("m_user", ["key" => $secret_key]);
                if ($get_user->num_rows() > 0) {
                    $data_user = $get_user->row();
                    $key = $data_user->key;
                    if ($data_user->host == "*" || strtolower($host) == strtolower($data_user->host)) {
                        if ($secret_key == $key) {
                            $pwd = $data_user->username;
                            $this_auth = $this->makeSignature($pwd, $secret_key, $timestamp);
                            if ($signature == $this_auth["signature"] && $auth == $this_auth["auth"]) {
                                $status = true;
                                $code = $this->code_http("success")["code"];
                                $desc = $this->code_http("success")["msg"];
                                $id_user = $data_user->id_user;
                                $sk = $secret_key;
                            }
                        }
                    } else {
                        $code = $this->code_http("wrong_client")["code"];
                        $desc = $this->code_http("wrong_client")["msg"];
                    }
                }
            } else {
                $code = $this->code_http("time_out")["code"];
                $desc = $this->code_http("time_out")["msg"];
            }
        } else {
            $code = $this->code_http("wrong_method")["code"];
            $desc = $this->code_http("wrong_method")["msg"];
        }

        $respon = [
            "status" => $status,
            "code" => $code,
            "description" => $desc,
            "id_user" => $id_user,
            "key" => $sk
        ];

        return $respon;
    }

    public function cek_auth_api_nodejs($method)
    {
        $respon = [];
        $status = false;
        $code = $this->code_http("wrong_key")["code"];
        $desc = $this->code_http("wrong_key")["msg"];
        $id = "";
        $parameter = "";
        $nomor = "";

        // $batas = 116107 - 15;
        $batas = 15000000;
        // $batas = $this->batas;
        $sekarang = time();
        $method_user = $this->CI->input->method();
        $headers = $this->CI->input->request_headers();
        $sk = $this->sk;

        if (strtolower($method_user) == strtolower($method)) {
            $signature = isset($headers["X-Signature-Key"]) ? $headers["X-Signature-Key"] : "";
            $timestamp = isset($headers["X-Timestamp"]) ? $headers["X-Timestamp"] : ($sekarang + ($batas * 2));
            $host = isset($headers["Host"]) ? $headers["Host"] : "";
            if (($sekarang - $timestamp) < $batas) {
                // if (strtolower($host) == strtolower(server_io_socket_key())) {
                if (true) {
                    $this_auth = $this->makeSignatureNode($sk, $timestamp);
                    if ($signature == $this_auth) {
                        $status = true;
                        $code = $this->code_http("success")["code"];
                        $desc = $this->code_http("success")["msg"];
                        $id = isset($headers["id_client"]) ?  $headers["id_client"] : "";
                        $parameter = isset($headers["parameter"]) ? $headers["parameter"] : "";
                        $nomor = isset($headers["number"]) ? $headers["number"] : "";
                    }
                } else {
                    $code = $this->code_http("wrong_client")["code"];
                    $desc = $this->code_http("wrong_client")["msg"];
                }
            } else {
                $code = $this->code_http("time_out")["code"];
                $desc = $this->code_http("time_out")["msg"];
                // $desc = $sekarang." - ".$headers["X-Timestamps"];
            }
        } else {
            $code = $this->code_http("wrong_method")["code"];
            $desc = $this->code_http("wrong_method")["msg"];
        }

        $respon = [
            "status" => $status,
            "code" => $code,
            "description" => $desc,
            "id" => $id,
            "parameter" => $parameter,
            "nomor" => $nomor,
        ];

        return $respon;
    }

    public function cek_auth_api_nodejs_cron($method)
    {
        $respon = [];
        $status = false;
        $code = $this->code_http("wrong_key")["code"];
        $desc = $this->code_http("wrong_key")["msg"];
        $id = "";
        $parameter = "";
        $nomor = "";

        $batas = $this->batas;
        $sekarang = time();
        $method_user = $this->CI->input->method();
        $headers = $this->CI->input->request_headers();
        // $sk = 182129202122;
        $sk = $this->sk;

        if (strtolower($method_user) == strtolower($method)) {
            $signature = isset($headers["X-Signature-Key"]) ? $headers["X-Signature-Key"] : "";
            $timestamp = isset($headers["X-Timestamp"]) ? $headers["X-Timestamp"] : ($sekarang + ($batas * 2));
            $host = isset($headers["Host"]) ? $headers["Host"] : "";
            if (($sekarang - $timestamp) < $batas) {
                if (true) {
                    $this_auth = $this->makeSignatureNode($sk, $timestamp);
                    if ($signature == $this_auth) {
                        $status = true;
                        $code = $this->code_http("success")["code"];
                        $desc = $this->code_http("success")["msg"];
                        $id = $headers["id_client"];
                        $parameter = isset($headers["parameter"]) ? $headers["parameter"] : "";
                        $nomor = isset($headers["number"]) ? $headers["number"] : "";
                    }
                } else {
                    $code = $this->code_http("wrong_client")["code"];
                    $desc = $this->code_http("wrong_client")["msg"];
                }
            } else {
                $code = $this->code_http("time_out")["code"];
                // $desc = $this->code_http("time_out")["msg"];
                $desc = $sekarang . " - " . $headers["X-Timestamps"];
            }
        } else {
            $code = $this->code_http("wrong_method")["code"];
            $desc = $this->code_http("wrong_method")["msg"];
        }

        $respon = [
            "status" => $status,
            "code" => $code,
            "description" => $desc,
            "id" => $id,
            "parameter" => $parameter,
            "nomor" => $nomor,
        ];

        return $respon;
    }

    public function get_setting_pesan($id_user)
    {
        return $this->CI->db->get_where("m_setting_pesan", ["id_user" => $id_user]);
    }

    public function code_http($parameter)
    {
        $obj = [];
        $code = [
            [
                "parameter" => "success",
                "code" => 200,
                "msg" => "OK"
            ],
            [
                "parameter" => "wrong_key",
                "code" => 401,
                "msg" => "Unauthorized"
            ],
            [
                "parameter" => "not_found",
                "code" => 404,
                "msg" => "Data Not Found"
            ],
            [
                "parameter" => "wrong_method",
                "code" => 405,
                "msg" => "Method Not Allow"
            ],
            [
                "parameter" => "wrong_client",
                "code" => 406,
                "msg" => "Client Not Acceptable"
            ],
            [
                "parameter" => "time_out",
                "code" => 408,
                "msg" => "Request Expired"
            ],
            [
                "parameter" => "upload_failed",
                "code" => 412,
                "msg" => "Failed Upload File"
            ],
            [
                "parameter" => "update_failed",
                "code" => 413,
                "msg" => "Failed Update"
            ],
            [
                "parameter" => "wrong_parameter",
                "code" => 422,
                "msg" => "Wrong Parameter"
            ],

        ];

        foreach ($code as $c) {
            if ($c["parameter"] == $parameter) {
                $obj = $c;
            }
        }
        return $obj;
    }

    public function mime_allow()
    {
        // $mime = 'jpg|jpeg|pdf|gif|docx|xlsx|doc|xls|csv|ppt|zip|rar|tar|tgz|mp3';
        return $this->mime;
    }

    public function maksimum_file()
    {
        // $size = 1000000;
        return $this->maks_file;
    }

    public function path_file()
    {
        return "assets/img/upload_file/";
    }

    public function makeSignature($username, $secret_key, $timestamp)
    {
        $signature =  hash_hmac('sha256', $secret_key . "-" . $timestamp . "-" . $username, $secret_key);
        $auth = base64_encode($signature);

        return [
            "signature" => $signature,
            "auth" => $auth
        ];
    }

    public function makeSignatureNode($secret_key, $timestamp)
    {
        $signature =  base64_encode($secret_key . ($timestamp * 2) . ($secret_key * 4));

        return $signature;
    }

    public function getUri()
    {
        $path   = $this->CI->uri->segment(1);
        return ucfirst(strtoupper($path));
    }

    public function getMenu()
    {
        $modul      = $this->CI->config->item("modul_application");
        $ses        = $this->CI->session->userdata($modul);
        $id_priv    = $ses["s_id_priv"];

        $param1      = array(
            "a.id_privilege"    => $id_priv,
            "b.is_child != "    => 1,
            "b.is_menu"         => 1
        );
        $parentMenu = $this->CI->db->select("b.*")
            ->from("privilege_menu as a")
            ->join("m_menu as b", "a.id_menu=b.id_menu", "left")
            ->where($param1)
            ->order_by("b.urutan ASC")
            ->get();

        $divMenu    = "";
        $menu_number = 0;
        if ($parentMenu->num_rows() > 0) {
            foreach ($parentMenu->result() as $pm) {
                $menu_number++;
                if ($pm->has_child == 0) {
                    $divMenu .= "<li class='menu-item " . $pm->breadcumb_menu . "'>"
                        . "<a class='menu-link ' href='" . base_url() . $pm->controller . "'>"
                        . "<i class='menu-icon " . $pm->icon_menu . "'></i>"
                        . "<div data-i18n='" . $pm->nama_menu . "'>" . $pm->nama_menu . "</div>"
                        . "</a>"
                        . "</li>";
                } else if ($pm->has_child == 1) {
                    $bm_menu = str_replace(" ", ".", $pm->breadcumb_menu);
                    $divMenu .= "<li class='menu-item " . $pm->breadcumb_menu . "'>"
                        . "<a class='menu-link menu-toggle  " . $pm->breadcumb_menu . "' href='#'>"
                        . "<i class='menu-icon " . $pm->icon_menu . "'></i>"
                        . "<div data-i18n='" . $pm->nama_menu . "'>" . $pm->nama_menu . "</div>"
                        . "</a>"
                        . "<ul id='" . $bm_menu . "' class='menu-sub " . $pm->breadcumb_menu . "'>";

                    $param2     = array(
                        "a.id_privilege"    => $id_priv,
                        "b.is_child"        => 1,
                        "b.parent_id"       => $pm->id_menu
                    );

                    $childMenu = $this->CI->db->select("b.*")
                        ->from("privilege_menu as a")
                        ->join("m_menu as b", "a.id_menu=b.id_menu")
                        ->where($param2)
                        ->order_by("b.urutan ASC")
                        ->get();

                    foreach ($childMenu->result() as $cm) {
                        // $cm->breadcumb_menu
                        $divMenu .= "<li class='menu-item " . $cm->breadcumb_menu . "'>
                        <a class='menu-link ' href='" . base_url() . $cm->controller . "'>
                        <div data-i18n='" . $cm->nama_menu . "'>" . $cm->nama_menu . "</div>
                        </a>
                        
                        </li>";
                    }

                    $divMenu .= "</ul>"
                        . "</li>";
                }
            }
        }

        return $divMenu;
    }

    public function getIcon()
    {
        $path       = $this->CI->uri->segment(1);
        $param      = array(
            "a.controller"  => $path,
        );

        $icon   =  $this->CI->db->select("a.*, b.breadcumb_menu as breadcumb_parent")
            ->from("m_menu as a")
            ->join("m_menu as b", "b.id_menu=a.parent_id", "left")
            ->where($param)
            ->get()
            ->row();


        $parent_menu  = $icon->breadcumb_parent != "" ? str_replace(" ", ".", $icon->breadcumb_parent) : "parent";

        $data   = array(
            "icon"              => $icon->icon_menu,
            "breadcumb_menu"    => str_replace(" ", ".", $icon->breadcumb_menu),
            "breadcumb_parent"  => $parent_menu,
            "nama_menu"         => $icon->nama_menu
        );

        return $data;
    }

    public function getSetting()
    {
        $param      = array(
            "a.id_setting"  => 1
        );

        $_setting = $this->CI->db->select("a.*")
            ->from("m_setting as a")
            ->where($param)
            ->get()
            ->row();

        $data   = array(
            "title"     => $_setting->title_url,
            "image"     => $_setting->image_aplikasi,
            "aplikasi"  => $_setting->aplikasi,
            "gambar"    => base_url() . "" . $_setting->image_aplikasi,
            "gambar_login"    => base_url() . "" . $_setting->image_login,
            "instansi"  => $_setting->nama_instansi,
            "batas_waktu" => $_setting->batas_waktu,
            "maks_file" => $_setting->maks_file,
            "key_node" => $_setting->sk_node,
            "mime" => $_setting->allow_mime,

        );

        return $data;
    }

    public function getTitle()
    {
        $param      = array(
            "a.id_setting"  => 1
        );

        $_setting = $this->CI->db->select("a.*")
            ->from("m_setting as a")
            ->where($param)
            ->get()
            ->row();

        $data   = array(
            "title"     => $_setting->title_url,
            "image"     => $_setting->image_aplikasi,
            "aplikasi"  => $_setting->aplikasi,
            "gambar"    => base_url() . "" . $_setting->image_aplikasi,
            "gambar_login"    => base_url() . "" . $_setting->image_login,
            "instansi"  => $_setting->nama_instansi,
        );

        return $data;
    }

    public function getGrant()
    {
        $path       = $this->CI->uri->segment(1);
        $modul      = $this->CI->config->item("modul_application");

        $ses        = $this->CI->session->userdata($modul);
        $id_priv    = $ses["s_id_priv"];

        $params     = array(
            "b.controller"      => $path,
            "a.id_privilege"    => $id_priv

        );

        $getData = $this->CI->db->select("a.akses_delete, a.akses_edit, a.akses_create")
            ->from("privilege_menu as a")
            ->join("m_menu as b", "a.id_menu=b.id_menu", "left")
            ->where($params)
            ->get();

        if ($getData->num_rows() > 0) {
            $akses      = $getData->row();
            $data       = array(
                "create"  => $akses->akses_create,
                "edit"    => $akses->akses_edit,
                "delete"  => $akses->akses_delete,
            );
        } else {
            $data       = array(
                "create"    => 0,
                "edit"    => 0,
                "delete"  => 0,
            );
        }


        return $data;
    }

    public function modul()
    {
        return $this->CI->config->item("modul_application");
    }

    public function tanggalIndonesia()
    {
        $day    = date("d");
        $month  = date("m");
        $year   = date("Y");

        $bulan  = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");

        return $day . " " . $bulan[(intval($month) - 1)] . " " . $year;
    }

    public function converttanggalIndonesia($date)
    {
        if (!$this->validateDate($date)) {
            $date   = date("Y-m-d");
        }

        $exp    = explode("-", $date);
        $day    = $exp[2];
        $month  = $exp[1];
        $year   = $exp[0];

        $bulan  = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");

        return $day . " " . $bulan[(intval($month) - 1)] . " " . $year;
    }

    public function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    public function getID()
    {
        $id     = getmypid();
        $text   = file_get_contents("assets/plugins/key/key.txt");
        $obj    = array();


        if (TRIM($text) == "") {
            $file   = fopen("assets/plugins/key/key.txt", "w+");
            $obj    = array(
                "id"    => $id,
                "otp"   => ""
            );

            fwrite($file, $id);
            fclose($file);
        } else {
            $exp    = explode(" - ", $text);
            if ($id == $exp[0]) {
                $otp    = "";
                if (count($exp) > 1) {
                    $otp    = $exp[1];
                }
                $obj    = array(
                    "id"    => $exp[0],
                    "otp"   => $otp
                );
            } else {
                $file   = fopen("assets/plugins/key/key.txt", "w+");
                $obj    = array(
                    "id"    => $id,
                    "otp"   => ""
                );

                fwrite($file, $id);
                fclose($file);
            }
        }

        return json_encode($obj);
    }

    public function getAPIServer()
    {
        $api        = "AIzaSyBtWwunOOPDtBnd5hye35-oqA51XBWvNOY";

        return $api;
    }

    public function getMonth()
    {
        $bulan  = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
        return $bulan;
    }

    public function simpan_log($table, $action, $user, $log)
    {

        $country    = "";
        $city       = "";
        $region     = "";

        // GET IP LOCATION
        $getloc = @file_get_contents("http://ipinfo.io/" . $this->CI->input->ip_address() . "/json");
        // $getloc = @file_get_contents("http://ipinfo.io/103.170.105.144/json");
        if ($getloc !== FALSE) {
            $getloc = json_decode($getloc);
            $country    = isset($getloc->country) ? $getloc->country : "";
            $city       = isset($getloc->city) ? $getloc->city : "";
            $region       = isset($getloc->region) ? $getloc->region : "";
        }

        $data_log     = array(
            "tabel_log"       => $table,
            "jenis_log"       => $action,
            "user_log"        => $user,
            "date_log"        => date("Y-m-d H:i:s"),
            "data_log"        => $log,
            "ip"              => $this->CI->input->ip_address(),
            "browser"         => $this->CI->agent->browser(),
            "platform"        => $this->CI->agent->platform(),
            "os"              => $this->CI->agent->agent_string(),
            "country"         => $country,
            "city"            => $city,
            "region"          => $region
        );

        return ($this->CI->db->insert("m_log", $data_log)) ? true : false;
    }


    public function getDefaultPassword()
    {
        $data = $this->CI->db->select("*")
            ->get_where("m_setting", ["id_setting" => 1])
            ->row();

        return $data->default_password;
    }
}
