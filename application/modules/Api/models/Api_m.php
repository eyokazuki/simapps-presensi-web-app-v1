<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_setting_api($device)
    {
        return $this->db->get_where("m_setting_api", ["device" => $device]);
    }
}
