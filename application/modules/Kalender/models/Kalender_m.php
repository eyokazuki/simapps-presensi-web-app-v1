<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kalender_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_kalender($params)
    {
        return $this->db->delete("m_agenda", $params) ? true : false;
    }

    public function detail_kalender($params_where)
    {
        return $this->db->get_where("m_agenda", $params_where);
    }

    public function update_kalender($params, $params_where)
    {
        return ($this->db->update("m_agenda", $params, $params_where)) ? true : false;
    }

    public function simpan_kalender($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_agenda', $params)) ? true : false;
    }
}
