<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reportbulanan extends CI_Controller
{
    private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("reportbulanan_m", "dbmodels");
		$this->auth->authlog();
		$this->grant 	= $this->auth->getGrant();

		$modul  		= $this->auth->modul();
		$this->ses 		= $this->session->userdata($modul);
	}

	public function index()
	{
		$data["menuSideBar"]   	= $this->auth->getMenu();
		$data["create_akses"]	= $this->grant["create"];
		$data['idUser'] 		= $this->ses["s_id_user"];
		$data["monthList"] = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September","Oktober","November","Desember"];
		$data["yearList"] = [];
		for ($i=2022; $i <= date("Y"); $i++) { 
			$data["yearList"][] = $i;
		}
		$dataUser = $this->dbmodels->getUser($data['idUser']);
		$data['countEmployee'] = $this->dbmodels->get_count_employee($dataUser->id_departemen, $dataUser->id_departemen == 0);
		$setting 				= $this->auth->getSetting();
		$icon 					= $this->auth->getIcon();
		$data 					= array_merge($data, $setting, $icon);

		$this->load->view('report_bulanan_ui_v', $data);
	}

	public function get_kehadiran_bulanan($startDate, $endDate, $idDepartemen, $isAdmin)
	{
		$result = [];
		$dataKehadiranBulanan = $this->dbmodels->get_kehadiran_bulanan($startDate, $endDate, $idDepartemen, $isAdmin);
		foreach ($dataKehadiranBulanan as $key => $value) {
			$result[$value->tgl][] = $value;
		}
		return $result;
	}

	public function create_grafik_kehadiran_bulanan($startDate, $endDate, $dataUser)
	{
		$dataStatusKerja = $this->dbmodels->get_status_kerja();
		$data = $this->get_kehadiran_bulanan($startDate, $endDate, $dataUser->id_departemen, $dataUser->id_departemen == 0);
		$categories = "[";
		$series = "[";
		foreach ($dataStatusKerja as $keyStatusKerja => $statusKerja) {
			$series .= "{";
			$series .= "name:'$statusKerja->ket',";
			$series .= "data:[";
			$i = 0;
			foreach ($data as $keyKehadiran => $kehadiran) {
				$i++;
				if ($keyStatusKerja == 0) {
					// $categories .= "'$keyKehadiran',";
					$categories .= "'$i',";
				}
				$jumlah = 0;
				$dataJumlah = array_search($statusKerja->ket, array_column($kehadiran, "ket"));
				if ($dataJumlah) {
					$jumlah = $kehadiran[$dataJumlah]->jumlah;
				}
				$series .= "$jumlah,";
			}
			$series .= "],";
			$series .= "},";
		}
		$series .= "]";
		$categories .= "]";
		return [
			"data" => $data,
			"series" => $series,
			"categories" => $categories,
		];
	}

	public function create_grafik_kesehatan_bulanan($startDate, $endDate, $dataUser)
	{
		$data = $this->dbmodels->get_kesehatan_bulanan($startDate, $endDate, $dataUser->id_departemen, $dataUser->id_departemen == 0);
		$categories = "[";
		$series = "[";
		foreach (["Sehat", "Sakit"] as $key => $value) {
			$series .= "{";
			$series .= "name:'$value',";
			$series .= "data:[";
			foreach ($data as $keyData => $item) {
				if ($key == 0) {
					$tgl = $keyData+1;
					$categories .= "'$tgl',";
				}
				$jumlah = 0;
				switch ($value) {
					case 'Sakit':
						$jumlah = $item->sakit != "" ? $item->sakit : 0;
						break;
					case 'Sehat':
						$jumlah = $item->sehat != "" ? $item->sehat : 0;
						break;
					default:
						# code...
						break;
				}
				$series .= "$jumlah,";
			}
			$series .= "],";
			$series .= "},";
		}
		$series .= "]";
		$categories .= "]";
		return [
			"data" => $data,
			"series" => $series,
			"categories" => $categories,
		];
	}

	public function create_grafik_absen_bulanan($startDate, $endDate, $dataUser, $countEmployee)
	{
		$data = $this->dbmodels->get_absen_bulanan($startDate, $endDate, $dataUser->id_departemen, $dataUser->id_departemen == 0);
		$categories = "[";
		$series = "[";
		foreach (["Hadir", "Tidak Hadir"] as $key => $value) {
			$series .= "{";
			$series .= "name:'$value',";
			$series .= "data:[";
			foreach ($data as $keyData => $item) {
				if ($key == 0) {
					$tgl = $keyData+1;
					$categories .= "'$tgl',";
				}
				$jumlah = 0;
				switch ($value) {
					case 'Hadir':
						$jumlah = $item->hadir != "" ? $item->hadir : 0;
						break;
					case 'Tidak Hadir':
					    $jumlah = $item->hadir != "" ? $item->hadir : 0;
					    $jumlah = $countEmployee - $jumlah;
						break;
					default:
						# code...
						break;
				}
				$absouluteJumlah = abs($jumlah);
				$series .= "$absouluteJumlah,";
			}
			$series .= "],";
			$series .= "},";
		}
		$series .= "]";
		$categories .= "]";
		return [
			"data" => $data,
			"series" => $series,
			"categories" => $categories,
		];
	}

	public function download_report_bulanan()
	{
		$month = $_GET["month"];
		$year = $_GET["year"];
		$dt = "$year-$month-01";
		$startDate = date("Y-m-01", strtotime($dt));
		$endDate = date("Y-m-t", strtotime($dt));
		$idUser = $_GET['idUser'];
		$dataUser = $this->dbmodels->getUser($idUser);
		$countEmployee = $this->dbmodels->get_count_employee($dataUser->id_departemen, $dataUser->id_departemen == 0);

		$grafikKehadiran = $this->create_grafik_kehadiran_bulanan($startDate, $endDate, $dataUser);
		$grafikKesehatan = $this->create_grafik_kesehatan_bulanan($startDate, $endDate, $dataUser);
		$grafikAbsen = $this->create_grafik_absen_bulanan($startDate, $endDate, $dataUser, $countEmployee);

		$monthList =["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September","Oktober","November","Desember"];

		$this->load->view('report_bulanan_v', [
			"startDate" => $startDate,
			"endDate" => $endDate,
			"month"=>$monthList[$month-1],
			"year"=>$year,
			"dataKehadiranBulanan" => $grafikKehadiran["data"],
			"seriesKehadiran" => $grafikKehadiran["series"],
			"categoriesKehadiran" => $grafikKehadiran["categories"],
			"dataKesehatanBulanan" => $grafikKesehatan["data"],
			"seriesKesehatan" => $grafikKesehatan["series"],
			"categoriesKesehatan" => $grafikKesehatan["categories"],
			"dataAbsenBulanan" => $grafikAbsen["data"],
			"seriesAbsen" => $grafikAbsen["series"],
			"categoriesAbsen" => $grafikKesehatan["categories"],
			"countEmployee"=>$countEmployee,
		]);
		// return redirect($_SERVER['HTTP_REFERER']);
	}

	public function get_report_bulanan()
	{
		$month = $_GET["month"];
		$year = $_GET["year"];
		$dt = "$year-$month-01";
		$startDate = date("Y-m-01", strtotime($dt));
		$endDate = date("Y-m-t", strtotime($dt));
		$idUser = $_GET['idUser'];
		$dataUser = $this->dbmodels->getUser($idUser);
		$countEmployee = $this->dbmodels->get_count_employee($dataUser->id_departemen, $dataUser->id_departemen == 0);

		$grafikKehadiran = $this->create_grafik_kehadiran_bulanan($startDate, $endDate, $dataUser);
		$grafikKesehatan = $this->create_grafik_kesehatan_bulanan($startDate, $endDate, $dataUser);
		$grafikAbsen = $this->create_grafik_absen_bulanan($startDate, $endDate, $dataUser, $countEmployee);

		$monthList =["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September","Oktober","November","Desember"];

		echo json_encode([
			"startDate" => $startDate,
			"endDate" => $endDate,
			"month"=>$monthList[$month-1],
			"year"=>$year,
			"dataKehadiranBulanan" => $grafikKehadiran["data"],
			"seriesKehadiran" => $grafikKehadiran["series"],
			"categoriesKehadiran" => $grafikKehadiran["categories"],
			"dataKesehatanBulanan" => $grafikKesehatan["data"],
			"seriesKesehatan" => $grafikKesehatan["series"],
			"categoriesKesehatan" => $grafikKesehatan["categories"],
			"dataAbsenBulanan" => $grafikAbsen["data"],
			"seriesAbsen" => $grafikAbsen["series"],
			"categoriesAbsen" => $grafikKesehatan["categories"],
			"countEmployee"=>$countEmployee,
		]);
		// return redirect($_SERVER['HTTP_REFERER']);
	}
}