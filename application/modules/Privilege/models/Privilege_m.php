<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Privilege_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_privilege($params_where)
    {
        return ($this->db->delete("m_priv", $params_where)) ? true : false;
    }

    public function detail_privilege($params_where)
    {
        return $this->db->get_where("m_priv", $params_where);
    }

    public function update_privilege($params, $params_where)
    {
        return ($this->db->update("m_priv", $params, $params_where)) ? true : false;
    }

    public function simpan_privilege($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert("m_priv", $params)) ? true : false;
    }
}
