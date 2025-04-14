<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_company($params)
    {
        return $this->db->delete("m_company", $params) ? true : false;
    }

    public function detail_company($params_where)
    {
        return $this->db->get_where("m_company", $params_where);
    }

    public function update_company($params, $params_where)
    {
        return ($this->db->update("m_company", $params, $params_where)) ? true : false;
    }

    public function simpan_company($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_company', $params)) ? true : false;
    }
}
