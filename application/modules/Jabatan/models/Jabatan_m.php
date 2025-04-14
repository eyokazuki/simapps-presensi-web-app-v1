<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_jabatan($params)
    {
        return $this->db->delete("m_jabatan", $params) ? true : false;
    }

    public function detail_jabatan($params_where)
    {
        return $this->db->get_where("m_jabatan", $params_where);
    }

    public function update_jabatan($params, $params_where)
    {
        return ($this->db->update("m_jabatan", $params, $params_where)) ? true : false;
    }

    public function simpan_jabatan($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_jabatan', $params)) ? true : false;
    }
}
