<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_banner($params)
    {
        return $this->db->delete("m_banner", $params) ? true : false;
    }

    public function detail_banner($params_where)
    {
        return $this->db->get_where("m_banner", $params_where);
    }

    public function update_banner($params, $params_where)
    {
        return ($this->db->update("m_banner", $params, $params_where)) ? true : false;
    }

    public function simpan_banner($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_banner', $params)) ? true : false;
    }

    public function getMaxNoUrut()
    {
        return $this->db->query("SELECT MAX(no_urut) no_urut FROM m_banner WHERE aktif = 1")->row();
    }
}
