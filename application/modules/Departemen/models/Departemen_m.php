<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departemen_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_departemen($params)
    {
        return $this->db->delete("m_departemen", $params) ? true : false;
    }

    public function detail_departemen($params_where)
    {
        return $this->db->get_where("m_departemen", $params_where);
    }

    public function update_departemen($params, $params_where)
    {
        return ($this->db->update("m_departemen", $params, $params_where)) ? true : false;
    }

    public function simpan_departemen($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_departemen', $params)) ? true : false;
    }

    public function get_combo($tabel, $params_where)
    {
        return $this->db->get_where($tabel, $params_where);
    }

}
