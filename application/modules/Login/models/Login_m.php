<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_user($user)
    {
        return $this->db->select("a.id_user, a.username, a.password, a.id_priv, a.nama, b.priv")
            ->join("m_priv b", "a.id_priv = b.id_priv", "left")
            ->get_where("m_user as a", ["a.username" => $user, "a.aktif" => 1]);
    }

    public function change_pass($params, $params_where)
    {
        return ($this->db->update("m_user", $params, $params_where)) ? TRUE : FALSE;
    }

    public function detail_user($params)
    {
        return $this->db->get_where("m_user", $params);
    }
}
