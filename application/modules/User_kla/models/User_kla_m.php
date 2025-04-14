<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_kla_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_user($params)
    {
        return $this->db->delete("m_user", $params) ? true : false;
    }

    public function detail_user($params_where)
    {
        return $this->db->get_where("m_user", $params_where);
    }

    public function detail_priv($params_where)
    {
        return $this->db->get_where("m_priv", $params_where);
    }

    public function update_user($params, $params_where)
    {
        return ($this->db->update("m_user", $params, $params_where)) ? true : false;
    }

    public function simpan_user($params)
    {
        return ($this->db->insert('m_user', $params)) ? true : false;
    }
}
