<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getchart_absen($tanggal)
    {
        $sekarang = date('Y-m-d');
        return $this->db->query("
        SELECT a.inisial,
        (
            SELECT COUNT(*) 
            FROM detail_absensi aa
            LEFT JOIN m_employee bb ON aa.id_employee=bb.id_employee
            WHERE DATE(aa.tanggal_absensi) = '$tanggal' AND bb.id_departemen = a.id_departemen
        ) as absen,
        (
            SELECT COUNT(*) 
            FROM m_employee aa
            WHERE aa.id_employee NOT IN (
                SELECT bb.id_employee 
                FROM detail_absensi bb 
                WHERE DATE(bb.tanggal_absensi) = '$tanggal'
            )
            AND  aa.id_departemen = a.id_departemen
        ) as absentidak
        FROM m_departemen a 
        LEFT JOIN m_employee b ON a.id_departemen = b.id_departemen
        GROUP BY a.id_departemen
        ORDER BY a.no_index
        ");
    }

    public function getchart_sehat($tanggal)
    {
        $sekarang = date('Y-m-d');
        return $this->db->query("
        SELECT a.inisial,
            (
                SELECT COUNT(*) 
                FROM detail_absensi aa
                LEFT JOIN m_employee bb ON aa.id_employee=bb.id_employee
                WHERE DATE(aa.tanggal_absensi) = '$tanggal' AND bb.id_departemen = a.id_departemen
                AND aa.kondisi_kesehatan=1
            ) as sehat,
            (
                SELECT COUNT(*) 
                FROM detail_absensi aa
                LEFT JOIN m_employee bb ON aa.id_employee=bb.id_employee
                WHERE DATE(aa.tanggal_absensi) = '$tanggal' AND bb.id_departemen = a.id_departemen
                AND aa.kondisi_kesehatan=2
            ) as sehattidak
        FROM m_departemen a 
        LEFT JOIN m_employee b ON a.id_departemen = b.id_departemen
        GROUP BY a.id_departemen 
        ORDER BY a.no_index
        ");
    }


    public function getchart_lokasi()
    {
        return $this->db->query("
        SELECT 
        a.id_status_kerja,
        (
        CASE
            WHEN b.id_lokasi_kerja != '' THEN 
                CASE 
                    WHEN b.lokasi_kerja = 'Office Jakarta' THEN 'Work In Office Jakarta'
                    WHEN b.lokasi_kerja = 'Office Tarakan' THEN 'Work In Office Tarakan'
                    ELSE CONCAT('Working In ', b.lokasi_kerja)
                END
            ELSE a.status_kerja
        END
        ) status,
        b.id_lokasi_kerja
        FROM 
        m_status_kerja a
        LEFT JOIN m_lokasi_kerja b ON a.id_status_kerja=b.id_status_kerja
        WHERE a.tipe =1
        ");
    }

    public function getchart_lokasi2($id_status_kerja, $id_lokasi_kerja, $tanggal)
    {
        $sekarang = date('Y-m-d');
        return $this->db->query("
            SELECT COUNT(*) as jumlah
            FROM detail_absensi a
            WHERE DATE(a.tanggal_absensi) = '$tanggal' AND
            a.status_kerja = '$id_status_kerja' AND a.lokasi_kerja = '$id_lokasi_kerja'
        ");
    }
}
