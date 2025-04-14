<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee_import_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getjabatan()
    {
        $this->db->select('*');
        $this->db->from('m_jabatan');
        $fetched_records = $this->db->get();
        $jabatans = $fetched_records->result_array();
        $data = array();
        foreach ($jabatans as $jabatan) {
            $data[] = array("id" => $jabatan['id_jabatan'], "text" => $jabatan['jabatan'], "code" => $jabatan["code"]);
        }
        return $data;
    }

    function getjabatanId($code)
    {
        return $this->db->query("SELECT id_jabatan FROM m_jabatan WHERE `code` = '$code'")->row()->id_jabatan;
    }

    function getcompanyId($code)
    {
        return $this->db->query("SELECT id_company FROM m_company WHERE `code` = '$code'")->row()->id_company;
    }

    function getdepartemenId($code)
    {
        return $this->db->query("SELECT id_departemen FROM m_departemen WHERE inisial = '$code'")->row()->id_departemen;
    }

    function getsectionId($code)
    {
        return $this->db->query("SELECT id_section FROM m_section WHERE `code` = '$code'")->row()->id_section;
    }

    function getstatusId($code)
    {
        return $this->db->query("SELECT id_employee_status FROM m_employee_status WHERE employee_status = '$code'")->row()->id_employee_status;
    }

    function getcompany()
    {
        $this->db->select('*');
        $this->db->from('m_company');
        $fetched_records = $this->db->get();
        $companys = $fetched_records->result_array();
        $data = array();
        foreach ($companys as $company) {
            $data[] = array("id" => $company['id_company'], "text" => $company['company'], "code" => $company["code"]);
        }
        return $data;
    }

    function getdepartemen()
    {
        $this->db->select('*');
        $this->db->from('m_departemen');
        $fetched_records = $this->db->get();
        $departemens = $fetched_records->result_array();
        $data = array();
        foreach ($departemens as $departemen) {
            $data[] = array("id" => $departemen['id_departemen'], "text" => $departemen['departemen'], "code" => $departemen["inisial"]);
        }
        return $data;
    }

    function getsection()
    {
        $this->db->select('*');
        $this->db->from('m_section');
        $fetched_records = $this->db->get();
        $sections = $fetched_records->result_array();
        $data = array();
        foreach ($sections as $section) {
            $data[] = array("id" => $section['id_section'], "text" => $section['section'], "code" => $section["code"]);
        }
        return $data;
    }

    function getstatus()
    {
        $this->db->select('*');
        $this->db->from('m_employee_status');
        $fetched_records = $this->db->get();
        $statuss = $fetched_records->result_array();
        $data = array();
        foreach ($statuss as $status) {
            $data[] = array("id" => $status['id_employee_status'], "text" => $status['employee_status']);
        }
        return $data;
    }

    public function simpan_employee($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('m_employee', $params)) ? true : false;
    }

    public function getEmployee($code)
    {
        return $this->db->query("
            select count(id_employee) as jumlah from m_employee where `code` = '$code'
        ");
    }
}
