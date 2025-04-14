<?php

	function csrf_name(){
		$ci =& get_instance();
		$data 	= $ci->security->get_csrf_token_name();
		return $data;
	}

	function csrf_token(){
		$ci =& get_instance();
		$data 	= $ci->security->get_csrf_hash();
		return $data;
	}
?>