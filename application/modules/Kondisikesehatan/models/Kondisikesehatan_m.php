<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisikesehatan_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_kondisikesehatan($params)
    {
        return $this->db->delete("m_kondisi_kesehatan", $params) ? true : false;
    }

    public function detail_kondisikesehatan($params_where)
    {
        return $this->db->get_where("m_kondisi_kesehatan", $params_where);
    }

    public function update_kondisikesehatan($params, $params_where)
    {
        return ($this->db->update("m_kondisi_kesehatan", $params, $params_where)) ? true : false;
    }

    public function simpan_kondisikesehatan($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_kondisi_kesehatan', $params)) ? true : false;
    }
}
