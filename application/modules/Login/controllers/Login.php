<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("login_m", "dbmodels");
		$this->auth->authlog();

		$modul  	= $this->config->item("modul_application");
		$this->ses 		= $this->session->userdata($modul);
	}

	public function index()
	{
		$data 	= $this->auth->getTitle();
		$this->load->view('login_v', $data);
	}

	public function action()
	{
		$status = $this->recaptcha_response();
		if (true) {
			// if ($status['success']) {
			$user 		= xssInput($this->input->post("username"));
			$pass 		= xssInput($this->input->post("password"));
			$modul 		= $this->config->item("modul_application");

			$rules  = $this->rules_login();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() != false) {
				$get_user 	= $this->dbmodels->get_user($user);

				if ($get_user->num_rows() > 0) {
					$data_user 	= $get_user->row();

					if (password_verify($pass, $data_user->password)) {
						// if($pass == $data_user->password){
						$session_user 	= array(
							"s_id_user" 	=> $data_user->id_user,
							"s_username" 	=> $data_user->username,
							"s_password" 	=> $data_user->password,
							"s_id_priv" 	=> $data_user->id_priv,
							"s_nama"		=> $data_user->nama,
							// "s_kode"		=> $data_user->key,
							"s_priv"	=> $data_user->priv,
						);

						$this->session->set_userdata($modul, $session_user);
						redirect(base_url() . "dashboard");
					} else {
						$this->session->set_flashdata("message", "Password Anda Salah");
						redirect(base_url() . "login");
					}
				} else {
					$this->session->set_flashdata("message", "Username Anda Salah");
					redirect(base_url() . "login");
				}
			} else {
				$this->session->set_flashdata("message", validation_errors());
				redirect(base_url() . "login");
			}
		} else {
			$this->session->set_flashdata("message", "Google Recaptcha Gagal");
			redirect(base_url() . "login");
		}
	}

	public function logout()
	{
		$modul  = $this->config->item("modul_application");
		// $ses 	= $this->session->userdata($modul);

		$this->session->unset_userdata($modul);
		redirect(base_url() . "login");
	}

	public function change_pass()
	{
		$modul  	= $this->config->item("modul_application");
		// $ses 		= $this->session->userdata($modul);
		$pass  		= $this->ses["s_password"];
		$id_user 	= $this->ses["s_id_user"];

		$old_pass 	= xssInput($this->input->post("a_old_pass"));
		$new_pass 	= xssInput($this->input->post("a_new_pass"));
		$konf_new_pass 	= xssInput($this->input->post("a_konf_pass"));

		$rules  = $this->rules_change_password();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() != false) {
			if (password_verify($old_pass, $pass)) {
				// if($old_pass == $pass){
				if ($new_pass == $konf_new_pass) {

					$new_pass 	= password_hash($new_pass, PASSWORD_DEFAULT);

					$session_user 	= array(
						"s_id_user" 	=> $this->ses["s_id_user"],
						"s_username" 	=> $this->ses["s_username"],
						"s_password" 	=> $new_pass,
						"s_id_priv" 	=> $this->ses["s_id_priv"],
						"s_nama"		=> $this->ses["s_nama"],
						"s_kode"		=> $this->ses["s_kode"],
					);

					$params 	= array(
						"password" 		=> $new_pass,
						"updated_at"	=> date("Y-m-d H:i:s")
					);

					$params_where 		= array(
						"id_user"		=> $id_user
					);

					$log = $this->dbmodels->detail_user($params_where)->row();
					$change 		= $this->dbmodels->change_pass($params, $params_where);

					if ($change == true) {
						$this->session->unset_userdata($modul);
						$this->session->set_userdata($modul, $session_user);

						$this->auth->simpan_log("m_user", "update password", $this->ses["s_id_user"], json_encode($log));

						$success 	= 1;
						$message	= "Password berhasil dirubah";
						$header 	= "Berhasil";
						$tipenotif 	= "success";
					} else {
						$success 	= 0;
						$message	= "Password gagal dirubah";
						$header 	= "Gagal";
						$tipenotif 	= "error";
					}
				} else {
					$success 	= 0;
					$message	= "Password Baru dan Konfirmasi tidak sama";
					$header 	= "Gagal";
					$tipenotif 	= "error";
				}
			} else {
				$success 	= 0;
				$message	= "Password lama salah";
				$header 	= "Gagal";
				$tipenotif 	= "error";
			}
		} else {
			$success 	= 0;
			$message	= strip_tags(validation_errors());
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

	private function rules_login()
	{
		$rules =  [
			[
				"field"     => "username",
				"label"     => "Username",
				"rules"     => "trim|required",
				"errors"    => [
					"required"  => "Username harus diisi",
				]
			],
			[
				"field"     => "password",
				"label"     => "Password",
				"rules"     => "trim|required",
				"errors"    => [
					"required"  => "Password harus diisi",
				]
			],
		];

		return $rules;
	}

	private function rules_change_password()
	{
		$rules =  [
			[
				"field"     => "a_old_pass",
				"label"     => "Password Lama",
				"rules"     => "trim|required",
				"errors"    => [
					"required"  => "Password lama harus diisi",
				]
			],
			[
				"field"     => "a_new_pass",
				"label"     => "Password Baru",
				"rules"     => "trim|required",
				"errors"    => [
					"required"  => "Password baru harus diisi",
				]
			],
			[
				"field"     => "a_konf_pass",
				"label"     => "Konfirmasi Password",
				"rules"     => "trim|required",
				"errors"    => [
					"required"  => "Konfirmasi password harus diisi",
				]
			],
		];

		return $rules;
	}

	private function recaptcha_response()
	{
		$recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

		$userIp = $this->input->ip_address();

		$secret = $this->config->item('google_secret');

		$url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);

		return json_decode($output, true);
	}
}
