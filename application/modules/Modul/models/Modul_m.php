<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modul_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_modul($params)
    {
        return ($this->db->delete("m_menu", $params)) ? true : false;
    }

    public function detail_modul($params_where)
    {
        return $this->db->get_where("m_menu", $params_where);
    }

    public function update_modul($params, $params_where)
    {
        return ($this->db->update("m_menu", $params, $params_where)) ? true : false;
    }

    public function simpan_modul($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert("m_menu", $params)) ? true : false;
    }

    public function get_parent($params)
    {
        return $this->db->get_where("m_menu", $params);
    }
}
