<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modul extends CI_Controller
{
	private $grant;
	private $ses;


	public function __construct()
	{
		parent::__construct();
		$this->load->model("modul_m", "dbmodels");
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


		$this->load->view('modul_v', $data);
	}

	public function noauth()
	{
		$data["menuSideBar"]	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$data 					= array_merge($data, $setting);
		$data["nama_menu"]		= "Access Denied";

		$this->load->view("partials/noauth", $data);
	}

	public function tabel_modul()
	{
		$table 		= 'm_menu';

		// Table's primary key
		$primaryKey = 'id_menu';

		$columns = array(
			array(
				'db' 		=> 'a.nama_menu',
				'dt'  		=> 0,
				'field' 	=> 'nama_menu',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db'        => 'a.id_menu',
				'dt'        => 1,
				'field'		=> 'id_menu',
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
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_modul(\"" . $id . "\")'><i class='ti ti-pencil'></i> Edit Modul</a></li>";
					}

					if ($this->grant["delete"]) {
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Hapus Modul</a></li>";
					}
					$button .=        "
                                    </ul>
                                </div>";
					return $button;
				},
			),
			array(
				'db' 		=> 'a.nama_menu',
				'dt' 		=> 2,
				'field' 	=> 'nama_menu',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db'  		=> 'a.controller',
				'dt' 		=> 3,
				'field' 	=> 'controller',
				'formatter'	=> function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db'  		=> 'a.icon_menu',
				'dt' 		=> 4,
				'field' 	=> 'icon_menu',
				'formatter'	=> function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db'  		=> 'a.breadcumb_menu',
				'dt' 		=> 5,
				'field' 	=> 'breadcumb_menu',
				'formatter'	=> function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db'  		=> 'a.has_child',
				'dt' 		=> 6,
				'field' 	=> 'has_child',
				'formatter'	=> function ($d, $row) {
					return xssOutput($d) == 1 ? "<i class='ti ti-checkbox text-primary'></i>" : "";
				}
			),
			array(
				'db'  		=> 'a.is_child',
				'dt' 		=> 7,
				'field' 	=> 'is_child',
				'formatter'	=> function ($d, $row) {
					return xssOutput($d) == 1 ? "<i class='ti ti-checkbox text-primary'></i>" : "";
				}
			),
			array(
				'db'  		=> 'a.is_menu',
				'dt' 		=> 8,
				'field' 	=> 'is_menu',
				'formatter'	=> function ($d, $row) {
					return xssOutput($d) == 1 ? "<i class='ti ti-checkbox text-primary'></i>" : "";
				}
			),
			array(
				'db'  		=> 'a.need_auth',
				'dt' 		=> 9,
				'field' 	=> 'need_auth',
				'formatter'	=> function ($d, $row) {
					return xssOutput($d) == 1 ? "<i class='ti ti-checkbox text-primary'></i>" : "";
				}
			),
			array(
				'db'  		=> 'b.nama_menu',
				'dt' 		=> 10,
				'field' 	=> 'parent',
				'as' 		=> 'parent',
				'formatter'	=> function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db'  		=> 'a.urutan',
				'dt' 		=> 11,
				'field' 	=> 'urutan',
				'formatter'	=> function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db'  		=> 'a.parent_id',
				'dt' 		=> 12,
				'field' 	=> 'parent_id',
				'formatter'	=> function ($d, $row) {
					return xssOutput($d);
				}
			),
		);


		$joinQuery 	= "FROM " . $table . " as a  " .
			" LEFT JOIN " . $table . " as b ON a.PARENT_ID=b.ID_MENU";
		$extraWhere = NULL;
		$groupBy 	= NULL;


		$conn_db = db_ssp();
		// echo ($_REQUEST);

		$_REQUEST["order"][0]["column"] = 11;
		$_REQUEST["order"][0]["dir"] = "asc";
		$_REQUEST["order"][1]["column"] = 12;
		$_REQUEST["order"][1]["dir"] = "desc";

		echo json_encode(ssp::complex($_REQUEST, $conn_db, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy));
	}

	public function hapus_modul()
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
			"id_menu"	=> $id
		);

		$log = $this->dbmodels->detail_modul($params_where)->row();
		$db 		= $this->dbmodels->hapus_modul($params_where);

		if ($db == true) {
			$this->auth->simpan_log("m_modul", "delete", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "Modul berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "Modul gagal dihapus";
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

	public function detail_modul()
	{
		$id 			= $this->encryption->decrypt($this->input->post("id"));
		$params_id 		= array(
			"id_menu"		=> $id
		);

		$detailModul 	= $this->dbmodels->detail_modul($params_id);

		$obj 			= array();
		if ($detailModul->num_rows() > 0) {
			$detailModul 	= $detailModul->row();
			$option 	 	= $this->list_parent_modul(2, $detailModul->parent_id);
			$struktur 		= $detailModul->has_child == 1 ? 2 : ($detailModul->is_child == 1 ? 3 : 1);
			$parent 		= $detailModul->is_child == 1 ? $detailModul->parent_id   : "";
			$obj 			= array(
				"menu" 			=> xssOutput($detailModul->nama_menu),
				"control"		=> xssOutput($detailModul->controller),
				"icon" 			=> xssOutput($detailModul->icon_menu),
				"breadcumb"		=> xssOutput($detailModul->breadcumb_menu),
				"struktur"		=> $struktur,
				"parent"		=> $parent,
				"urutan"		=> xssOutput($detailModul->urutan),
				"option"		=> $option,
				"is_menu"		=> $detailModul->is_menu,
				"need_auth"		=> $detailModul->need_auth,
			);
		}

		echo json_encode($obj);
	}

	public function simpan_modul()
	{
		$menu 			= xssInput($this->input->post("menu"));
		$icon 			= xssInput($this->input->post("icon"));
		$breadcumb 		= xssInput($this->input->post("breadcumb"));
		$control 		= xssInput($this->input->post("control"));
		$parent 		= xssInput($this->input->post("parent"));
		$urutan 		= xssInput($this->input->post("urutan"));
		$struktur 		= xssInput($this->input->post("struktur"));
		$id 			= $this->encryption->decrypt($this->input->post("id"));
		$tipe 			= xssInput($this->input->post("tipe"));
		$is_menu 		= xssInput($this->input->post("is_menu"));
		$need_auth 		= xssInput($this->input->post("need_auth"));

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

		$has_child = 0;
		$is_child = 0;
		if ($struktur == 2) {
			$has_child = 1;
			$is_child = 0;
		} else if ($struktur == 3) {
			$has_child = 0;
			$is_child = 1;
		}

		if ($parent == "") {
			$parent = 0;
		}

		$rules  = $this->rules_modul($tipe);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() != false) {

			$is_menu = $is_menu !== "" ? 1 : 0;
			$need_auth = $need_auth !== "" ? 1 : 0;

			$params 		= array(
				"nama_menu" 		=> $menu,
				"controller" 		=> $control,
				"icon_menu" 		=> $icon,
				"breadcumb_menu" 	=> $breadcumb,
				"has_child" 		=> $has_child,
				"is_child" 			=> $is_child,
				"parent_id" 		=> $parent,
				"urutan" 			=> $urutan,
				"is_menu" 			=> $is_menu,
				"need_auth" 		=> $need_auth,
			);

			if ($tipe == 1) {
				$tipe_log = "insert";
				$proses_msg 	= "disimpan";
				$log = $params;
				$simpan_db 	= $this->dbmodels->simpan_modul($params);
			} else if ($tipe == 2) {
				$tipe_log = "update";
				$proses_msg 	= "diubah";
				$params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
				$params_where 		= array(
					"id_menu" 		=> $id
				);
				$log = $this->dbmodels->detail_modul($params_where)->row();
				$simpan_db 	= $this->dbmodels->update_modul($params, $params_where);
			}

			if ($simpan_db == true) {
				$this->auth->simpan_log("m_modul", $tipe_log, $this->ses["s_id_user"], json_encode($log));

				$success 	= 1;
				$message	= "Modul berhasil $proses_msg";
				$header 	= "Berhasil";
				$tipenotif 	= "success";
			} else {
				$success 	= 0;
				$message	= "Modul gagal $proses_msg";
				$header 	= "Gagal";
				$tipenotif 	= "error";
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

	private function rules_modul($tipe)
	{
		$rules =  [
			[
				"field"     => "menu",
				"label"     => "Menu",
				"rules"     => "trim|required|max_length[100]",
				"errors"    => [
					"required"  => "Menu harus diisi",
					"max_length"	=> "Menu maksimal 100 karakter"
				]
			],
			[
				"field"     => "icon",
				"label"     => "Icon",
				"rules"     => "trim|required|max_length[100]",
				"errors"    => [
					"required"  => "Icon harus diisi",
					"max_length"	=> "Icon maksimal 100 karakter"
				]
			],
			[
				"field"     => "breadcumb",
				"label"     => "Breadcumb",
				"rules"     => "trim|required|max_length[100]",
				"errors"    => [
					"required"  => "Breadcumb harus diisi",
					"max_length"	=> "Breadcumb maksimal 100 karakter"
				]
			],
			[
				"field"     => "control",
				"label"     => "Control",
				"rules"     => "trim|required|max_length[100]",
				"errors"    => [
					"required"  => "Control harus diisi",
					"max_length"	=> "Control maksimal 100 karakter"
				]
			],
			[
				"field"     => "urutan",
				"label"     => "Urutan",
				"rules"     => "trim|required|numeric",
				"errors"    => [
					"required"  => "Urutan harus diisi",
					"numeric"	=> "Urutan harus berupa angka"
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
							"required"  => "Data Modul tidak ditemukan",
						]
					],
				]
			);
		}

		return $rules;
	}

	public function check_id()
	{
		$id = $this->encryption->decrypt($this->input->post("id"));

		$count = $this->dbmodels->detail_modul(["id_menu" => $id])->num_rows();
		if ($count > 0) {
			return true;
		} else {
			$this->form_validation->set_message("check_id", "Data Modul invalid");
			return false;
		}
	}

	public function get_parent_modul()
	{
		$option 	= $this->list_parent_modul(1, 0);

		echo $option;
	}

	public function list_parent_modul($tipe, $id)
	{
		$option 	= "<option value=''>Pilih Parent</option>";

		$params 	= array(
			"HAS_CHILD"		=> 1
		);

		$getParent 	= $this->dbmodels->get_parent($params);

		foreach ($getParent->result() as $result) {
			$cek 	= "";
			if ($tipe == 2 && $id == $result->id_menu) {
				$cek 	= "checked";
			}
			$option 	.= "<option value='" . $result->id_menu . "' $cek>" . $result->nama_menu . "</option>";
		}

		return $option;
	}
}
