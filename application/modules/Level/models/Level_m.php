<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Level_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_level($params)
    {
        return $this->db->delete("m_level", $params) ? true : false;
    }

    public function detail_level($params_where)
    {
        return $this->db->get_where("m_level", $params_where);
    }

    public function update_level($params, $params_where)
    {
        return ($this->db->update("m_level", $params, $params_where)) ? true : false;
    }

    public function simpan_level($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_level', $params)) ? true : false;
    }
}
