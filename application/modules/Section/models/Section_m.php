<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Section_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_section($params)
    {
        return $this->db->delete("m_section", $params) ? true : false;
    }

    public function detail_section($params_where)
    {
        return $this->db->get_where("m_section", $params_where);
    }

    public function update_section($params, $params_where)
    {
        return ($this->db->update("m_section", $params, $params_where)) ? true : false;
    }

    public function simpan_section($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_section', $params)) ? true : false;
    }
}
