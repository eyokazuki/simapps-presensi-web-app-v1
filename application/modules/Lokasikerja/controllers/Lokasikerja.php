<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasikerja extends CI_Controller
{
	private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("lokasikerja_m", "dbmodels");
		$this->auth->authlog();
		$this->grant 	= $this->auth->getGrant();

		$modul  		= $this->auth->modul();
		$this->ses 		= $this->session->userdata($modul);
	}

	public function index()
	{
		$data["menuSideBar"]   	= $this->auth->getMenu();
		$data["create_akses"]	= $this->grant["create"];
		$setting 				= $this->auth->getSetting();
		$icon 					= $this->auth->getIcon();
		$data 					= array_merge($data, $setting, $icon);

		$this->load->view('lokasikerja_v', $data);
	}

	public function noauth()
	{
		$data["menuSideBar"]	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$data 					= array_merge($data, $setting);
		$data["nama_menu"]		= "Access Denied";

		$this->load->view("partials/noauth", $data);
	}

	public function tabel_lokasi_kerja()
	{
		$table 		= 'm_lokasi_kerja';

		// Table's primary key
		$primaryKey = 'id_lokasi_kerja';

		$columns = array(
			array(
				'db' 		=> 'a.lokasi_kerja',
				'dt'  		=> 0,
				'field' 	=> 'lokasi_kerja',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'a.lokasi_kerja',
				'dt' 		=> 2,
				'field' 	=> 'lokasi_kerja',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'b.status_kerja',
				'dt' 		=> 3,
				'field' 	=> 'status_kerja',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.manhours',
				'dt' 		=> 4,
				'field' 	=> 'manhours',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.tipe',
				'dt' 		=> 5,
				'field' 	=> 'tipe',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.aktif',
				'dt' 		=> 6,
				'field' 	=> 'aktif',
				'formatter' => function ($d, $row) {
					return $d == 1 ? "<span class='badge bg-label-primary'>Aktif</span>" : "<span class='badge bg-label-secondary'>Tidak Aktif</span>";
				}
			),
			array(
				'db'        => 'a.id_lokasi_kerja',
				'dt'        => 1,
				'field'		=> 'id_lokasi_kerja',
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
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_lokasi_kerja(\"" . $id . "\")'><i class='ti ti-pencil'></i> Edit Lokasi Kerja</a></li>";
					}

					if ($this->grant["delete"]) {
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Hapus Lokasi Kerja</a></li>";
					}
					$button .= "
                                    </ul>
                                </div>";
					return $button;
				}
			),
		);


		$joinQuery 	= "FROM " . $table . " as a  " .
			" LEFT JOIN m_status_kerja as b ON a.id_status_kerja=b.id_status_kerja";
		$extraWhere = NULL;
		$groupBy 	= NULL;


		$conn_db = db_ssp();

		echo json_encode(ssp::complex($_REQUEST, $conn_db, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy));
	}

	public function hapus_lokasi_kerja()
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
			"id_lokasi_kerja" 	=> $id
		);

		$log = $this->dbmodels->detail_lokasi_kerja($params_where)->row();
		$db 		= $this->dbmodels->hapus_lokasi_kerja($params_where);

		if ($db == true) {
			$this->auth->simpan_log("m_lokasi_kerja", "delete", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "Lokasi Kerja berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "Lokasi Kerja gagal dihapus";
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

	public function detail_lokasi_kerja()
	{
		$id 		=  $this->encryption->decrypt($this->input->post("id"));
		$params 	= array(
			"id_lokasi_kerja" 	=> $id
		);
		$detail = $this->dbmodels->detail_lokasi_kerja($params);
		$obj 		= array();



		if ($detail->num_rows() > 0) {
			$detail 	= $detail->row();

			$obj 			= array(
				"lokasi_kerja"	=> xssOutput($detail->lokasi_kerja),
				"type" 		=> $detail->tipe,
				"id_status_kerja" 		=> $detail->id_status_kerja,
				"manhours" 		=> $detail->manhours,
				"aktif" 		=> $detail->aktif
			);
		}


		echo json_encode($obj);
	}

	public function simpan_lokasi_kerja()
	{
		$lokasi_kerja 	= xssInput($this->input->post("lokasi_kerja"));
		$id 		= $this->encryption->decrypt($this->input->post("id"));
		$tipe 		= xssInput($this->input->post("tipe"));
		$type 		= xssInput($this->input->post("type"));
		$aktif 		= xssInput($this->input->post("aktif"));
		$id_status_kerja 		= xssInput($this->input->post("id_status_kerja"));
		$manhours 		= xssInput($this->input->post("manhours"));

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

		$rules  = $this->rules_lokasi_kerja($tipe);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() != false) {
			$aktif = $aktif !== "" ? 1 : 0;

			$params 	= array(
				"lokasi_kerja"	=> $lokasi_kerja,
				"id_status_kerja"		=> $id_status_kerja,
				"manhours"		=> $manhours,
				"tipe"		=> $type,
				"aktif"		=> $aktif
			);

			if ($tipe == 1) {
				$simpan_db 	= $this->dbmodels->simpan_lokasi_kerja($params);
				$proses_msg 	= "ditambahkan";
				$log = $params;
				$tipe_log = "insert";
			} else if ($tipe == 2) {
				$params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
				$params_where = array(
					"id_lokasi_kerja" 	=> $id
				);
				$log = $this->dbmodels->detail_lokasi_kerja($params_where)->row();
				$simpan_db 	= $this->dbmodels->update_lokasi_kerja($params, $params_where);
				$proses_msg 	= "diubah";
				$tipe_log = "update";
			}

			if ($simpan_db == true) {
				$this->auth->simpan_log("m_lokasi_kerja", $tipe_log, $this->ses["s_id_user"], json_encode($log));

				$success 	= 1;
				$message	= "Lokasi Kerja berhasil $proses_msg";
				$header 	= "Berhasil";
				$tipenotif 	= "success";
			} else {
				$message	= "lokasi_kerja gagal $proses_msg";
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

	private function rules_lokasi_kerja($tipe)
	{
		$rules =  [
			[
				"field"     => "lokasi_kerja",
				"label"     => "lokasi_kerja",
				"rules"     => "trim|required|max_length[100]",
				"errors"    => [
					"required"  => "lokasi_kerja harus diisi",
					"max_length"	=> "Lokasi Kerja maksimal 100 karakter"
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

		$count = $this->dbmodels->detail_lokasi_kerja(["id_lokasi_kerja" => $id])->num_rows();
		if ($count > 0) {
			return true;
		} else {
			$this->form_validation->set_message("check_id", "Data lokasi_kerja invalid");
			return false;
		}
	}


	public function get_status_modul()
	{
		$option 	= $this->list_status_modul(0);

		echo $option;
	}

	public function list_status_modul($id)
	{
		$option 	= "<option value=''>Pilih Status</option>";


		$getStatus 	= $this->dbmodels->get_status();

		foreach ($getStatus->result() as $result) {
			$cek 	= "";
			if ($id == $result->id_status_kerja) {
				$cek 	= "checked";
			}
			$option 	.= "<option value='" . $result->id_status_kerja . "' $cek>" . $result->status_kerja . "</option>";
		}

		return $option;
	}
}
