<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_employee($params, $id)
    {
        return $this->db->update("m_employee", array("aktif"=>0), array("id_employee"=>$id)) ? true : false;
    }

    public function getUser($id)
    {
        return $this->db->query("SELECt mu.*, d.departemen FROM m_user mu 
        LEFT JOIN m_departemen d ON d.id_departemen = mu.id_departemen
        WHERE id_user = $id")->row();
    }

    public function detail_employee($id)
    {
        return $this->db->query("
            select a.*, b.departemen,c.company,d.jabatan,e.employee_status,
            f.id_jabatan as parent_position_id, f.jabatan as parent_position_nm,
            g.id_section as position_id, g.section as position_nm
            from m_employee a
            left join m_departemen b on b.id_departemen=a.id_departemen
            left join m_company c on c.id_company=a.id_company
            left join m_jabatan d on d.id_jabatan=a.id_jabatan
            left join m_employee_status e on e.id_employee_status=a.id_employee_status
            left join m_jabatan f on f.id_jabatan=a.parent_position_id
            left join m_section g on g.id_section=a.position_id
            where a.id_employee='$id'
        ");
    }

    public function update_employee($params, $params_where)
    {
        return ($this->db->update("m_employee", $params, $params_where)) ? true : false;
    }

    public function simpan_employee($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_employee', $params)) ? true : false;
    }

    public function get_combo($tabel, $params_where)
    {
        return $this->db->get_where($tabel, $params_where);
    }


    function getparent($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('m_section');
        $this->db->where("section like '%" . $searchTerm . "%'");
        $fetched_records = $this->db->get();
        $parents = $fetched_records->result_array();
        $data = array();
        foreach ($parents as $parent) {
            $data[] = array("id" => $parent['id_section'], "text" => $parent['section']);
        }
        return $data;
    }

    function getjabatan($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('m_jabatan');
        $this->db->where("jabatan like '%" . $searchTerm . "%'");
        $fetched_records = $this->db->get();
        $jabatans = $fetched_records->result_array();
        $data = array();
        foreach ($jabatans as $jabatan) {
            $data[] = array("id" => $jabatan['id_jabatan'], "text" => $jabatan['jabatan']);
        }
        return $data;
    }

    function getstatus($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('m_employee_status');
        $this->db->where("employee_status like '%" . $searchTerm . "%'");
        $fetched_records = $this->db->get();
        $employee_statuss = $fetched_records->result_array();
        $data = array();
        foreach ($employee_statuss as $employee_status) {
            $data[] = array("id" => $employee_status['id_employee_status'], "text" => $employee_status['employee_status']);
        }
        return $data;
    }

    function getcompany($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('m_company');
        $this->db->where("company like '%" . $searchTerm . "%'");
        $fetched_records = $this->db->get();
        $companys = $fetched_records->result_array();
        $data = array();
        foreach ($companys as $company) {
            $data[] = array("id" => $company['id_company'], "text" => $company['company']);
        }
        return $data;
    }

    function getdepartemen($searchTerm, $id = 0)
    {
        $this->db->select('*');
        $this->db->from('m_departemen');
        $this->db->where("departemen like '%" . $searchTerm . "%'");
        $fetched_records = $this->db->get();
        $departemens = $fetched_records->result_array();
        $data = array();
        foreach ($departemens as $departemen) {
            $data[] = array("id" => $departemen['id_departemen'], "text" => $departemen['departemen']);
        }
        return $data;
    }

    function reset_password($id)
    {
        $this->db->set("password", password_hash("12345", PASSWORD_DEFAULT));
        $this->db->where("id_employee", $id);
        return $this->db->update("m_employee") ? true : false;
    }

    function get_employee($id)
    {
        return $this->db->query("
            SELECT * FROM m_employee WHERE id_employee = '$id'
        ")->row();
    }

    function get_status_keluarga()
    {
        return $this->db->query("
            SELECT * FROM m_status_keluarga WHERE aktif = 1
        ")->result();
    }

    public function simpan_employee_keluarga($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_keluarga', $params)) ? true : false;
    }

    public function update_employee_keluarga($params, $id)
    {
        return ($this->db->update("m_keluarga", $params, array(
            "id_keluarga"     => $id
        ))) ? true : false;
    }

    public function hapus_employee_keluarga($id)
    {
        return $this->db->delete("m_keluarga", array(
            "id_keluarga" => $id
        )) ? true : false;
    }

    function get_employee_keluarga($id)
    {
        return $this->db->query("
            SELECT * FROM m_keluarga WHERE id_keluarga = '$id'
        ")->row();
    }

    function get_employee_list()
    {
        return $this->db->query("
            SELECT 
            a.code,
            a.nama,
            a.nik,
            a.no_hp,
            a.alamat,
            a.email,
            a.tanggal_lahir,
            a.jenis_kelamin,
            e.employee_status,
            d.jabatan,
            g.section,
            f.jabatan as jabatan_atasan,
            c.company,
            b.departemen,
            a.aktif
            FROM m_employee  as a 
            left join m_departemen b on b.id_departemen=a.id_departemen
            left join m_company c on c.id_company=a.id_company
            left join m_jabatan d on d.id_jabatan=a.id_jabatan
            left join m_employee_status e on e.id_employee_status=a.id_employee_status
            left join m_jabatan f on f.id_jabatan=a.parent_position_id
            left join m_section g on g.id_section=a.position_id
        ")->result();
    }
}
