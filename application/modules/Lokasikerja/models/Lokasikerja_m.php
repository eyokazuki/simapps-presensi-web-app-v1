<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasikerja_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_lokasi_kerja($params)
    {
        return $this->db->delete("m_lokasi_kerja", $params) ? true : false;
    }

    public function detail_lokasi_kerja($params_where)
    {
        return $this->db->get_where("m_lokasi_kerja", $params_where);
    }

    public function update_lokasi_kerja($params, $params_where)
    {
        return ($this->db->update("m_lokasi_kerja", $params, $params_where)) ? true : false;
    }

    public function simpan_lokasi_kerja($params)
    {
        //$this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_lokasi_kerja', $params)) ? true : false;
    }
    public function get_status()
    {
        return $this->db->get("m_status_kerja");
    }
}
