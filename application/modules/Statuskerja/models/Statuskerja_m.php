<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statuskerja_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_status_kerja($params)
    {
        return $this->db->delete("m_status_kerja", $params) ? true : false;
    }

    public function detail_status_kerja($params_where)
    {
        return $this->db->get_where("m_status_kerja", $params_where);
    }

    public function update_status_kerja($params, $params_where)
    {
        return ($this->db->update("m_status_kerja", $params, $params_where)) ? true : false;
    }

    public function simpan_status_kerja($params)
    {
        //$this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_status_kerja', $params)) ? true : false;
    }
}
