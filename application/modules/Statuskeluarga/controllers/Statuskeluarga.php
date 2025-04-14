<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statuskeluarga extends CI_Controller
{
	private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("statuskeluarga_m", "dbmodels");
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

		$this->load->view('statuskeluarga_v', $data);
	}

	public function noauth()
	{
		$data["menuSideBar"]	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$data 					= array_merge($data, $setting);
		$data["nama_menu"]		= "Access Denied";

		$this->load->view("partials/noauth", $data);
	}

	public function tabel_status_keluarga()
	{
		$table 		= 'm_status_keluarga';

		// Table's primary key
		$primaryKey = 'id_status_keluarga';

		$columns = array(
			array(
				'db' 		=> 'status',
				'dt'  		=> 0,
				'field' 	=> 'status',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'status',
				'dt' 		=> 2,
				'field' 	=> 'status',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'tipe',
				'dt' 		=> 4,
				'field' 	=> 'tipe',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'kode_status',
				'dt' 		=> 3,
				'field' 	=> 'kode_status',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'aktif',
				'dt' 		=> 5,
				'field' 	=> 'aktif',
				'formatter' => function ($d, $row) {
					return $d == 1 ? "<span class='badge bg-label-primary'>Aktif</span>" : "<span class='badge bg-label-secondary'>Tidak Aktif</span>";
				}
			),
			array(
				'db'        => 'id_status_keluarga',
				'dt'        => 1,
				'field'		=> 'id_status_keluarga',
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
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_status_keluarga(\"" . $id . "\")'><i class='ti ti-pencil'></i> Edit Status Keluarga</a></li>";
					}

					if ($this->grant["delete"]) {
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Hapus Status Keluarga</a></li>";
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

	public function hapus_status_keluarga()
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
			"id_status_keluarga" 	=> $id
		);

		$log = $this->dbmodels->detail_status_keluarga($params_where)->row();
		$db 		= $this->dbmodels->hapus_status_keluarga($params_where);

		if ($db == true) {
			$this->auth->simpan_log("m_status_keluarga", "delete", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "Status Keluarga berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "Status Keluarga gagal dihapus";
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

	public function detail_status_keluarga()
	{
		$id 		=  $this->encryption->decrypt($this->input->post("id"));
		$params 	= array(
			"id_status_keluarga" 	=> $id
		);
		$detail = $this->dbmodels->detail_status_keluarga($params);
		$obj 		= array();



		if ($detail->num_rows() > 0) {
			$detail 	= $detail->row();

			$obj 			= array(
				"status_keluarga"	=> xssOutput($detail->status),
				"type" 		=> $detail->tipe,
				"kodestatus" 		=> $detail->kode_status,
				"aktif" 		=> $detail->aktif
			);
		}


		echo json_encode($obj);
	}

	public function simpan_status_keluarga()
	{
		$status_keluarga 	= xssInput($this->input->post("status_keluarga"));
		$id 		= $this->encryption->decrypt($this->input->post("id"));
		$tipe 		= xssInput($this->input->post("tipe"));
		$type 		= xssInput($this->input->post("type"));
		$kodestatus 		= xssInput($this->input->post("kodestatus"));
		$aktif 		= xssInput($this->input->post("aktif"));

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

		$rules  = $this->rules_status_keluarga($tipe);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() != false) {
			$aktif = $aktif !== "" ? 1 : 0;

			$params 	= array(
				"status"	=> $status_keluarga,
				"kode_status"		=> $kodestatus,
				"tipe"		=> $type,
				"aktif"		=> $aktif
			);

			if ($tipe == 1) {
				$simpan_db 	= $this->dbmodels->simpan_status_keluarga($params);
				$proses_msg 	= "ditambahkan";
				$log = $params;
				$tipe_log = "insert";
			} else if ($tipe == 2) {
				$params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
				$params_where = array(
					"id_status_keluarga" 	=> $id
				);
				$log = $this->dbmodels->detail_status_keluarga($params_where)->row();
				$simpan_db 	= $this->dbmodels->update_status_keluarga($params, $params_where);
				$proses_msg 	= "diubah";
				$tipe_log = "update";
			}

			if ($simpan_db == true) {
				$this->auth->simpan_log("m_status_keluarga", $tipe_log, $this->ses["s_id_user"], json_encode($log));

				$success 	= 1;
				$message	= "Status Keluarga berhasil $proses_msg";
				$header 	= "Berhasil";
				$tipenotif 	= "success";
			} else {
				$message	= "status_keluarga gagal $proses_msg";
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

	private function rules_status_keluarga($tipe)
	{
		$rules =  [
			[
				"field"     => "status_keluarga",
				"label"     => "status_keluarga",
				"rules"     => "trim|required|max_length[100]",
				"errors"    => [
					"required"  => "status_keluarga harus diisi",
					"max_length"	=> "Status Keluarga maksimal 100 karakter"
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
							"required"  => "Data Status Keluarga tidak ditemukan",
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

		$count = $this->dbmodels->detail_status_keluarga(["id_status_keluarga" => $id])->num_rows();
		if ($count > 0) {
			return true;
		} else {
			$this->form_validation->set_message("check_id", "Data status_keluarga invalid");
			return false;
		}
	}
}
