<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipevaksin_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_tipe_vaksin($params)
    {
        return $this->db->delete("m_tipe_vaksin", $params) ? true : false;
    }

    public function detail_tipe_vaksin($params_where)
    {
        return $this->db->get_where("m_tipe_vaksin", $params_where);
    }

    public function update_tipe_vaksin($params, $params_where)
    {
        return ($this->db->update("m_tipe_vaksin", $params, $params_where)) ? true : false;
    }

    public function simpan_tipe_vaksin($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_tipe_vaksin', $params)) ? true : false;
    }
}
