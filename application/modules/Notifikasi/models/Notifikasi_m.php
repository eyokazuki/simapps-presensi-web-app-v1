<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

	public function getUser($id)
    {
        return $this->db->query("SELECT mu.*, d.departemen FROM m_user mu 
        LEFT JOIN m_departemen d ON d.id_departemen = mu.id_departemen
        WHERE id_user = $id")->row();
    }

	public function simpan_notifikasi($params)
    {
        $this->db->set('id', 'UUID()', FALSE);
        return ($this->db->insert('notification_schedule', $params)) ? true : false;
    }

	public function detail_notifikasi($params_where)
    {
        return $this->db->get_where("notification_schedule", $params_where);
    }

	public function update_notifikasi($params, $params_where)
    {
        return ($this->db->update("notification_schedule", $params, $params_where)) ? true : false;
    }

	public function hapus_notifikasi($params)
    {
        return $this->db->delete("notification_schedule", $params) ? true : false;
    }
}
