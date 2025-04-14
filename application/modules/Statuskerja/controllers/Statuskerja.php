<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statuskerja extends CI_Controller
{
	private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("statuskerja_m", "dbmodels");
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

		$this->load->view('statuskerja_v', $data);
	}

	public function noauth()
	{
		$data["menuSideBar"]	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$data 					= array_merge($data, $setting);
		$data["nama_menu"]		= "Access Denied";

		$this->load->view("partials/noauth", $data);
	}

	public function tabel_status_kerja()
	{
		$table 		= 'm_status_kerja';

		// Table's primary key
		$primaryKey = 'id_status_kerja';

		$columns = array(
			array(
				'db' 		=> 'status_kerja',
				'dt'  		=> 0,
				'field' 	=> 'status_kerja',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'status_kerja',
				'dt' 		=> 2,
				'field' 	=> 'status_kerja',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'site',
				'dt' 		=> 3,
				'field' 	=> 'site',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'manhours',
				'dt' 		=> 4,
				'field' 	=> 'manhours',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'tipe',
				'dt' 		=> 5,
				'field' 	=> 'tipe',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'aktif',
				'dt' 		=> 6,
				'field' 	=> 'aktif',
				'formatter' => function ($d, $row) {
					return $d == 1 ? "<span class='badge bg-label-primary'>Aktif</span>" : "<span class='badge bg-label-secondary'>Tidak Aktif</span>";
				}
			),
			array(
				'db'        => 'id_status_kerja',
				'dt'        => 1,
				'field'		=> 'id_status_kerja',
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
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_status_kerja(\"" . $id . "\")'><i class='ti ti-pencil'></i> Edit Status Kerja</a></li>";
					}

					if ($this->grant["delete"]) {
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Hapus Status Kerja</a></li>";
					}
					$button .=        "
                                    </ul>
                                </div>";
					return $button;
				}
			),
		);


		$joinQuery 	= NULL;
		$extraWhere = NULL;
		$groupBy 	= NULL;


		$conn_db = db_ssp();

		echo json_encode(ssp::complex($_REQUEST, $conn_db, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy));
	}

	public function hapus_status_kerja()
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
			"id_status_kerja" 	=> $id
		);

		$log = $this->dbmodels->detail_status_kerja($params_where)->row();
		$db 		= $this->dbmodels->hapus_status_kerja($params_where);

		if ($db == true) {
			$this->auth->simpan_log("m_status_kerja", "delete", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "Status Kerja berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "Status Kerja gagal dihapus";
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

	public function detail_status_kerja()
	{
		$id 		=  $this->encryption->decrypt($this->input->post("id"));
		$params 	= array(
			"id_status_kerja" 	=> $id
		);
		$detail = $this->dbmodels->detail_status_kerja($params);
		$obj 		= array();



		if ($detail->num_rows() > 0) {
			$detail 	= $detail->row();

			$obj 			= array(
				"status_kerja"	=> xssOutput($detail->status_kerja),
				"type" 		=> $detail->tipe,
				"site" 		=> $detail->site,
				"manhours" 		=> $detail->manhours,
				"aktif" 		=> $detail->aktif
			);
		}


		echo json_encode($obj);
	}

	public function simpan_status_kerja()
	{
		$status_kerja 	= xssInput($this->input->post("status_kerja"));
		$id 		= $this->encryption->decrypt($this->input->post("id"));
		$tipe 		= xssInput($this->input->post("tipe"));
		$type 		= xssInput($this->input->post("type"));
		$aktif 		= xssInput($this->input->post("aktif"));
		$site 		= xssInput($this->input->post("site"));
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

		$rules  = $this->rules_status_kerja($tipe);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() != false) {
			$aktif = $aktif !== "" ? 1 : 0;

			$params 	= array(
				"status_kerja"	=> $status_kerja,
				"site"		=> $site,
				"manhours"		=> $manhours,
				"tipe"		=> $type,
				"aktif"		=> $aktif
			);

			if ($tipe == 1) {
				$simpan_db 	= $this->dbmodels->simpan_status_kerja($params);
				$proses_msg 	= "ditambahkan";
				$log = $params;
				$tipe_log = "insert";
			} else if ($tipe == 2) {
				$params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
				$params_where = array(
					"id_status_kerja" 	=> $id
				);
				$log = $this->dbmodels->detail_status_kerja($params_where)->row();
				$simpan_db 	= $this->dbmodels->update_status_kerja($params, $params_where);
				$proses_msg 	= "diubah";
				$tipe_log = "update";
			}

			if ($simpan_db == true) {
				$this->auth->simpan_log("m_status_kerja", $tipe_log, $this->ses["s_id_user"], json_encode($log));

				$success 	= 1;
				$message	= "Status Kerja berhasil $proses_msg";
				$header 	= "Berhasil";
				$tipenotif 	= "success";
			} else {
				$message	= "status_kerja gagal $proses_msg";
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

	private function rules_status_kerja($tipe)
	{
		$rules =  [
			[
				"field"     => "status_kerja",
				"label"     => "status_kerja",
				"rules"     => "trim|required|max_length[100]",
				"errors"    => [
					"required"  => "status_kerja harus diisi",
					"max_length"	=> "Status Kerja maksimal 100 karakter"
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
							"required"  => "Data Status Kerja tidak ditemukan",
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

		$count = $this->dbmodels->detail_status_kerja(["id_status_kerja" => $id])->num_rows();
		if ($count > 0) {
			return true;
		} else {
			$this->form_validation->set_message("check_id", "Data status_kerja invalid");
			return false;
		}
	}
}
