<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Privilege extends CI_Controller
{
	private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("privilege_m", "dbmodels");
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

		$this->load->view('privilege_v', $data);
	}

	public function noauth()
	{
		$data["menuSideBar"]	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$data 					= array_merge($data, $setting);
		$data["nama_menu"]		= "Access Denied";

		$this->load->view("dist/noauth", $data);
	}

	public function tabel_privilege()
	{
		$table 		= 'm_priv';

		// Table's primary key
		$primaryKey = 'id_priv';

		$columns = array(
			array(
				'db' 		=> 'priv',
				'dt'  		=> 0,
				'field' 	=> 'priv',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'priv',
				'dt' 		=> 2,
				'field' 	=> 'priv',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'aktif',
				'dt' 		=> 3,
				'field' 	=> 'aktif',
				'formatter' => function ($d, $row) {
					return $d == 1 ? "<span class='badge bg-label-primary'>Aktif</span>" : "<span class='badge bg-label-secondary'>Tidak Aktif</span>";
				}
			),
			array(
				'db'        => 'id_priv',
				'dt'        => 1,
				'field'		=> 'id_priv',
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
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_privilege(\"" . $id . "\")'><i class='ti ti-pencil'></i> Edit Privilege</a></li>";
					}

					if ($this->grant["delete"]) {
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Hapus Privilege</a></li>";
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

	public function hapus_privilege()
	{
		$success 	= 0;
		$message	= "";
		$header 	= "Gagal";
		$tipenotif 	= "error";
		if ($this->grant["delete"] == false) {
			$message	= "Anda tidak mempunyai otoritas menghapus data";
			goto out;
		}

		$id 		= $this->encryption->decrypt($this->input->post("id"));

		$params_where 	= array(
			"id_priv" 	=> $id
		);

		$log = $this->dbmodels->detail_privilege($params_where)->row();
		$db 		= $this->dbmodels->hapus_privilege($params_where);

		if ($db == true) {
			$this->auth->simpan_log("m_priv", "delete", $this->ses["s_id_user"], json_encode($log));
			$success 	= 1;
			$message	= "Privilege berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "Privilege gagal dihapus";
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

	public function detail_privilege()
	{
		$id 		= $this->encryption->decrypt($this->input->post("id"));

		$params_where 	= array(
			"id_priv"	=> $id,
		);

		$detail 	= $this->dbmodels->detail_privilege($params_where);
		$obj 		= array();
		if ($detail->num_rows() > 0) {
			$detail 		= $detail->row();
			$obj 			= array(
				"privilege" 	=> xssOutput($detail->priv),
				"aktif"			=> xssOutput($detail->aktif),
			);
		}

		echo json_encode($obj);
	}

	public function simpan_privilege()
	{
		$priv 		= xssInput($this->input->post("priv"));
		$tipe 		= xssInput($this->input->post("tipe"));
		$id 		= $this->encryption->decrypt($this->input->post("id"));
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


		$rules  = $this->rules_privilege($tipe);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() != false) {
			$aktif = $aktif !== "" ? 1 : 0;

			$params 			= array(
				"priv"				=> $priv,
				"aktif"				=> $aktif
			);

			if ($tipe == 1) {
				$simpan_db 	= $this->dbmodels->simpan_privilege($params);
				$proses_msg 	= "ditambahkan";
				$log = $params;
				$tipe_log = "insert";
			} else if ($tipe == 2) {
				$params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
				$params_where = array(
					"id_priv" 	=> $id
				);
				$log = $this->dbmodels->detail_privilege($params_where)->row();
				$simpan_db 	= $this->dbmodels->update_privilege($params, $params_where);
				$proses_msg 	= "diubah";
				$tipe_log = "update";
			}

			if ($simpan_db == true) {
				$this->auth->simpan_log("m_priv", $tipe_log, $this->ses["s_id_user"], json_encode($log));
				$success 	= 1;
				$message	= "Privilege berhasil $proses_msg";
				$header 	= "Berhasil";
				$tipenotif 	= "success";
			} else {
				$message	= "Privilege gagal $proses_msg";
			}
		} else {
			$success 	= 0;
			$message	= strip_tags(validation_errors());
			$header 	= "Gagal";
			$tipenotif 	= "error";
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

	private function rules_privilege($tipe)
	{
		$rules =  [
			[
				"field"     => "priv",
				"label"     => "Privilege",
				"rules"     => "trim|required|max_length[45]",
				"errors"    => [
					"required"  => "Privilege harus diisi",
					"max_length" => "Privilege maksimal 45 karakter"
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
							"required"  => "Data Privilege tidak ditemukan",
						]
					]
				]
			);
		}

		return $rules;
	}

	public function check_id()
	{
		$id = $this->encryption->decrypt($this->input->post("id"));

		$count = $this->dbmodels->detail_privilege(["id_priv" => $id])->num_rows();
		if ($count > 0) {
			return true;
		} else {
			$this->form_validation->set_message("check_id", "Data Privilege invalid");
			return false;
		}
	}
}
