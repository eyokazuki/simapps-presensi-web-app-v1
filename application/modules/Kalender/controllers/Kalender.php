<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kalender extends CI_Controller
{
	private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("kalender_m", "dbmodels");
		$this->auth->authlog();
		$this->load->helper('text');
        $this->load->helper(array('form', 'url'));
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

		$this->load->view('kalender_v', $data);
	}

	public function noauth()
	{
		$data["menuSideBar"]	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$data 					= array_merge($data, $setting);
		$data["nama_menu"]		= "Access Denied";

		$this->load->view("partials/noauth", $data);
	}

	public function tabel_kalender()
	{
		$table 		= 'm_agenda';

		// Table's primary key
		$primaryKey = 'id_agenda';

		$columns = array(
			array(
				'db' 		=> 'id_agenda',
				'dt'  		=> 0,
				'field' 	=> 'id_agenda',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'judul_agenda',
				'dt' 		=> 2,
				'field' 	=> 'judul_agenda',
				'formatter' => function ($d, $row) {
					return $d;
				}
			),
			array(
				'db' 		=> 'isi_agenda',
				'dt' 		=> 3,
				'field' 	=> 'isi_agenda',
				'formatter' => function ($d, $row) {
					return $d;
				}
			),
			array(
				'db' 		=> 'file_location',
				'dt' 		=> 4,
				'field' 	=> 'file_location',
				'formatter' => function ($d, $row) {
					$gambar = "<img class='category-icon' width='150' id='$d' 
					src='".base_url("assets/images/agenda/".$d."")."'>";
					return $gambar;
				}
			),
			array(
				'db' 		=> 'aktif',
				'dt' 		=> 5,
				'field' 	=> 'aktif',
				'formatter' => function ($d, $row) {
					$cek1 		= 	$d == 1 ? "checked" : "";
					$tombol		= 	"<label class='switch'>
										<input class='switch-input' type='checkbox' $cek1 id='" . $row[0] . "' onclick='cekthis(this.id)'>
										<span class='switch-toggle-slider'>
											<span class='switch-on'></span>
											<span class='switch-off'></span>
										</span>
									</label>";
					return $tombol;
				}
			),
			array(
				'db'        => 'id_agenda',
				'dt'        => 1,
				'field'		=> 'id_agenda',
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
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_fkalender(\"" . $id . "\")'><i class='ti ti-lock'></i> Edit File Kalender</a></li>";
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_kalender(\"" . $id . "\")'><i class='ti ti-pencil'></i> Edit Isi Kalender</a></li>";
					}

					if ($this->grant["delete"]) {
						//$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Hapus kalender</a></li>";
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

	public function hapus_kalender()
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
			"id_agenda" 	=> $id
		);

		$log = $this->dbmodels->detail_kalender($params_where)->row();
		$db 		= $this->dbmodels->hapus_kalender($params_where);

		if ($db == true) {
			$this->auth->simpan_log("m_agenda", "delete", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "kalender berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "kalender gagal dihapus";
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

	public function update_aktif()
	{
		$id 		=  $this->input->post("id");
		$value 		=  $this->input->post("value");
		$params 	= array(
			"aktif"		=> $value
		);
		$params_where 	= array(
			"id_agenda" 	=> $id
		);
		$simpan = $this->dbmodels->update_kalender($params, $params_where);		

			$obj 			= array(
				"id_agenda" 	=> $id,
				"aktif" 		=> $value,
				"status"		=> $simpan
			);


		echo json_encode($obj);
	}

	public function simpan_kalender()
	{
		$id 		= $this->encryption->decrypt($this->input->post("id"));
		$tipe 		= xssInput($this->input->post("tipe"));
		$aktif 		= xssInput($this->input->post("aktif"));
		$judul 		= xssInput($this->input->post("judul"));
		$isi 		= xssInput($this->input->post("isi"));

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

			$aktif = $aktif !== "" ? 1 : 0;

			

			$config['upload_path']="assets/images/agenda";
			$config['allowed_types']='jpg|png|gif';
        	$config['encrypt_name'] = TRUE;
			$this->load->library('upload',$config);

			if ($tipe == 1) {
				if($this->upload->do_upload("file_location")){
					$data = array('upload_data' => $this->upload->data());
					$filenya= $data['upload_data']['file_name']; 
					$params 	= array(
						"judul_agenda"	=> $judul,
						"isi_agenda"	=> $isi,
						"file_location"	=> $filenya,
						"aktif"		=> $aktif
					);
					$simpan_db 	= $this->dbmodels->simpan_kalender($params);
					$proses_msg 	= "ditambahkan";
					$log = $params;
					$tipe_log = "insert";
				} else {
					$proses_msg 	= "ditambahkan";
					$simpan_db = false;
				}
			} else if ($tipe == 2) {
				$params 	= array(
					//"judul_agenda"	=> $judul,
					"isi_agenda"	=> $isi,
					"aktif"		=> $aktif
				);
				$params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
				$params_where = array(
					"id_agenda" 	=> $id
				);
				$log = $this->dbmodels->detail_kalender($params_where)->row();
				$simpan_db 	= $this->dbmodels->update_kalender($params, $params_where);
				$proses_msg 	= "diubah";
				$tipe_log = "update";
			} else if ($tipe == 3) {
				if($this->upload->do_upload("file_location")){
					$data = array('upload_data' => $this->upload->data());
					$filenya= $data['upload_data']['file_name']; 
					$params 	= array(
						"file_location"	=> $filenya,
						"updated_at" => date("Y-m-d H:i:s")
					);
					$params_where = array(
						"id_agenda" 	=> $id
					);
					$simpan_db 	= $this->dbmodels->update_kalender($params, $params_where);
					$proses_msg 	= "ditambahkan";
					$log = $this->dbmodels->detail_kalender($params_where)->row();
					$tipe_log = "update";
				} else {
					$proses_msg 	= "diubah";
					$simpan_db = false;
				}
			}

			if ($simpan_db == true) {
				$this->auth->simpan_log("m_agenda", $tipe_log, $this->ses["s_id_user"], json_encode($log));

				$success 	= 1;
				$message	= "kalender berhasil $proses_msg";
				$header 	= "Berhasil";
				$tipenotif 	= "success";
			} else {
				$message	= "kalender gagal $proses_msg";
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



	public function check_id()
	{
		$id =  $this->encryption->decrypt($this->input->post("id"));

		$count = $this->dbmodels->detail_kalender(["id_agenda" => $id])->num_rows();
		if ($count > 0) {
			return true;
		} else {
			$this->form_validation->set_message("check_id", "Data kalender invalid");
			return false;
		}
	}

	public function detail_kalender()
	{
		$id 		=  $this->encryption->decrypt($this->input->post("id"));
		$params 	= array(
			"id_agenda" 	=> $id
		);
		$detail = $this->dbmodels->detail_kalender($params);
		$obj 		= array();



		if ($detail->num_rows() > 0) {
			$detail 	= $detail->row();

			$obj 			= array(
				"judul"		=> $detail->judul_agenda,
				"isi"		=> $detail->isi_agenda,
				"aktif" 	=> $detail->aktif
			);
		}


		echo json_encode($obj);
	}
}
