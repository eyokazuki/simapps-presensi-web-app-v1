<?php

function db_ssp()
{
	$ci = &get_instance();
	$ci->load->database();
	$sql_details = array(
		'user' => $ci->db->username,
		'pass' => $ci->db->password,
		'db'   => $ci->db->database,
		'host' => $ci->db->hostname,
	);

	return $sql_details;
}

function db_ssp_2()
{
	$ci2 = &get_instance();
	$ci2->load->database("pppke", true);
	$sql_details = array(
		'user' => $ci2->db->username,
		'pass' => $ci2->db->password,
		'db'   => "db_dtks_p3ke",
		// 'db'   => $ci2->db->database,
		'host' => $ci2->db->hostname,
	);

	return $sql_details;
}
