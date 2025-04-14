<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipevaksin extends CI_Controller
{
	private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("tipevaksin_m", "dbmodels");
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

		$this->load->view('tipevaksin_v', $data);
	}

	public function noauth()
	{
		$data["menuSideBar"]	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$data 					= array_merge($data, $setting);
		$data["nama_menu"]		= "Access Denied";

		$this->load->view("partials/noauth", $data);
	}

	public function tabel_tipe_vaksin()
	{
		$table 		= 'm_tipe_vaksin';

		// Table's primary key
		$primaryKey = 'id_tipe_vaksin';

		$columns = array(
			array(
				'db' 		=> 'tipe_vaksin',
				'dt'  		=> 0,
				'field' 	=> 'tipe_vaksin',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'tipe_vaksin',
				'dt' 		=> 2,
				'field' 	=> 'tipe_vaksin',
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
				'db'        => 'id_tipe_vaksin',
				'dt'        => 1,
				'field'		=> 'id_tipe_vaksin',
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
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_tipe_vaksin(\"" . $id . "\")'><i class='ti ti-pencil'></i> Edit Tipe Vaksin</a></li>";
					}

					if ($this->grant["delete"]) {
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Hapus Tipe Vaksin</a></li>";
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

	public function hapus_tipe_vaksin()
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
			"id_tipe_vaksin" 	=> $id
		);

		$log = $this->dbmodels->detail_tipe_vaksin($params_where)->row();
		$db 		= $this->dbmodels->hapus_tipe_vaksin($params_where);

		if ($db == true) {
			$this->auth->simpan_log("m_tipe_vaksin", "delete", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "Tipe Vaksin berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "Tipe Vaksin gagal dihapus";
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

	public function detail_tipe_vaksin()
	{
		$id 		=  $this->encryption->decrypt($this->input->post("id"));
		$params 	= array(
			"id_tipe_vaksin" 	=> $id
		);
		$detail = $this->dbmodels->detail_tipe_vaksin($params);
		$obj 		= array();



		if ($detail->num_rows() > 0) {
			$detail 	= $detail->row();

			$obj 			= array(
				"tipe_vaksin"	=> xssOutput($detail->tipe_vaksin),
				"aktif" 		=> $detail->aktif
			);
		}


		echo json_encode($obj);
	}

	public function simpan_tipe_vaksin()
	{
		$tipe_vaksin 	= xssInput($this->input->post("tipe_vaksin"));
		$id 		= $this->encryption->decrypt($this->input->post("id"));
		$tipe 		= xssInput($this->input->post("tipe"));
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

		$rules  = $this->rules_tipe_vaksin($tipe);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() != false) {
			$aktif = $aktif !== "" ? 1 : 0;

			$params 	= array(
				"tipe_vaksin"	=> $tipe_vaksin,
				"aktif"		=> $aktif
			);

			if ($tipe == 1) {
				$simpan_db 	= $this->dbmodels->simpan_tipe_vaksin($params);
				$proses_msg 	= "ditambahkan";
				$log = $params;
				$tipe_log = "insert";
			} else if ($tipe == 2) {
				$params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
				$params_where = array(
					"id_tipe_vaksin" 	=> $id
				);
				$log = $this->dbmodels->detail_tipe_vaksin($params_where)->row();
				$simpan_db 	= $this->dbmodels->update_tipe_vaksin($params, $params_where);
				$proses_msg 	= "diubah";
				$tipe_log = "update";
			}

			if ($simpan_db == true) {
				$this->auth->simpan_log("m_tipe_vaksin", $tipe_log, $this->ses["s_id_user"], json_encode($log));

				$success 	= 1;
				$message	= "Tipe Vaksin berhasil $proses_msg";
				$header 	= "Berhasil";
				$tipenotif 	= "success";
			} else {
				$message	= "tipe_vaksin gagal $proses_msg";
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

	private function rules_tipe_vaksin($tipe)
	{
		$rules =  [
			[
				"field"     => "tipe_vaksin",
				"label"     => "tipe_vaksin",
				"rules"     => "trim|required|max_length[100]",
				"errors"    => [
					"required"  => "tipe_vaksin harus diisi",
					"max_length"	=> "Tipe Vaksin maksimal 100 karakter"
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
							"required"  => "Data Tipe Vaksin tidak ditemukan",
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

		$count = $this->dbmodels->detail_tipe_vaksin(["id_tipe_vaksin" => $id])->num_rows();
		if ($count > 0) {
			return true;
		} else {
			$this->form_validation->set_message("check_id", "Data tipe_vaksin invalid");
			return false;
		}
	}
}
