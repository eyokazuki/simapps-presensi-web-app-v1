<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detailabsen extends CI_Controller
{
    private $grant;
    private $ses;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("detailabsen_m", "dbmodels");
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
		$data['ses']			= $this->ses;
        $data                   = array_merge($data, $setting, $icon);
        
        $this->load->view('v_detailabsen', $data);
    }

    public function noauth()
    {
        $data["menuSideBar"]    = $this->auth->getMenu();
        $setting                 = $this->auth->getSetting();
        $data                     = array_merge($data, $setting);
        $data["nama_menu"]        = "Access Denied";

        $this->load->view("dist/noauth", $data);
    }

	public function tabel_absensi()
	{
		$table 		= 'm_employee';
        $tanggal    = $this->input->post("tanggal");
        //$tanggal    = '2023-07-11';
		// Table's primary key
		$primaryKey = 'id_employee';

		$columns = array(
			array(
				'db' 		=> 'a.id_employee',
				'dt'  		=> 0,
				'field' 	=> 'id_employee',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'b.inisial',
				'dt' 		=> 1,
				'field' 	=> 'inisial',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.code',
				'dt' 		=> 2,
				'field' 	=> 'code',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.nama',
				'dt' 		=> 3,
				'field' 	=> 'nama',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> "(SELECT IF(count(*)>0, 'Sudah Absen', 'Tidak Absen') from detail_absensi c where a.id_employee=c.id_employee and DATE(c.tanggal_absensi)='$tanggal')",
				'dt' 		=> 4,
                'as'        => 'absen',
				'field' 	=> 'absen',
				'formatter' => function ($d, $row) {
                    //($d==0) ? $absen = "Tidak Absen" : $absen = "Absen";
					return $d;
				}
			),
			array(
				'db' 		=> "(SELECT d.kondisi_kesehatan from detail_absensi c, m_kondisi_kesehatan d where a.id_employee=c.id_employee and DATE(c.tanggal_absensi)='$tanggal' and c.kondisi_kesehatan=d.id_kondisi_kesehatan)",
				'dt' 		=> 5,
				'as' 	    => 'kondisi',
				'field' 	=> 'kondisi',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> "(SELECT e.lokasi_kerja from detail_absensi c, m_lokasi_kerja e where a.id_employee=c.id_employee and DATE(c.tanggal_absensi)='$tanggal' and c.lokasi_kerja=e.id_lokasi_kerja)",
				'dt' 		=> 6,
				'as' 	    => 'lokasi',
				'field' 	=> 'lokasi',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
		);


        $joinQuery 	= "FROM ".$table." as a 
        JOIN m_departemen b ON a.id_departemen = b.id_departemen";
		$extraWhere = NULL;
		$groupBy 	= NULL;


		$conn_db = db_ssp();

		echo json_encode(ssp::complex($_REQUEST, $conn_db, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy));
	}
}
