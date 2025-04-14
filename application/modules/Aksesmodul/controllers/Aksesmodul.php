<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksesmodul extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("aksesmodul_m", "dbmodels");
		$this->auth->authlog();
	}

	public function index()
	{
		$data["menuSideBar"]   	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$icon 					= $this->auth->getIcon();

		$optionPriv 					= "<option value=''>Pilih Privilage</option>";
		$getPriv	 					= $this->dbmodels->detail_priv(["aktif" => 1]);
		foreach ($getPriv->result() as $key) {
			$optionPriv 				.= "<option value='" . $key->id_priv . "'>" . xssOutput($key->priv) . "</option>";
		}
		$data["optionPriv"] 			= $optionPriv;

		$data 					= array_merge($data, $setting, $icon);

		$this->load->view('aksesmodul_v', $data);
	}

	public function noauth()
	{
		$data["menuSideBar"]	= $this->auth->getMenu();
		$setting 				= $this->auth->getSetting();
		$data 					= array_merge($data, $setting);
		$data["nama_menu"]		= "Access Denied";

		$this->load->view("dist/noauth", $data);
	}


	public function tabel_modul()
	{
		$priv 			= xssInput($this->input->post("priv"));
		$data 			= array();

		if ($priv != "") {
			$dataParent 	= $this->dbmodels->get_all_parent_modul($priv);
			foreach ($dataParent->result() as $parent) {
				$cek 		= $parent->status_modul == 1 ? "checked" : "";
				$cek2 		= $parent->akses_create == true ? "checked" : "";
				$cek3 		= $parent->akses_edit == true ? "checked" : "";
				$cek4 		= $parent->akses_delete == true ? "checked" : "";

				$disabled   = $parent->status_modul == 0 ? "disabled" : "";

				"<div class='form-check form-switch'>" .
					"<input class='form-check-input' type='checkbox' id='aktif' name='aktif' checked>" .
					"<label class='form-check-label'>Aktif</label>" .
					"</div>";
				$data[] 	= array(
					"no" 		=> '',
					"parent"	=> "<i class='menu-icon tf-icons ti ti-folders'></i>" . $parent->nama_menu,
					"child"		=> '',
					"action"	=> "<label class='switch'>
										<input class='switch-input' type='checkbox' $cek id='" . $priv . "_" . $parent->id_menu . "' onclick='cekthis(this.id)'>
										<span class='switch-toggle-slider'>
											<span class='switch-on'></span>
											<span class='switch-off'></span>
										</span>
									</label>",
					"create_action"	=> "<label class='switch'>
											<input class='switch-input' type='checkbox' $cek2 id='1_" . $priv . "_" . $parent->id_menu . "' onclick='cekthisupdate(this.id)' $disabled>
											<span class='switch-toggle-slider'>
												<span class='switch-on'></span>
												<span class='switch-off'></span>
											</span>
										</label>",
					"edit_action"	=> "<label class='switch'>
											<input class='switch-input' type='checkbox' $cek3 id='2_" . $priv . "_" . $parent->id_menu . "' onclick='cekthisupdate(this.id)' $disabled>
											<span class='switch-toggle-slider'>
												<span class='switch-on'></span>
												<span class='switch-off'></span>
											</span>
										</label>",
					"delete_action"	=> "<label class='switch'>
											<input class='switch-input' type='checkbox' $cek4 id='3_" . $priv . "_" . $parent->id_menu . "' onclick='cekthisupdate(this.id)' $disabled>
											<span class='switch-toggle-slider'>
												<span class='switch-on'></span>
												<span class='switch-off'></span>
											</span>
										</label>",
				);

				if ($parent->has_child == 1) {
					$dataChild 		= $this->dbmodels->get_all_child_modul($priv, $parent->id_menu);
					foreach ($dataChild->result() as $child) {
						$cek1 		= $child->status_modul == 1 ? "checked" : "";
						$cek2 		= $child->akses_create == true ? "checked" : "";
						$cek3 		= $child->akses_edit == true ? "checked" : "";
						$cek4 		= $child->akses_delete == true ? "checked" : "";

						$disabled   = $child->status_modul == 0 ? "disabled" : "";

						$data[] 	= array(
							"no" 		=> '',
							"parent"	=> "<div class='text-center'><i class='ti ti-folder'></i></div>",
							"child"		=> $child->nama_menu,
							"action"	=> "<label class='switch'>
												<input class='switch-input' type='checkbox' $cek1 id='" . $priv . "_" . $child->id_menu . "' onclick='cekthis(this.id)'>
												<span class='switch-toggle-slider'>
													<span class='switch-on'></span>
													<span class='switch-off'></span>
												</span>
											</label>",
							"create_action"	=> "<label class='switch'>
													<input class='switch-input' type='checkbox' $cek2 id='1_" . $priv . "_" . $child->id_menu . "' onclick='cekthisupdate(this.id)' $disabled>
													<span class='switch-toggle-slider'>
														<span class='switch-on'></span>
														<span class='switch-off'></span>
													</span>
												</label>",
							"edit_action"	=>  "<label class='switch'>
													<input class='switch-input' type='checkbox' $cek3 id='2_" . $priv . "_" . $child->id_menu . "' onclick='cekthisupdate(this.id)' $disabled>
													<span class='switch-toggle-slider'>
														<span class='switch-on'></span>
														<span class='switch-off'></span>
													</span>
												</label>",

							"delete_action"	=> "<label class='switch'>
													<input class='switch-input' type='checkbox' $cek4 id='3_" . $priv . "_" . $child->id_menu . "' onclick='cekthisupdate(this.id)' $disabled>
													<span class='switch-toggle-slider'>
														<span class='switch-on'></span>
														<span class='switch-off'></span>
													</span>
												</label>",
						);
					}
				}
			}
		}

		$obj 		= array(
			"data" 		=> $data
		);

		echo json_encode($obj);
	}

	public function update_akses_modul()
	{
		$id 		= xssInput($this->input->post("id"));
		$value 		= xssInput($this->input->post("value"));

		$exp 		= explode("_", $id);

		if (count($exp) > 1) {
			$priv 		= $exp[0];
			$modul 		= $exp[1];

			if ($id != "" && $value != "") {
				$update 	= $this->dbmodels->update_akses_modul($priv, $modul, $value);

				if ($update > 0) {
					$success 	= 1;
					$message	= "Aksemodul berhasil diupdate";
					$header 	= "Berhasil";
					$tipenotif 	= "success";
				} else {
					$success 	= 0;
					$message	= "Aksemodul gagal diupdate";
					$header 	= "Gagal";
					$tipenotif 	= "error";
				}
			} else {
				$success 	= 0;
				$message	= "Lengkapi semua inputan terlebih dahulu";
				$header 	= "Gagal";
				$tipenotif 	= "error";
			}
		} else {
			$success 	= 0;
			$message	= "Modul yang anda pilih salah";
			$header 	= "Gagal";
			$tipenotif 	= "error";
		}

		$output 	= array(
			"kode"		=> $success,
			"response"	=> $message,
			"header"	=> $header,
			"tipenotif"	=> $tipenotif,
		);

		echo json_encode($output);
	}

	public function update_akses()
	{
		$id 		= xssInput($this->input->post("id"));
		$value 		= xssInput($this->input->post("value"));

		$exp 		= explode("_", $id);


		if (count($exp) > 2) {
			$tipe		= $exp[0];
			$priv 		= $exp[1];
			$modul 		= $exp[2];

			if ($id != "" && $value != "" && $tipe != "") {

				$update 	= $this->dbmodels->update_akses($priv, $modul, $value, $tipe);

				if ($update > 0) {
					$success 	= 1;
					$message	= "Akses Create berhasil diupdate";
					$header 	= "Berhasil";
					$tipenotif 	= "success";
				} else {
					$success 	= 0;
					$message	= "Akses Create gagal diupdate";
					$header 	= "Gagal";
					$tipenotif 	= "error";
				}
			} else {
				$success 	= 0;
				$message	= "Modul yang anda pilih salah";
				$header 	= "Gagal";
				$tipenotif 	= "error";
			}
		} else {
			$success 	= 0;
			$message	= "Modul yang anda pilih salah";
			$header 	= "Gagal";
			$tipenotif 	= "error";
		}

		$output 	= array(
			"kode"		=> $success,
			"response"	=> $message,
			"header"	=> $header,
			"tipenotif"	=> $tipenotif,
		);

		echo json_encode($output);
	}
}
