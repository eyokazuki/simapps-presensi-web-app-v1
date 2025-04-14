<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_m", "dbmodels");
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

		$optionPriv 					= "<option value=''>Pilih Privilage</option>";
		$getPriv	 					= $this->dbmodels->detail_priv(["aktif" => 1]);
		foreach ($getPriv->result() as $key) {
			$optionPriv 				.= "<option value='" .  $this->encryption->encrypt($key->id_priv) . "'>" . xssOutput($key->priv) . "</option>";

			//  echo $this->encryption->encrypt($key->id_priv);
			//  echo "<br/>";
			//  echo $key->id_priv;
			//  echo "<br/>";
		}
		// 		return;
		$data["optionPriv"] 			= $optionPriv;

		$data 					= array_merge($data, $setting, $icon);

		$this->load->view('user_v', $data);
	}

	public function noauth()
	{
		$data["menuSideBar"]	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$data 					= array_merge($data, $setting);
		$data["nama_menu"]		= "Access Denied";

		$this->load->view("partials/noauth", $data);
	}

	public function tabel_user()
	{
		$table 		= 'm_user';

		// Table's primary key
		$primaryKey = 'id_user';

		$columns = array(
			array(
				'db' 		=> 'a.username',
				'dt'  		=> 0,
				'field' 	=> 'username',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'a.nama',
				'dt' 		=> 2,
				'field' 	=> 'nama',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.username',
				'dt' 		=> 3,
				'field' 	=> 'username',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'd.departemen',
				'dt' 		=> 4,
				'field' 	=> 'departemen',
				'formatter' => function ($d, $row) {
					return xssOutput($d == null ? "Semua" : $d);
				}
			),
			array(
				'db'  		=> 'b.priv',
				'dt' 		=> 5,
				'field' 	=> 'priv',
				'formatter'	=> function ($d, $row) {
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
				'db'        => 'a.id_user',
				'dt'        => 1,
				'field'		=> 'id_user',
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
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_user(\"" . $id . "\")'><i class='ti ti-pencil'></i> Edit User</a></li>";
					}

					if ($this->grant["delete"]) {
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Hapus User</a></li>";
					}
					$button .=        "
                                    </ul>
                                </div>";
					return $button;
				}
			),
		);


		$joinQuery 	= "FROM " . $table . " as a  " .
			"LEFT JOIN m_priv as b ON a.ID_PRIV = b.ID_PRIV " .
			"LEFT JOIN m_departemen as d ON d.id_departemen = a.id_departemen";
		$extraWhere = NULL;
		$groupBy 	= NULL;


		$conn_db = db_ssp();

		echo json_encode(ssp::complex($_REQUEST, $conn_db, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy));
	}

	public function hapus_user()
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
			"id_user" 	=> $id
		);

		$log = $this->dbmodels->detail_user($params_where)->row();
		$db 		= $this->dbmodels->hapus_user($params_where);

		if ($db == true) {
			$this->auth->simpan_log("m_user", "delete", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "User berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "User gagal dihapus";
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

	public function detail_user()
	{
		$id 		=  $this->encryption->decrypt($this->input->post("id"));
		$params 	= array(
			"id_user" 	=> $id
		);
		$detailUser = $this->dbmodels->detail_user($params);
		$obj 		= array();



		if ($detailUser->num_rows() > 0) {
			$detailUser 	= $detailUser->row();

			$optionPriv 					= "<option value=''>Pilih Privilage</option>";
			$getPriv	 					= $this->dbmodels->detail_priv(["aktif" => 1]);
			foreach ($getPriv->result() as $key) {
				$selected = $detailUser->id_priv == $key->id_priv ? "selected" : "";

				$optionPriv 				.= "<option value='" .  $this->encryption->encrypt($key->id_priv) . "' $selected>" . xssOutput($key->priv) . "</option>";
			}

			$obj 			= array(
				"user"			=> xssOutput($detailUser->username),
				"nama"			=> xssOutput($detailUser->nama),
				"priv"			=>  $this->encryption->encrypt($detailUser->id_priv),
				"priv_data"		=>  $optionPriv,
				"aktif" 		=> $detailUser->aktif,
				"id_departemen" => $detailUser->id_departemen == null ? 0 : $detailUser->id_departemen,
				"nm_departemen" => $detailUser->departemen == null ? "Semua" : $detailUser->departemen,
			);
		}


		echo json_encode($obj);
	}

	public function simpan_user()
	{
		$user 		= xssInput($this->input->post("username"));
		$nama 		= xssInput($this->input->post("nama"));
		$priv 		=  $this->encryption->decrypt($this->input->post("privilege"));
		$pass 		= xssInput($this->input->post("password"));
		$id 		= $this->encryption->decrypt($this->input->post("id"));
		$tipe 		= xssInput($this->input->post("tipe"));
		$aktif 		= xssInput($this->input->post("aktif"));
		$departemen 		= xssInput($this->input->post("departemen"));

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

		$rules  = $this->rules_user($tipe);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() != false) {
			$aktif = $aktif !== "" ? 1 : 0;

			$params 	= array(
				"username"	=> $user,
				"nama"		=> $nama,
				"id_priv"	=> $priv,
				"aktif"		=> $aktif,
				"id_departemen" => $departemen,
			);

			if ($tipe == 1) {
				$params = $pass != "" ? array_merge($params, ["password"	=> password_hash($pass, PASSWORD_DEFAULT)]) : array_merge($params, ["password"	=> password_hash("12345", PASSWORD_DEFAULT)]);
				$simpan_db 	= $this->dbmodels->simpan_user($params);
				$proses_msg 	= "ditambahkan";
				$log = $params;
				$tipe_log = "insert";
			} else if ($tipe == 2) {
				$params = $pass != "" ? array_merge($params, ["password"	=> password_hash($pass, PASSWORD_DEFAULT)]) : $params;
				$params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
				$params_where = array(
					"id_user" 	=> $id
				);
				$log = $this->dbmodels->detail_user($params_where)->row();
				$simpan_db 	= $this->dbmodels->update_user($params, $params_where);
				$proses_msg 	= "diubah";
				$tipe_log = "update";
			}

			if ($simpan_db == true) {
				$this->auth->simpan_log("m_user", $tipe_log, $this->ses["s_id_user"], json_encode($log));

				$success 	= 1;
				$message	= "User berhasil $proses_msg";
				$header 	= "Berhasil";
				$tipenotif 	= "success";
			} else {
				$message	= "User gagal $proses_msg";
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

	private function rules_user($tipe)
	{
		$rules =  [
			[
				"field"     => "username",
				"label"     => "Username",
				"rules"     => "trim|required|callback_user_available|max_length[45]",
				"errors"    => [
					"required"  => "Username harus diisi",
					"max_length"	=> "Username maksimal 45 karakter"
				]
			],
			[
				"field"     => "nama",
				"label"     => "Nama",
				"rules"     => "trim|required|max_length[45]",
				"errors"    => [
					"required"  => "Nama harus diisi",
					"max_length"	=> "Nama maksimal 45 karakter"
				]
			],
			[
				"field"     => "privilege",
				"label"     => "Privilege",
				"rules"     => "trim|required",
				"errors"    => [
					"required"  => "Privilege harus diisi",
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
							"required"  => "Data User tidak ditemukan",
						]
					],
				]
			);
		}

		return $rules;
	}

	public function user_available()
	{
		$user = $this->input->post("username");
		$id = $this->encryption->decrypt($this->input->post("id"));

		if ($this->input->post("tipe") == 1) {
			$id = "";
		}

		$params_where 		= array(
			"username"		=> $user,
			"id_user != " 	=> $id
		);

		$detail 	= $this->dbmodels->detail_user($params_where);

		if ($detail->num_rows() > 0) {
			$this->form_validation->set_message("user_available", "Username '$user' sudah digunakan");
			return false;
		} else {
			return true;
		}
	}

	public function check_id()
	{
		$id =  $this->encryption->decrypt($this->input->post("id"));

		$count = $this->dbmodels->detail_user(["id_user" => $id])->num_rows();
		if ($count > 0) {
			return true;
		} else {
			$this->form_validation->set_message("check_id", "Data User invalid");
			return false;
		}
	}
}
