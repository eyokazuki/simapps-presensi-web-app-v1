<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statuskeluarga_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_status_keluarga($params)
    {
        return $this->db->delete("m_status_keluarga", $params) ? true : false;
    }

    public function detail_status_keluarga($params_where)
    {
        return $this->db->get_where("m_status_keluarga", $params_where);
    }

    public function update_status_keluarga($params, $params_where)
    {
        return ($this->db->update("m_status_keluarga", $params, $params_where)) ? true : false;
    }

    public function simpan_status_keluarga($params)
    {
        // $this->db->select_max('id_status_keluarga');
        // $query = $this->db->get('m_status_keluarga');
        // $queryR = $query->row();
        // $id_status_keluarga = $queryR->id_status_keluarga+1;
        // $this->db->set('id_status_keluarga', $id_status_keluarga, FALSE);
        return ($this->db->insert('m_status_keluarga', $params)) ? true : false;
    }
}
