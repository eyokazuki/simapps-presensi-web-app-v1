<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisikesehatan extends CI_Controller
{
	private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("kondisikesehatan_m", "dbmodels");
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

		$this->load->view('kondisikesehatan_v', $data);
	}

	public function noauth()
	{
		$data["menuSideBar"]	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$data 					= array_merge($data, $setting);
		$data["nama_menu"]		= "Access Denied";

		$this->load->view("partials/noauth", $data);
	}

	public function tabel_kondisikesehatan()
	{
		$table 		= 'm_kondisi_kesehatan';

		// Table's primary key
		$primaryKey = 'id_kondisi_kesehatan';

		$columns = array(
			array(
				'db' 		=> 'kondisi_kesehatan',
				'dt'  		=> 0,
				'field' 	=> 'kondisi_kesehatan',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'kondisi_kesehatan',
				'dt' 		=> 2,
				'field' 	=> 'kondisi_kesehatan',
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
				'db'        => 'id_kondisi_kesehatan',
				'dt'        => 1,
				'field'		=> 'id_kondisi_kesehatan',
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
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_kondisikesehatan(\"" . $id . "\")'><i class='ti ti-pencil'></i> Edit Kondisi Kesehatan</a></li>";
					}

					if ($this->grant["delete"]) {
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Hapus Kondisi Kesehatan</a></li>";
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

	public function hapus_kondisikesehatan()
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
			"id_kondisi_kesehatan" 	=> $id
		);

		$log = $this->dbmodels->detail_kondisikesehatan($params_where)->row();
		$db 		= $this->dbmodels->hapus_kondisikesehatan($params_where);

		if ($db == true) {
			$this->auth->simpan_log("m_kondisi_kesehatan", "delete", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "Kondisi Kesehatan berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "Kondisi Kesehatan gagal dihapus";
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

	public function detail_kondisikesehatan()
	{
		$id 		=  $this->encryption->decrypt($this->input->post("id"));
		$params 	= array(
			"id_kondisi_kesehatan" 	=> $id
		);
		$detail = $this->dbmodels->detail_kondisikesehatan($params);
		$obj 		= array();



		if ($detail->num_rows() > 0) {
			$detail 	= $detail->row();

			$obj 			= array(
				"kondisikesehatan"		=> xssOutput($detail->kondisi_kesehatan),
				"aktif" 		=> $detail->aktif
			);
		}


		echo json_encode($obj);
	}

	public function simpan_kondisikesehatan()
	{
		$kondisikesehatan 	= xssInput($this->input->post("kondisikesehatan"));
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

		$rules  = $this->rules_kondisikesehatan($tipe);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() != false) {
			$aktif = $aktif !== "" ? 1 : 0;

			$params 	= array(
				"kondisi_kesehatan"	=> $kondisikesehatan,
				"aktif"		=> $aktif
			);

			if ($tipe == 1) {
				$simpan_db 	= $this->dbmodels->simpan_kondisikesehatan($params);
				$proses_msg 	= "ditambahkan";
				$log = $params;
				$tipe_log = "insert";
			} else if ($tipe == 2) {
				$params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
				$params_where = array(
					"id_kondisi_kesehatan" 	=> $id
				);
				$log = $this->dbmodels->detail_kondisikesehatan($params_where)->row();
				$simpan_db 	= $this->dbmodels->update_kondisikesehatan($params, $params_where);
				$proses_msg 	= "diubah";
				$tipe_log = "update";
			}

			if ($simpan_db == true) {
				$this->auth->simpan_log("m_kondisi_kesehatan", $tipe_log, $this->ses["s_id_user"], json_encode($log));

				$success 	= 1;
				$message	= "Kondisi Kesehatan berhasil $proses_msg";
				$header 	= "Berhasil";
				$tipenotif 	= "success";
			} else {
				$message	= "Kondisi Kesehatan gagal $proses_msg";
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

	private function rules_kondisikesehatan($tipe)
	{
		$rules =  [
			[
				"field"     => "kondisikesehatan",
				"label"     => "kondisikesehatan",
				"rules"     => "trim|required|max_length[100]",
				"errors"    => [
					"required"  => "Kondisi Kesehatan harus diisi",
					"max_length"	=> "Kondisi Kesehatan maksimal 100 karakter"
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
							"required"  => "Data Kondisi Kesehatan tidak ditemukan",
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

		$count = $this->dbmodels->detail_kondisikesehatan(["id_kondisi_kesehatan" => $id])->num_rows();
		if ($count > 0) {
			return true;
		} else {
			$this->form_validation->set_message("check_id", "Data Kondisi Kesehatan invalid");
			return false;
		}
	}
}
