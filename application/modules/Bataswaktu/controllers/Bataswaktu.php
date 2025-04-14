<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bataswaktu extends CI_Controller
{
	private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model("bataswaktu_m", "dbmodels");
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
		$data2["batas_waktu"]	= $this->dbmodels->detail()->result()[0];
		$data 					= array_merge($data, $setting, $icon, $data2);

		$this->load->view('bataswaktu_v', $data);
	}

	public function simpan()
	{
		$id = $this->input->post("id");
		$jam = $this->input->post("jam");
		$this->dbmodels->simpan($id, $jam);
		return redirect()->to("https://job-simenggaris.com/bataswaktu");
	}
}
