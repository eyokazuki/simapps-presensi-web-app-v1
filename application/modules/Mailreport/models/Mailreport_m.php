<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mailreport_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_mailreport($params)
    {
        return $this->db->delete("m_mailreport", $params) ? true : false;
    }

    public function detail_mailreport($params_where)
    {
        return $this->db->get_where("m_mailreport", $params_where);
    }

    public function update_mailreport($params, $params_where)
    {
        return ($this->db->update("m_mailreport", $params, $params_where)) ? true : false;
    }

    public function simpan_mailreport($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_mailreport', $params)) ? true : false;
    }
}
