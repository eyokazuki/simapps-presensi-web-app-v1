<?php
date_default_timezone_set('Asia/Jakarta');

function xssInput($input)
{
	return htmlspecialchars($input, ENT_QUOTES);
}

function xssOutput($output)
{
	// return htmlentities($output, ENT_QUOTES, 'UTF-8');
	return htmlspecialchars_decode($output, ENT_QUOTES);
}

function convertDate($date)
{
	$toDate = DateTime::createFromFormat('d-m-Y', $date);
	return $toDate->format("Y-m-d");
}

function convertDateDbtoIn($date)
{
	$toDate = DateTime::createFromFormat('Y-m-d', $date);
	return $toDate->format("d-m-Y");
}

function convertNumberWhatsapp($number)
{
	$formatWA = preg_replace('/\D/', '', $number);

	$formatWA = (strpos($formatWA, "0") === 0) ? '62' . substr($formatWA, 1) : $formatWA;

	return $formatWA;
}

function getDateDiff($send_date)
{
	$now = strtotime(date("Y-m-d"));
	$send_date = strtotime($send_date);
	$datediff = $now - $send_date;

	return round($datediff / (60 * 60 * 24));
}

function server_io_socket()
{
	// return "http://192.168.104.39:8001/"; //MRZ
	// return "http://192.168.1.121:8001/"; //MRZ Wifi
	// return "http://localhost:8001/";
	return "https://tiket.gresikkab.go.id/";
}

function server_io_socket_key()
{
	// return "http://192.168.104.39:8001/"; //MRZ
	// return "http://192.168.1.121:8001/"; //MRZ Wifi
	return "localhost";
}

function path_upload()
{
	return "assets/img/wapi/";
}

function bulanIndonesia()
{
	$bulan 	= array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");

	return $bulan;
}

function bulanRomawi()
{
	$bulan 	= ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];

	return $bulan;
}

function get_bulan($m)
{
	$bulan 	= array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
	$month 	= $m;
	for ($i = 0; $i < count($bulan); $i++) {
		if ((intval($m) - 1) == $i) {
			$month 	= $bulan[$i];
		}
	}
	return $month;
}

function optionTahun($range)
{
	$optionTahun 	= "";
	$tahun = date("Y");

	for ($i = ($tahun - $range); $i <= ($tahun + $range); $i++) {
		$sel = $i == $tahun ? "selected" : "";
		$optionTahun 	.= "<option value='$i' $sel>$i</option>";
	}

	return $optionTahun;
}

function optionBulan()
{
	$optionBulan 	= "";
	$bulan 	= date("m");
	$bulans = bulanIndonesia();
	for ($i = 1; $i <= count($bulans); $i++) {
		$sel = $i == ($bulan) ? "selected" : "";
		$optionBulan 	.= "<option value='$i' $sel>" . $bulans[$i - 1] . "</option>";
	}

	return $optionBulan;
}

function tanggal_indonesia($date)
{
	$d 		= intval(date("d", strtotime($date)));
	$month 	= intval(date("m", strtotime($date)));
	$m 		= get_bulan($month);
	$y 		= date("Y", strtotime($date));
	return $d . " " . $m . " " . $y;
}

function bulan_indonesia($month)
{
	$bulans 	= bulanIndonesia();
	return $bulans[($month - 1)];
}

function jumlah_digit_no_seri()
{
	return -8;
}

function format_no_seri_kupon($bagian, $tahun, $bulan, $nomor)
{
	if ($nomor != null) {
		return substr("00" . $bagian, -3) . substr($tahun, -2) . substr("00" . $bulan, -2) . substr("00000000" . $nomor, jumlah_digit_no_seri());
	} else {
		return substr("00" . $bagian, -3) . substr($tahun, -2) . substr("00" . $bulan, -2);
	}
}

function format_kode_barcode($i)
{
	return strtotime(date("Y-m-d H:i:s")) . substr("0000" . $i, -5);
}

function format_link_qrcode($kode)
{
	return base_url("cek_kupon/data_kupon/") . $kode . substr(strtotime(date("Y-m-d H:i:s")), -3);
}

function format_link_qrcode_senpi($url, $kode)
{
	// 	return base_url($url) . $kode . substr(strtotime(date("Y-m-d H:i:s")), -3);
	return "http://qr.baglogresgresik.com/s/" . $kode . substr(strtotime(date("Y-m-d H:i:s")), -3);
}

function format_image_qrcode($kode)
{
	return $kode . ".png";
}

function konfigurasi_ci_qrcode()
{
	$config['cacheable']    = true; //boolean, the default is true
	$config['cachedir']     = 'assets/qrcode/cache/'; //string, the default is application/cache/
	$config['errorlog']     = 'assets/qrcode/error'; //string, the default is application/logs/
	$config['imagedir']     = 'assets/qrcode/images/'; //direktori penyimpanan qr code
	$config['quality']      = true; //boolean, the default is true
	$config['size']         = '1024'; //interger, the default is 1024
	$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
	$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)

	return $config;
}

function format_param_qrcode($data_qrcode, $image_name)
{
	$config 			= konfigurasi_ci_qrcode();
	$params['data'] 	= $data_qrcode; //data yang akan di jadikan QR CODE
	$params['level'] 	= 'H'; //H=High
	$params['size'] 	= 10;
	$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/

	return $params;
}

function hari_indonesia($i)
{
	$days 	= ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
	return $days[($i - 1)];
}

function bulan_romawi($i)
{
	$bulans = bulanRomawi();
	return $bulans[($i - 1)];
}

function triwulan($i)
{
	$triwulans = ["I", "I", "I", "II", "II", "II", "III", "III", "III", "IV", "IV", "IV"];
	return $triwulans[($i - 1)];
}

function convertRomawi($i)
{
	$romawi = ["I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII"];
	return $romawi[$i];
}

function terbilang($nilai)
{
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " " . $huruf[$nilai];
	} else if ($nilai < 20) {
		$temp = terbilang($nilai - 10) . " belas";
	} else if ($nilai < 100) {
		$temp = terbilang($nilai / 10) . " puluh" . terbilang($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . terbilang($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = terbilang($nilai / 100) . " ratus" . terbilang($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . terbilang($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = terbilang($nilai / 1000) . " ribu" . terbilang($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = terbilang($nilai / 1000000) . " juta" . terbilang($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = terbilang($nilai / 1000000000) . " milyar" . terbilang(fmod($nilai, 1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = terbilang($nilai / 1000000000000) . " trilyun" . terbilang(fmod($nilai, 1000000000000));
	}
	return $temp;
}

function dd($data)
{
	var_dump($data);
	exit();
}
