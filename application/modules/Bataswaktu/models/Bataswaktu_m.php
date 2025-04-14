<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bataswaktu_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_banner($params)
    {
        return $this->db->delete("m_config", $params) ? true : false;
    }

    public function detail()
    {
        return $this->db->get_where("m_config", ["key"=>"batas_absen"]);
    }

    public function simpan($id, $jam)
    {
        $this->db->set('jam', $jam, FALSE);
        $this->db->where('id', $id);
        $this->db->update('m_config');
    }
}
