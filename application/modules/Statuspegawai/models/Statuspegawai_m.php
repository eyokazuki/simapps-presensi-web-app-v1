<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Statuspegawai_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_employee_status($params)
    {
        return $this->db->delete("m_employee_status", $params) ? true : false;
    }

    public function detail_employee_status($params_where)
    {
        return $this->db->get_where("m_employee_status", $params_where);
    }

    public function update_employee_status($params, $params_where)
    {
        return ($this->db->update("m_employee_status", $params, $params_where)) ? true : false;
    }

    public function simpan_employee_status($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_employee_status', $params)) ? true : false;
    }

    public function get_combo($tabel, $params_where)
    {
        return $this->db->get_where($tabel, $params_where);
    }

}
