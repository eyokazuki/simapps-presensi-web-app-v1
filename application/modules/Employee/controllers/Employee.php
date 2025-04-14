<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Employee extends CI_Controller
{
	private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("employee_m", "dbmodels");
		$this->auth->authlog();
		$this->grant 	= $this->auth->getGrant();

		$modul  		= $this->auth->modul();
		$this->ses 		= $this->session->userdata($modul);
	}

	public function index()
	{
		$dataUser = $this->dbmodels->getUser($this->ses["s_id_user"]);
		$data["menuSideBar"]   	= $this->auth->getMenu();
		$data["create_akses"]	= $this->grant["create"];
		$data["dataUser"] 		= $dataUser;
		$setting 				= $this->auth->getSetting();
		$icon 					= $this->auth->getIcon();
		$data 					= array_merge($data, $setting, $icon);

		$this->load->view('employee_v', $data);
	}

	public function noauth()
	{
		$data["menuSideBar"]	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$data 					= array_merge($data, $setting);
		$data["nama_menu"]		= "Access Denied";

		$this->load->view("partials/noauth", $data);
	}

	public function tabel_employee()
	{
		$table 		= 'm_employee';

		// Table's primary key
		$primaryKey = 'id_employee';

		$columns = array(
			array(
				'db' 		=> 'a.code',
				'dt'  		=> 0,
				'field' 	=> 'code',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'a.code',
				'dt' 		=> 2,
				'field' 	=> 'code',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.nama',
				'dt' 		=> 3,
				'field' 	=> 'nama',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.nik',
				'dt' 		=> 4,
				'field' 	=> 'nik',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.no_hp',
				'dt' 		=> 5,
				'field' 	=> 'no_hp',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.alamat',
				'dt' 		=> 6,
				'field' 	=> 'alamat',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.email',
				'dt' 		=> 7,
				'field' 	=> 'email',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.tanggal_lahir',
				'dt' 		=> 8,
				'field' 	=> 'tanggal_lahir',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.jenis_kelamin',
				'dt' 		=> 9,
				'field' 	=> 'jenis_kelamin',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'e.employee_status',
				'dt' 		=> 15,
				'field' 	=> 'employee_status',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'd.jabatan',
				'dt' 		=> 12,
				'field' 	=> 'jabatan',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'g.section',
				'dt' 		=> 13,
				'field' 	=> 'section',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'f.jabatan',
				'dt' 		=> 14,
				'as'        => 'parent',
				'field' 	=> 'parent',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'c.company',
				'dt' 		=> 10,
				'field' 	=> 'company',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'b.departemen',
				'dt' 		=> 11,
				'field' 	=> 'departemen',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'a.aktif',
				'dt' 		=> 16,
				'field' 	=> 'aktif',
				'formatter' => function ($d, $row) {
					return $d == 1 ? "<span class='badge bg-label-primary'>Aktif</span>" : "<span class='badge bg-label-secondary'>Tidak Aktif</span>";
				}
			),
			array(
				'db' 		=> 'a.is_admin',
				'dt'  		=> 17,
				'field' 	=> 'is_admin',
				'formatter'	=> function ($d, $row) {
					return $d == 1 ? "<span class='badge bg-label-primary'>Admin</span>" : "<span class='badge bg-label-secondary'>Bukan Admin</span>";
				}
			),
			array(
				'db' 		=> 'a.is_rotator',
				'dt'  		=> 18,
				'field' 	=> 'is_rotator',
				'formatter'	=> function ($d, $row) {
					return $d == 1 ? "<span class='badge bg-label-primary'>Rotator</span>" : "<span class='badge bg-label-secondary'>Non Rotator</span>";
				}
			),
			array(
				'db' 		=> 'a.created_at',
				'dt'  		=> 19,
				'field' 	=> 'created_at',
				'formatter'	=> function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db'        => 'a.id_employee',
				'dt'        => 1,
				'field'		=> 'id_employee',
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
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_employee(\"" . $id . "\")'><i class='ti ti-pencil'></i> Edit employee</a></li>";
					}

					if ($this->grant["delete"]) {
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Nonaktifkan employee</a></li>";
					}
					$button 	.= "<li>
						<a class='dropdown-item' href='#' onclick='resetPassword(\"" . $id . "\")'>
							<i class='ti ti-lock'></i>  Reset Password
						</a>
					</li>";
					$button 	.= "<li>
						<a class='dropdown-item' href='/employee/keluarga?id=" . $d . "'>
							<i class='fa fa-users'></i>  Lihat Keluarga
						</a>
					</li>";
					$button .=        "
                                    </ul>
                                </div>";
					return $button;
				}
			),
		);

		$dataUser = $this->dbmodels->getUser($this->ses["s_id_user"]);

		$joinQuery 	= "FROM " . $table . " as a 
        left join m_departemen b on b.id_departemen=a.id_departemen
        left join m_company c on c.id_company=a.id_company
        left join m_jabatan d on d.id_jabatan=a.id_jabatan
        left join m_employee_status e on e.id_employee_status=a.id_employee_status
        left join m_jabatan f on f.id_jabatan=a.parent_position_id
        left join m_section g on g.id_section=a.position_id
        ";
		$extraWhere = NULL;
		if ($dataUser->id_departemen != 0) {
			$extraWhere = " b.id_departemen = $dataUser->id_departemen";
		}
		$groupBy 	= NULL;


		$conn_db = db_ssp();

		echo json_encode(ssp::complex($_REQUEST, $conn_db, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy));
	}

	public function hapus_employee()
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
			"id_employee" 	=> $id
		);

		$log = $this->dbmodels->detail_employee($id)->row();
		$db 		= $this->dbmodels->hapus_employee($params_where, $id);

		if ($db == true) {
			$this->auth->simpan_log("m_employee", "delete", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "employee berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "employee gagal dihapus";
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

	public function detail_employee()
	{
		$id 		=  $this->encryption->decrypt($this->input->post("id"));
		$params 	= array(
			"id_employee" 	=> $id
		);
		$detail = $this->dbmodels->detail_employee($id);
		$obj 		= array();



		if ($detail->num_rows() > 0) {
			$detail 	= $detail->row();

			$obj 			= array(
				"nama"		=> xssOutput($detail->nama),
				"code"	=> $detail->code,
				"nik"	=> $detail->nik,
				"no_hp"	=> $detail->no_hp,
				"tanggal_lahir"	=> $detail->tanggal_lahir,
				"alamat"	=> xssOutput($detail->alamat),
				"email"	=> $detail->email,
				"jenis_kelamin"	=> $detail->jenis_kelamin,
				"parent_position_id"	=> $detail->parent_position_id,
				"parent_position_nm"	=> $detail->parent_position_nm,
				"position_id"	=> $detail->position_id ? $detail->position_id : 0,
				"position_nm"	=> $detail->position_id ? $detail->position_nm : "Tidak Ada Section",
				"id_jabatan"	=> $detail->id_jabatan,
				"nm_jabatan"	=> $detail->jabatan,
				"id_employee_status"	=> $detail->id_employee_status,
				"nm_employee_status"	=> $detail->employee_status,
				"id_company"	=> $detail->id_company,
				"nm_company"	=> $detail->company,
				"id_departemen" => $detail->id_departemen,
				"nm_departemen" => $detail->departemen,
				"aktif" 		=> $detail->aktif,
				"is_admin" => $detail->is_admin,
				"is_rotator" => $detail->is_rotator,
			);
		}


		echo json_encode($obj);
	}

	public function simpan_employee()
	{
		$id 		= $this->encryption->decrypt($this->input->post("id"));
		$tipe 		= xssInput($this->input->post("tipe"));

		$code 		= xssInput($this->input->post("code"));
		$employee 	= xssInput($this->input->post("employee"));
		$nik 		= xssInput($this->input->post("nik"));
		$hp 		= xssInput($this->input->post("hp"));
		$lahir 		= xssInput($this->input->post("lahir"));
		$alamat 	= xssInput($this->input->post("alamat"));
		$email 		= xssInput($this->input->post("email"));
		$jenis 		= xssInput($this->input->post("jenis"));
		$parent 	= xssInput($this->input->post("parent"));
		$section 	= xssInput($this->input->post("section"));
		$section = $section == "0" ? null : $section;
		$jabatan 	= xssInput($this->input->post("jabatan"));
		$status 	= xssInput($this->input->post("status"));
		$company 	= xssInput($this->input->post("company"));
		$departemen = xssInput($this->input->post("departemen"));
		$aktif 		= xssInput($this->input->post("aktif"));
		$is_admin 		= xssInput($this->input->post("is_admin"));
		$is_rotator 		= xssInput($this->input->post("is_rotator"));
		($jenis == 'on') ? $jenis = "P" : $jenis = "L";
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

		$rules  = $this->rules_employee($tipe);
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() != false) {
			$aktif = $aktif !== "" ? 1 : 0;
			$is_admin = $is_admin !== "" ? 1 : 0;
			$is_rotator = $is_rotator !== "" ? 1 : 0;


			if ($tipe == 1) {
				$params 	= array(
					"code"	=> $code,
					"nama"	=> $employee,
					"nik"	=> $nik,
					"no_hp"	=> $hp,
					"tanggal_lahir"	=> $lahir,
					"alamat"	=> $alamat,
					"password"	=> password_hash("12345", PASSWORD_DEFAULT),
					"email"	=> $email,
					"jenis_kelamin"	=> $jenis,
					"parent_position_id"	=> $parent,
					"position_id"	=> $section,
					"id_section" => $section,
					"id_jabatan"	=> $jabatan,
					"id_employee_status"	=> $status,
					"id_company"	=> $company,
					"id_departemen" => $departemen,
					"aktif"		=> $aktif,
					"is_admin"		=> $is_admin,
					"is_rotator"		=> $is_rotator
				);

				$simpan_db 	= $this->dbmodels->simpan_employee($params);
				$proses_msg 	= "ditambahkan";
				$log = $params;
				$tipe_log = "insert";
			} else if ($tipe == 2) {
				$params 	= array(
					"code"	=> $code,
					"nama"	=> $employee,
					"nik"	=> $nik,
					"no_hp"	=> $hp,
					"tanggal_lahir"	=> $lahir,
					"alamat"	=> $alamat,
					"email"	=> $email,
					"jenis_kelamin"	=> $jenis,
					"parent_position_id"	=> $parent,
					"position_id"	=> $section,
					"id_section" => $section,
					"id_jabatan"	=> $jabatan,
					"id_employee_status"	=> $status,
					"id_company"	=> $company,
					"id_departemen" => $departemen,
					"aktif"		=> $aktif,
					"is_admin"		=> $is_admin,
					"is_rotator"		=> $is_rotator
				);
				$params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
				$params_where = array(
					"id_employee" 	=> $id
				);
				$log = $this->dbmodels->detail_employee($id)->row();
				$simpan_db 	= $this->dbmodels->update_employee($params, $params_where);
				$proses_msg 	= "diubah";
				$tipe_log = "update";
			}

			if ($simpan_db == true) {
				$this->auth->simpan_log("m_employee", $tipe_log, $this->ses["s_id_user"], json_encode($log));

				$success 	= 1;
				$message	= "Employee berhasil $proses_msg";
				$header 	= "Berhasil";
				$tipenotif 	= "success";
			} else {
				$message	= "Employee gagal $proses_msg";
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

	private function rules_employee($tipe)
	{
		$rules =  [
			[
				"field"     => "employee",
				"label"     => "employee",
				"rules"     => "trim|required|max_length[100]",
				"errors"    => [
					"required"  => "employee harus diisi",
					"max_length"	=> "employee maksimal 100 karakter"
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
							"required"  => "Data employee tidak ditemukan",
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

		$count = $this->dbmodels->detail_employee($id)->num_rows();
		if ($count > 0) {
			return true;
		} else {
			$this->form_validation->set_message("check_id", "Data employee invalid");
			return false;
		}
	}

	public function get_parent_modul()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->dbmodels->getparent($searchTerm);
		echo json_encode($response);
	}

	public function get_jabatan_modul()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->dbmodels->getjabatan($searchTerm);
		echo json_encode($response);
	}

	public function get_status_modul()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->dbmodels->getstatus($searchTerm);
		echo json_encode($response);
	}

	public function get_company_modul()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->dbmodels->getcompany($searchTerm);
		echo json_encode($response);
	}

	public function get_departemen_modul()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response = $this->dbmodels->getdepartemen($searchTerm);
		echo json_encode($response);
	}

	public function reset_password()
	{
		$success 	= 0;
		$message	= "";
		$header 	= "Gagal";
		$tipenotif 	= "error";

		$id 		=  $this->encryption->decrypt($this->input->post("id"));

		$log = $this->dbmodels->detail_employee($id)->row();
		$db 		= $this->dbmodels->reset_password($id);

		if ($db == true) {
			$this->auth->simpan_log("m_employee", "reset_password", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "password berhasil direset";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "gagal reset password";
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

	public function keluarga_page()
	{
		$id = $this->input->get("id");
		$dataUser = $this->dbmodels->getUser($this->ses["s_id_user"]);
		$data["menuSideBar"]   	= $this->auth->getMenu();
		$data["create_akses"]	= $this->grant["create"];
		$data["dataUser"] 		= $dataUser;
		$data["dataEmployee"] = $this->dbmodels->get_employee($id);
		$data["dataStatusKeluarga"] = $this->dbmodels->get_status_keluarga();
		$setting 				= $this->auth->getSetting();
		$icon 					= $this->auth->getIcon();
		$data 					= array_merge($data, $setting, $icon);

		$this->load->view('employee_keluarga_v', $data);
	}

	public function tabel_employee_keluarga()
	{
		$idEmployee = $this->input->get("id");
		$table 		= 'm_keluarga';

		// Table's primary key
		$primaryKey = 'id_keluarga';

		$columns = array(
			array(
				'db' 		=> 'mk.id_keluarga',
				'dt'  		=> 0,
				'field' 	=> 'id_keluarga',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'mk.nama',
				'dt' 		=> 2,
				'field' 	=> 'nama',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'msk.id_status_keluarga',
				'dt' 		=> 6,
				'field' 	=> 'id_status_keluarga',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'msk.status',
				'dt' 		=> 3,
				'field' 	=> 'status',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'mk.jenis_kelamin',
				'dt' 		=> 4,
				'field' 	=> 'jenis_kelamin',
				'formatter' => function ($d, $row) {
					return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'mk.aktif',
				'dt' 		=> 5,
				'field' 	=> 'aktif',
				'formatter' => function ($d, $row) {
					return $d == 1 ? "<span class='badge bg-label-primary'>Aktif</span>" : "<span class='badge bg-label-secondary'>Tidak Aktif</span>";
				}
			),
			array(
				'db'        => 'mk.id_keluarga',
				'dt'        => 1,
				'field'		=> 'id_keluarga',
				'formatter' => function ($d, $row) {
					$id = $d;
					$button 	= "";

					$button .= "<div class='btn-group'>
                                    <button type='button' class='btn btn-sm btn-primary'>Aksi</button>
                                    <button type='button' class='btn btn-sm btn-primary dropdown-toggle dropdown-toggle-split' data-bs-toggle='dropdown' aria-expanded='false'>
                                        <span class='visually-hidden'>Toggle Dropdown</span>
                                    </button>
                                    <ul class='dropdown-menu'>";
					$nama = $row["nama"];
					$aktif = $row["aktif"];
					$jenis_kelamin = $row["jenis_kelamin"];
					$status_keluarga = $row["id_status_keluarga"];
					$button 	.= "<li><a class='dropdown-item btn-edit' href='#' data-id='$id' data-nama='$nama' data-aktif='$aktif' data-jenis='$jenis_kelamin' data-status='$status_keluarga'><i class='ti ti-pencil'></i> Edit Keluarga</a></li>";
					$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Hapus Keluarga</a></li>";
					$button .=        "
                                    </ul>
                                </div>";
					return $button;
				}
			),
		);

		$dataUser = $this->dbmodels->getUser($this->ses["s_id_user"]);

		$joinQuery 	= "FROM " . $table . " as mk 
        inner join m_status_keluarga msk on mk.status_keluarga=msk.id_status_keluarga
		where mk.id_employee = '$idEmployee'
        ";
		$extraWhere = NULL;
		$groupBy 	= NULL;
		$conn_db = db_ssp();
		echo json_encode(ssp::complex($_REQUEST, $conn_db, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy));
	}

	public function simpan_employee_keluarga()
	{
		$id 		= $this->input->post("id");
		$id_employee 	= xssInput($this->input->post("id_employee"));
		$nama 		= xssInput($this->input->post("nama"));
		$status_keluarga 		= xssInput($this->input->post("status_keluarga"));
		$jenis_kelamin 		= xssInput($this->input->post("jenis"));
		$aktif 	= xssInput($this->input->post("aktif"));
		($jenis_kelamin == 'on') ? $jenis_kelamin = "P" : $jenis_kelamin = "L";
		$success 	= 0;
		$message	= "";
		$header 	= "Peringatan";
		$tipenotif 	= "error";

		if ($id) {
			if ($this->grant["edit"] == false) {
				$message	= "Anda tidak mempunyai otoritas mengubah data";
				goto out;
			}
		} else {
			if ($this->grant["create"] == false) {
				$message	= "Anda tidak mempunyai otoritas menambah data";
				goto out;
			}
		}

		$aktif = $aktif !== "" ? 1 : 0;

		$params = array(
			"nama" => $nama,
			"id_employee" => $id_employee,
			"status_keluarga" => $status_keluarga,
			"jenis_kelamin" => $jenis_kelamin,
			"aktif" => $aktif,
		);
		$log = $params;
		if ($id) {
			$params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
			$simpan_db 	= $this->dbmodels->update_employee_keluarga($params, $id);
			$proses_msg = "ditambahkan";
			$tipe_log = "insert";
		} else {
			$simpan_db 	= $this->dbmodels->simpan_employee_keluarga($params);
			$proses_msg = "diubah";
			$tipe_log = "update";
		}

		if ($simpan_db == true) {
			$this->auth->simpan_log("m_keluarga", $tipe_log, $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "Keluarga berhasil $proses_msg";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "Keluarga gagal $proses_msg";
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

	public function hapus_employee_keluarga()
	{
		$success 	= 0;
		$message	= "";
		$header 	= "Gagal";
		$tipenotif 	= "error";
		if ($this->grant["delete"] == false) {
			$message	= "Anda tidak mempunyai otoritas menghapus data";
			goto out;
		}

		$id = $this->input->post("id");

		// $log = $this->dbmodels->detail_employee_keluarga($id);
		$db = $this->dbmodels->hapus_employee_keluarga($id);

		if ($db == true) {
			// $this->auth->simpan_log("m_keluarga", "delete", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "keluarga berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "keluarga gagal dihapus";
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

	public function download_excel_employee()
	{
		$spreadsheet = new Spreadsheet();
		$spreadsheet->getActiveSheet()->setTitle("employee");
		$table_columns = array("CODE", "NAMA", "NIK", "NO HP", "ALAMAT", "EMAIL", "TANGGAL LAHIR", "JENIS KELAMIN", "COMPANY", "DEPARTEMEN", "JABATAN", "SECTION", "JABATAN ATASAN", "STATUS", "AKTIF");
		$sheet = $this->createSheetTitle($spreadsheet, "employee", $table_columns);
		$data = $this->dbmodels->get_employee_list();
		// dd($data);
		$baris = 2;
		foreach ($data as $key => $value) {
			$sheet->setCellValueByColumnAndRow(1, $baris, $value->code);
			$sheet->setCellValueByColumnAndRow(2, $baris, $value->nama);
			$sheet->setCellValueByColumnAndRow(3, $baris, $value->nik == "" || $value->nik == "null" || $value->nik == null ? "" : $value->nik);
			$sheet->setCellValueByColumnAndRow(4, $baris, $value->no_hp == "" || $value->no_hp == "null" || $value->no_hp == null ? "" : $value->no_hp);
			$sheet->setCellValueByColumnAndRow(5, $baris, $value->alamat);
			$sheet->setCellValueByColumnAndRow(6, $baris, $value->email == "" || $value->email == "null" || $value->email == null ? "" : $value->email);
			$sheet->setCellValueByColumnAndRow(7, $baris, $value->tanggal_lahir);
			$sheet->setCellValueByColumnAndRow(8, $baris, $value->jenis_kelamin);
			$sheet->setCellValueByColumnAndRow(9, $baris, $value->company);
			$sheet->setCellValueByColumnAndRow(10, $baris, $value->departemen);
			$sheet->setCellValueByColumnAndRow(11, $baris, $value->jabatan);
			$sheet->setCellValueByColumnAndRow(12, $baris, $value->section);
			$sheet->setCellValueByColumnAndRow(13, $baris, $value->jabatan_atasan);
			$sheet->setCellValueByColumnAndRow(14, $baris, $value->employee_status);
			$sheet->setCellValueByColumnAndRow(15, $baris, $value->aktif == 1 ? "Aktif" : "Tidak Aktif");
			$baris++;
		}
		foreach ($sheet->getColumnIterator() as $column) {
			$sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
		}
		$writer = new Xlsx($spreadsheet);
		$filename = "data_employee.xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="' . $filename . '"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');
	}
}
