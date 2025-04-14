<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Absensilainnya extends CI_Controller
{
	private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("absensilainnya_m", "dbmodels");
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
		$setting 				= $this->auth->getSetting();
		$icon 					= $this->auth->getIcon();
		$data 					= array_merge($data, $setting, $icon);

		$this->load->view('absensilainnya_v', $data);
	}

	public function noauth()
	{
		$data["menuSideBar"]	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$data 					= array_merge($data, $setting);
		$data["nama_menu"]		= "Access Denied";

		$this->load->view("partials/noauth", $data);
	}

	public function tabel_detail_absensi_pegawai_lainnya()
	{
		$table 		= 'detail_absensi_pegawai_lainnya';

		// Table's primary key
		$primaryKey = 'id_detail_absensi_pegawai_lainnya';

		$columns = array(
			array(
				'db' 		=> 'a.id_pegawai_lainnya',
				'dt'  		=> 0,
				'field' 	=> 'id_pegawai_lainnya',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'b.nama',
				'dt' 		=> 2,
				'field' 	=> 'nama',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'c.nama',
				'dt' 		=> 3,
				'as' 	=> 'namalainnya',
				'field' 	=> 'namalainnya',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.aktif',
				'dt' 		=> 4,
				'field' 	=> 'aktif',
				'formatter' => function ($d, $row) {
					return $d == 1 ? "<span class='badge bg-label-primary'>Aktif</span>" : "<span class='badge bg-label-secondary'>Tidak Aktif</span>";
				}
			),
			array(
				'db'        => 'a.id_detail_absensi_pegawai_lainnya',
				'dt'        => 1,
				'field'		=> 'id_detail_absensi_pegawai_lainnya',
				'formatter' => function ($d, $row) {
					$id = $this->encryption->encrypt($d);
					$button 	= "";

					$button .= "<div class='btn-group'>
                                    <button type='button' class='btn btn-sm btn-primary'>Aksi</button>
                                    <button type='button' class='btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split' data-bs-toggle='dropdown' aria-expanded='false'>
                                        <span class='visually-hidden'>Toggle Dropdown</span>
                                    </button>
                                    <ul class='dropdown-menu'>";
					if ($this->grant["edit"]) {
						//$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_detail_absensi_pegawai_lainnya(\"" . $id . "\")'><i class='ti ti-pencil'></i> Edit Lokasi Kerja</a></li>";
					}

					if ($this->grant["delete"]) {
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Hapus Absensi Pegawai</a></li>";
					}
					$button .= "
                                    </ul>
                                </div>";
					return $button;
				}
			),
		);


		$joinQuery 	= "FROM " . $table . " as a  " .
			" LEFT JOIN m_employee as b ON b.id_employee=a.id_pegawai" .
			" LEFT JOIN m_employee as c ON c.id_employee=a.id_pegawai_lainnya";
		$extraWhere = NULL;
		$groupBy 	= NULL;


		$conn_db = db_ssp();

		echo json_encode(ssp::complex($_REQUEST, $conn_db, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy));
	}

	public function hapus_detail_absensi_pegawai_lainnya()
	{
		$success 	= 0;
		$message	= "";
		$header 	= "Gagal";
		$tipenotif 	= "error";
		if ($this->grant["delete"] == false) {
			$message	= "Anda tidak mempunyai otoritas menghapus data";
			goto out;
		}

		$id 		=  $this->encryption->decrypt($this->input->post("id"));
		$params_where 	= array(
			"id_detail_absensi_pegawai_lainnya" 	=> $id
		);

		$log = $this->dbmodels->detail_detail_absensi_pegawai_lainnya($params_where)->row();
		$db 		= $this->dbmodels->hapus_detail_absensi_pegawai_lainnya($params_where);

		if ($db == true) {
			$this->auth->simpan_log("detail_absensi_pegawai_lainnya", "delete", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "Absensi Pegawai berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "Absensi Pegawai gagal dihapus";
		}

		out:
		$output 	= array(
			"kode"		=> $success,
			"response"	=> $message,
			"header"	=> $header,
			"tipenotif"	=> $tipenotif,
		);

		echo json_encode($output);
	}


	public function simpan_detail_absensi_pegawai_lainnya()
	{
		$id 		= $this->encryption->decrypt($this->input->post("id"));
		$tipe 		= xssInput($this->input->post("tipe"));
		$aktif 		= xssInput($this->input->post("aktif"));
		$id_employee		= xssInput($this->input->post("id_employee"));
		$id_employee_lainnya 		= xssInput($this->input->post("id_employee_lainnya"));

		$success 	= 0;
		$message	= "";
		$header 	= "Peringatan";
		$tipenotif 	= "error";

		if ($tipe == 1) {
			if ($this->grant["create"] == false) {
				$message	= "Anda tidak mempunyai otoritas menambah data";
				goto out;
			}
		} else if ($tipe == 2) {
			if ($this->grant["edit"] == false) {
				$message	= "Anda tidak mempunyai otoritas mengubah data";
				goto out;
			}
		}

		$rules  = $this->rules_detail_absensi_pegawai_lainnya($tipe);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() != false) {
			$aktif = $aktif !== "" ? 1 : 0;

			$params 	= array(
				"id_pegawai"	    => $id_employee,
				"id_pegawai_lainnya"		=> $id_employee_lainnya,
				"aktif"		=> $aktif
			);

			if ($tipe == 1) {
				$simpan_db 	= $this->dbmodels->simpan_detail_absensi_pegawai_lainnya($params);
				$proses_msg 	= "ditambahkan";
				$log = $params;
				$tipe_log = "insert";
			} else if ($tipe == 2) {
				$params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
				$params_where = array(
					"id_detail_absensi_pegawai_lainnya" 	=> $id
				);
				$log = $this->dbmodels->detail_detail_absensi_pegawai_lainnya($params_where)->row();
				$simpan_db 	= $this->dbmodels->update_detail_absensi_pegawai_lainnya($params, $params_where);
				$proses_msg 	= "diubah";
				$tipe_log = "update";
			}

			if ($simpan_db == true) {
				$this->auth->simpan_log("detail_absensi_pegawai_lainnya", $tipe_log, $this->ses["s_id_user"], json_encode($log));

				$success 	= 1;
				$message	= "Lokasi Kerja berhasil $proses_msg";
				$header 	= "Berhasil";
				$tipenotif 	= "success";
			} else {
				$message	= "Absensi Pegawai gagal $proses_msg";
			}
		} else {
			$message	= strip_tags(validation_errors());
		}

		out:
		$output 	= array(
			"kode"		=> $success,
			"response"	=> $message,
			"header"	=> $header,
			"tipenotif"	=> $tipenotif,
		);

		echo json_encode($output);
	}

	private function rules_detail_absensi_pegawai_lainnya($tipe)
	{
		$rules =  [
			[
				"field"     => "id_employee",
				"label"     => "id_employee",
				"rules"     => "trim|required",
				"errors"    => [
					"required"  => "Pegawai harus diisi"
				]
			],
			[
				"field"     => "id_employee_lainnya",
				"label"     => "id_employee_lainnya",
				"rules"     => "trim|required",
				"errors"    => [
					"required"  => "Pegawai yang diabsenkan harus diisi"
				]
			],
		];

		if ($tipe == 2) {
			$rules = array_merge(
				$rules,
				[
					[
						"field"     => "id",
						"label"     => "Id",
						"rules"     => "trim|required|callback_check_id",
						"errors"    => [
							"required"  => "Data Lokasi Kerja tidak ditemukan",
						]
					],
				]
			);
		}

		return $rules;
	}

	public function check_id()
	{
		$id =  $this->encryption->decrypt($this->input->post("id"));

		$count = $this->dbmodels->detail_detail_absensi_pegawai_lainnya(["id_detail_absensi_pegawai_lainnya" => $id])->num_rows();
		if ($count > 0) {
			return true;
		} else {
			$this->form_validation->set_message("check_id", "Data detail_absensi_pegawai_lainnya invalid");
			return false;
		}
	}

	public function get_employee_modul()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->dbmodels->getemployee($searchTerm);
		echo json_encode($response);
	}


	public function list_employee_modul($id)
	{
		$option 	= "<option value=''>Pilih Pegawai</option>";


		$getStatus 	= $this->dbmodels->get_employee();

		foreach ($getStatus->result() as $result) {
			$cek 	= "";
			if ($id == $result->id_employee) {
				$cek 	= "checked";
			}
			$option 	.= "<option value='" . $result->id_employee . "' $cek>" . $result->nama . "</option>";
		}

		return $option;
	}

	protected $abjad = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

	public function createSheetTitle($spreadsheet, $title, $column)
	{
		$spreadsheet->setActiveSheetIndexByName($title);
		$sheet = $spreadsheet->getActiveSheet();
		foreach ($column as $key => $value) {
			$sheet->setCellValue($this->abjad[$key] . "1", $value);
		}

		return $sheet;
	}

	public function download_report_manhours()
	{
		$spreadsheet = new Spreadsheet();
		$spreadsheet->getActiveSheet()->setTitle("employee");
		$table_columns = array("CODE", "NAMA", "DEPARTMENT", "SECTION", "JABATAN", "MANHOURS");
		$sheet = $this->createSheetTitle($spreadsheet, "employee", $table_columns);
		$dataUser = $this->dbmodels->getUser($this->ses["s_id_user"]);
		$date = date("Y");
		$data = $this->dbmodels->get_manhours($dataUser->id_departemen, $date, $dataUser->id_departemen == 0);
		// dd($data);
		$baris = 2;
		foreach ($data as $key => $value) {
			$sheet->setCellValueByColumnAndRow(1, $baris, $value->code);
			$sheet->setCellValueByColumnAndRow(2, $baris, $value->nama);
			$sheet->setCellValueByColumnAndRow(3, $baris, $value->departemen);
			$sheet->setCellValueByColumnAndRow(4, $baris, $value->section);
			$sheet->setCellValueByColumnAndRow(5, $baris, $value->jabatan);
			$sheet->setCellValueByColumnAndRow(6, $baris, $value->manhours);
			$baris++;
		}
		foreach ($sheet->getColumnIterator() as $column) {
			$sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
		}
		$writer = new Xlsx($spreadsheet);
		$date = date("m_d_Y");
		$filename = "report_manhours_$date.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
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
			foreach ($data as $keyKehadiran => $kehadiran) {
				if ($keyStatusKerja == 0) {
					$categories .= "'$keyKehadiran',";
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
		foreach (["Sakit", "Sehat"] as $key => $value) {
			$series .= "{";
			$series .= "name:'$value',";
			$series .= "data:[";
			foreach ($data as $keyData => $item) {
				if ($key == 0) {
					$categories .= "'$item->tgl',";
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

	public function create_grafik_absen_bulanan($startDate, $endDate, $dataUser)
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
					$categories .= "'$item->tgl',";
				}
				$jumlah = 0;
				switch ($value) {
					case 'Hadir':
						$jumlah = $item->hadir != "" ? $item->hadir : 0;
						break;
					case 'Tidak Hadir':
						$jumlah = $item->tidak_hadir != "" ? $item->tidak_hadir : 0;
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

	public function download_report_bulanan()
	{
		$startDate = $_GET["startDate"];
		$endDate = $_GET["endDate"];
		// $startDate = "2023-10-01";
		// $endDate = "2023-10-31";
		$idUser = $_GET['idUser'];
		// $dataTanggal = $this->dbmodels->get_all_days($startDate, $endDate);
		// $dataUser = $this->dbmodels->getUser($this->ses["s_id_user"]);
		$dataUser = $this->dbmodels->getUser($idUser);

		// Create series kehadiran
		$grafikKehadiran = $this->create_grafik_kehadiran_bulanan($startDate, $endDate, $dataUser);
		$grafikKesehatan = $this->create_grafik_kesehatan_bulanan($startDate, $endDate, $dataUser);
		$grafikAbsen = $this->create_grafik_absen_bulanan($startDate, $endDate, $dataUser);

		return $this->load->view('report_bulanan_v', [
			"startDate" => $startDate,
			"endDate" => $endDate,
			"dataKehadiranBulanan" => $grafikKehadiran["data"],
			"seriesKehadiran" => $grafikKehadiran["series"],
			"categoriesKehadiran" => $grafikKehadiran["categories"],
			"dataKesehatanBulanan" => $grafikKesehatan["data"],
			"seriesKesehatan" => $grafikKesehatan["series"],
			"categoriesKesehatan" => $grafikKesehatan["categories"],
			"dataAbsenBulanan" => $grafikAbsen["data"],
			"seriesAbsen" => $grafikAbsen["series"],
			"categoriesAbsen" => $grafikKesehatan["categories"],
		]);
		// return redirect($_SERVER['HTTP_REFERER']);
	}
}
