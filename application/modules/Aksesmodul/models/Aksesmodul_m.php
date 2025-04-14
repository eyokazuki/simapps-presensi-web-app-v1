<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aksesmodul_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_all_parent_modul($priv)
    {
        return $this->db->select("a.*,b.akses_create, b.akses_edit, b.akses_delete ,
            CASE 
            WHEN b.id_priv_menu != '' THEN 1 
            ELSE 0 
            END AS status_modul")
            ->join("privilege_menu as b", "a.id_menu=b.id_menu AND b.id_privilege=$priv", "left")
            ->order_by("a.urutan")
            ->get_where("m_menu as a", ["a.is_child" => 0, "a.need_auth" => 1]);
    }

    public function get_all_child_modul($priv, $parent)
    {
        return $this->db->select("a.*,b.akses_create,b.akses_edit,b.akses_delete, 
            CASE 
            WHEN b.id_priv_menu != '' THEN 1 
            ELSE 0 
            END AS status_modul")
            ->join("privilege_menu as b", "a.id_menu=b.id_menu AND b.id_privilege=$priv", "left")
            ->get_where("m_menu as a", ["a.is_child" => 1, "a.parent_id" => $parent, "a.need_auth" => 1]);
    }

    public function update_akses_modul($priv, $modul, $value)
    {
        if ($value == 1) {
            $this->db->set('id_uuid', 'UUID()', FALSE);
            return ($this->db->insert("privilege_menu", array("id_privilege" => $priv, "id_menu" => $modul))) ? true : false;
        } else if ($value == 0) {
            return ($this->db->delete("privilege_menu", "id_privilege = $priv AND id_menu=$modul")) ? true : false;
        } else {
            return false;
        }
    }

    public function update_akses($priv, $modul, $value, $tipe)
    {
        if ($tipe == 1) {
            return ($this->db->update("privilege_menu", array("akses_create" => $value), array("id_privilege" => $priv, "id_menu" => $modul))) ? true : false;
        } else if ($tipe == 2) {
            return ($this->db->update("privilege_menu", array("akses_edit" => $value), array("id_privilege" => $priv, "id_menu" => $modul))) ? true : false;
        } else if ($tipe == 3) {
            return ($this->db->update("privilege_menu", array("akses_delete" => $value), array("id_privilege" => $priv, "id_menu" => $modul))) ? true : false;
        }
    }

    public function get_priv()
    {
        return $this->db->get("m_priv");
    }

    public function detail_priv($params_where)
    {
        return $this->db->get_where("m_priv", $params_where);
    }
}
