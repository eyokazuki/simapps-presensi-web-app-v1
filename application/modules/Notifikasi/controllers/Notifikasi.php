<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{
	private $grant;
	private $ses;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('notifikasi_m', 'dbmodels');
		$this->auth->authlog();
		$this->load->helper('text');
        $this->load->helper(array('form', 'url'));
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

		$this->load->view('Notifikasi_v', $data);
	}

	public function alarm_index()
	{
		$dataUser = $this->dbmodels->getUser($this->ses["s_id_user"]);
		$data["menuSideBar"]   	= $this->auth->getMenu();
		$data["create_akses"]	= $this->grant["create"];
		$data["dataUser"] 		= $dataUser;
		$setting 				= $this->auth->getSetting();
		$icon 					= $this->auth->getIcon();
		$data 					= array_merge($data, $setting, $icon);

		$this->load->view('Alarm_v', $data);
	}

	public function tabel_notifikasi()
	{
		$table 		= 'notification_schedule';

		// Table's primary key
		$primaryKey = 'id';

		$columns = array(
			array(
				'db' 		=> 'id',
				'dt'  		=> 0,
				'field' 	=> 'id',
				'formatter'	=> function ($d, $row) {
					return "";
				}
			),
			array(
				'db' 		=> 'time_notif',
				'dt' 		=> 2,
				'field' 	=> 'time_notif',
				'formatter' => function ($d, $row) {
					$time = date('H:i', strtotime($d));
					return $time.' WIB';
					// return xssOutput($d);
				}
			),
			array(
				'db' 		=> 'with_alarm',
				'dt' 		=> 3,
				'field' 	=> 'with_alarm',
				'formatter' => function ($d, $row) {
					$data = $d == 1 ? 'Aktif' : 'Tidak Aktif';
					return $data;
					// return xssOutput($d);
				}
			),
			array(
				'db'        => 'id',
				'dt'        => 1,
				'field'		=> 'id',
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
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='detail_notifikasi(\"" . $id . "\")'><i class='ti ti-pencil'></i> Edit Jadwal Notifikasi</a></li>";
					}

					if ($this->grant["delete"]) {
						$button 	.= "<li><a class='dropdown-item' href='#' onclick='hapus(\"" . $id . "\")'><i class='ti ti-trash'></i>  Hapus Jadwal Notifikasi</a></li>";
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

	public function simpan_notifikasi()
	{
		ini_set('max_execution_time', '0');
		$id 		= $this->encryption->decrypt($this->input->post("id"));
		$tipe 		= xssInput($this->input->post("tipe"));
		$timeNotif 	= xssInput($this->input->post("time"));
		$alarm 		= xssInput($this->input->post("alarm"));

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

		$alarm = $alarm !== "" ? 1 : 0;

		if ($tipe == 1) {
			$params 	= array(
				"time_notif"	=> $timeNotif,
				"with_alarm"	=> $alarm
			);

			$simpan_db 	= $this->dbmodels->simpan_notifikasi($params);
			$proses_msg 	= "ditambahkan";
			$log = $params;
			$tipe_log = "insert";
			
			// if($this->upload->do_upload("file_location")){
			// } else {
			// 	$proses_msg 	= "ditambahkan";
			// 	$simpan_db = false;
			// }
		} else if ($tipe == 2) {
			$params 	= array(
				"time_notif"	=> $timeNotif,
				"with_alarm"	=> $alarm
			);

			// $params = array_merge($params, ["updated_at"	=> date("Y-m-d H:i:s")]);
			$params_where = array(
				"id" 	=> $id
			);
			$log = $this->dbmodels->detail_notifikasi($params_where)->row();
			$simpan_db 	= $this->dbmodels->update_notifikasi($params, $params_where);
			$proses_msg 	= "diubah";
			$tipe_log = "update";
		}

		if ($simpan_db == true) {
			$this->auth->simpan_log("notification_schedule", $tipe_log, $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "notifikasi berhasil $proses_msg";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "notifikasi gagal $proses_msg";
		}


		out:
		$output 	= array(
			"kode"		=> $success,
			"response"	=> $message,
			"header"	=> $header,
			"tipenotif"	=> $tipenotif
		);

		echo json_encode($output);
	}

	public function detail_notifikasi()
	{
		$id 		=  $this->encryption->decrypt($this->input->post("id"));
		$params 	= array(
			"id" 	=> $id
		);
		$detail = $this->dbmodels->detail_notifikasi($params);
		$obj 		= array();

		if ($detail->num_rows() > 0) {
			$detail 	= $detail->row();

			$obj 			= array(
				"time_notif"		=> $detail->time_notif,
				"with_alarm"		=> $detail->with_alarm
			);
		}


		echo json_encode($obj);
	}

	public function hapus_notifikasi()
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
			"id" 	=> $id
		);

		$log = $this->dbmodels->detail_notifikasi($params_where)->row();
		$db 		= $this->dbmodels->hapus_notifikasi($params_where);

		if ($db == true) {
			$this->auth->simpan_log("notification_schedule", "delete", $this->ses["s_id_user"], json_encode($log));

			$success 	= 1;
			$message	= "notifikasi berhasil dihapus";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$message	= "notifikasi gagal dihapus";
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

	public function kirim_notifikasi()
    {
		$tipe 		= xssInput($this->input->post("tipe"));
		
		$fileAlarm = base_url('assets/audio/alarm.mp3');
		if ($tipe == 'custom') {
			$title 		= xssInput($this->input->post("title"));
			$msg 		= xssInput($this->input->post("msg"));
			$alarm 		= xssInput($this->input->post("alarm"));
			$withAlarm 	= $alarm !== "" ? 'true' : 'false';
		} else {
			$msg 		= "Apakah anda sudah absen hari ini";
			$title	 	= "Simenggaris";
			$withAlarm 	= 'true';
			$tipe		= "absensi ad hock";
		}

		$url = "https://fcm.googleapis.com/fcm/send";
			// $token = "key=AAAAg7Z1Tr8:APA91bGtHKJ1vh2co8s62D8q5bDq_cVzjRC5vbAKom-6L-blJbeUx0BmoyRMoLXTSEE-K-zAgmmf_Fv1xCvdt-oUPoJ1EJoq0r71qQ4aB1WNKUGRRnIHxuiE-IMW9OzsdbtE4g9t6_4q";
			$token = "key=AAAA6NoC6Qo:APA91bEylpVJgeuxpBej1qyglcB6I2mDEXAQscFBPNfhrLwUL71bHQySaeQMjcxy4jIJiQOO8xoXHgGEcuS2CXOW7NwMEmQkekrRYEj26EUDJjoAo-4J1XVplxD1iW-cw-J0Gk6SUpk3";

			$result = [];
			$ch     = curl_init($url);
			$data = '{
						"to" : "/topics/absen",
						"priority": "high",
						"notification" : {
							"body" : "'.$msg.'",
							"title": "'.$title.'",
							"image": "https://www.ruangenergi.com/wp-content/uploads/2020/10/IMG-20201003-WA0024.jpg",
							"icon": "notification       _icon"
						},
						"data" : {
							"with_alarm" : '.$withAlarm.',
							"type" : "'.$tipe.'",
							"alarm" : "'.$fileAlarm.'"
						}
					}';

			$headers = array(
				'Authorization: ' . $token,
				'Content-Type: application/json'
			);

			/* pass encoded JSON string to the POST fields */
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			/* pass encoded JSON string to the Header fields */
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			/* curl connection timeout */
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
			/* set return type json */
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			/*SSL Verifier*/
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			/* execute request */
			$response = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if ($httpCode == 200) {
				$response = json_decode($response);
				$result  = [
					"status"    => $httpCode,
					"response"  => $response
				];
			} else {
				$response = json_decode($response);
				$result  = [
					"status"    => false,
					"code"      => $httpCode,
					"response"  => $response
				];
			}

			curl_close($ch);

			$response = [
				"status" => 200,
				"message"   => "OK",
				"response"    => true,
				"result" => $response
			];

			echo json_encode($response);
    }

	public function simpan_alarm()
	{
		ini_set('max_execution_time', '0');
		// $file 		= xssInput($this->input->post("file"));

		$config['upload_path']=FCPATH."/assets/audio";
		$config['allowed_types']='mp3';
		$config['file_name'] = 'alarm.mp3';
		$config['overwrite'] = true;

		$this->load->library('upload',$config);

		if ($this->upload->do_upload("file")) {
			$success 	= 1;
			$message	= "alarm berhasil diubah";
			$header 	= "Berhasil";
			$tipenotif 	= "success";
		} else {
			$success 	= 0;
			$message	= $this->upload->display_errors();;
			$header 	= "Gagal";
			$tipenotif 	= "error";
		}

		// $data = array('upload_data' => $this->upload->data());
		// $filenya= $data['upload_data']['file_name']; 

		out:
		$output 	= array(
			"kode"		=> $success,
			"response"	=> $message,
			"header"	=> $header,
			"tipenotif"	=> $tipenotif
		);

		echo json_encode($output);
	}

}
