<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    private $grant;
    private $ses;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("dashboard_m", "dbmodels");
        $this->auth->authlog();

        $this->grant    = $this->auth->getGrant();

        $modul          = $this->auth->modul();
        $this->ses      = $this->session->userdata($modul);
        // $this->load->library('pdf');
    }

    public function index()
    {
        $data["menuSideBar"]    = $this->auth->getMenu();
        $setting                = $this->auth->getSetting();
        $icon                   = $this->auth->getIcon();
        $data['ses']            = $this->ses;
        $data                   = array_merge($data, $setting, $icon);

        $this->load->view('v_dashboard', $data);
    }

    public function noauth()
    {
        $data["menuSideBar"]    = $this->auth->getMenu();
        $setting                 = $this->auth->getSetting();
        $data                     = array_merge($data, $setting);
        $data["nama_menu"]        = "Access Denied";

        $this->load->view("dist/noauth", $data);
    }

    public function getchart_absen()
    {
        header('Content-Type: application/json');
        $tanggal = $this->input->post("tanggal");
        $list = $this->dbmodels->getchart_absen($tanggal)->result();
        $departemen = array();
        $absen = array();
        $absentidak = array();
        $total = array();
        foreach ($list as $arr) {
            $total[] = (int)$arr->absen + (int)$arr->absentidak;
            $departemen[] = $arr->inisial;
            // $absen[] = round((int)$arr->absen / $total * 100);
            $absen[] = (int)$arr->absen;
            // $absenVal = round((int)$arr->absen / $total * 100);
            // $absen[] = "$arr->absen<br/>$absenVal%";
            $absentidak[] = (int)$arr->absentidak;
            // $absenTidakVal = round((int)$arr->absentidak / $total * 100);
            // $absentidak[] = "$arr->absentidak<br/>$absenTidakVal%";
        }
        $output = array("departemen" => $departemen, "absen" => $absen, "absentidak" => $absentidak, "total" => $total);
        echo json_encode($output);
    }
    public function getchart_sehat()
    {
        header('Content-Type: application/json');
        $tanggal = $this->input->post("tanggal");
        $list = $this->dbmodels->getchart_sehat($tanggal)->result();
        $departemen = array();
        $sehat = array();
        $sehattidak = array();
        $total = array();
        foreach ($list as $arr) {
            $total[] = (int)$arr->sehat + (int)$arr->sehattidak;
            $departemen[] = $arr->inisial;
            $sehat[] = (int)$arr->sehat;
            $sehattidak[] = (int)$arr->sehattidak;
            // $sehat[] = (int)$arr->sehat;
            // $sehattidak[] = (int)$arr->sehattidak;
        }
        $output = array("departemen" => $departemen, "sehat" => $sehat, "sehattidak" => $sehattidak, "total" => $total);
        echo json_encode($output);
    }

    public function getchart_lokasi()
    {
        header('Content-Type: application/json');
        $tanggal = $this->input->post("tanggal");
        $list = $this->dbmodels->getchart_lokasi()->result();
        $id_lokasi_kerja = array();
        $id_status_kerja = array();
        $status = array();
        $nume   = array();
        $jumlahData = 0;
        foreach ($list as $arr) {
            $id_status_kerja[] = $arr->id_status_kerja;
            $id_lokasi_kerja[] = $arr->id_lokasi_kerja;
            $status[] = $arr->status;
            $list2 = $this->dbmodels->getchart_lokasi2($arr->id_status_kerja, $arr->id_lokasi_kerja, $tanggal);
            if ($list2->num_rows() > 0) {
                $ngantuk = $list2->row();
                $nume[] = (int)$ngantuk->jumlah;
                $jumlahData += (int)$ngantuk->jumlah;
            } else {
                $nume[] = (int)0;
                $jumlahData += 0;
            }
        }
        $percentage = array();
        foreach ($nume as $key => $value) {
            $nume[$key] = (int)$value;
            $percentage[$key] = (int)$value == 0 ? 0 : round($value / $jumlahData * 100);
        }
        $output = array("status" => $status, "jumlah" => $nume, "percentage" => $percentage);
        echo json_encode($output);
    }




    public function upload()
    {
        $config['upload_path'] = "assets/grafik";
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("pdf")) {
            $data = array('upload_data' => $this->upload->data());
            $filenya = $data['upload_data']['file_name'];
            echo $filenya;
        } else {
            $this->upload->display_errors();
        }
        // move_uploaded_file(
        //     $_FILES['pdf']['tmp_name'], 
        //     base_url('assets/grafik/test.pdf')
        // );        
    }
}
