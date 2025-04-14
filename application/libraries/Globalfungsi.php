<?php
class Globalfungsi extends CI_Model {

    public function __construct(){
        parent::__construct();
    }	

    public function tgl_indonesia($tanggal){
		($tanggal=='') ? $tanggal="1990-01-01" : $tanggal = $tanggal;
		($tanggal=='0000-00-00') ? $tanggal="1990-01-01" : $tanggal = $tanggal;
		$bulan = array (
			1 =>'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);
		
		if($pecahkan[1]=='00') {
			return "-";
		} else {
			return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
		}
	}



}
?>