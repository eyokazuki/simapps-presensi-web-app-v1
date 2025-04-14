<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensilainnya_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function hapus_detail_absensi_pegawai_lainnya($params)
    {
        return $this->db->delete("detail_absensi_pegawai_lainnya", $params) ? true : false;
    }

    public function detail_detail_absensi_pegawai_lainnya($params_where)
    {
        return $this->db->get_where("detail_absensi_pegawai_lainnya", $params_where);
    }

    public function update_detail_absensi_pegawai_lainnya($params, $params_where)
    {
        return ($this->db->update("detail_absensi_pegawai_lainnya", $params, $params_where)) ? true : false;
    }

    public function simpan_detail_absensi_pegawai_lainnya($params)
    {
        $this->db->set('id_uuid', 'UUID()', FALSE);
        return ($this->db->insert('detail_absensi_pegawai_lainnya', $params)) ? true : false;
    }
    public function get_employee()
    {
        return $this->db->get("m_employee");
    }

    function getemployee($searchTerm)
    {
        $this->db->select('*');
        $this->db->from('m_employee');
        $this->db->where("nama like '%" . $searchTerm . "%'");
        $fetched_records = $this->db->get();
        $employees = $fetched_records->result_array();
        $data = array();
        foreach ($employees as $employee) {
            $data[] = array("id" => $employee['id_employee'], "text" => $employee['nama']);
        }
        return $data;
    }

    public function getUser($id)
    {
        return $this->db->query("SELECt mu.*, d.departemen FROM m_user mu 
        LEFT JOIN m_departemen d ON d.id_departemen = mu.id_departemen
        WHERE id_user = $id")->row();
    }

    function get_manhours($idDepartement, $date, $isAdmin)
    {
        $query = "
        SELECT
            me.id_employee,
            me.code,
            me.nama,
            md.departemen,
            ms.section,
            mj.jabatan,
            SUM(da.manhours) manhours
        FROM m_employee me
        INNER JOIN detail_absensi da
            ON da.id_employee = me.id_employee
            AND DATE_FORMAT(da.tanggal_absensi, '%Y') = '$date'
        LEFT JOIN m_departemen md
            ON md.id_departemen = me.id_departemen
        LEFT JOIN m_section ms
            ON ms.id_section = me.id_section
        LEFT JOIN m_jabatan mj
            ON mj.id_jabatan = me.id_jabatan
        LEFT JOIN m_employee_status mes
            ON mes.id_employee_status = me.id_employee_status
        ";
        if (!$isAdmin) {
            $query .= " WHERE
            me.id_departemen = $idDepartement";
        }
        $query .= " GROUP BY da.id_employee ORDER BY
        md.departemen ASC,
        ms.section ASC,
        me.nama ASC";
        return $this->db->query($query)->result();
    }

    public function get_status_kerja()
    {
        return $this->db->query("
        SELECT
            CASE
                WHEN mlk.`lokasi_kerja` IS NULL
                    THEN msk.`status_kerja`
                ELSE 
                    CONCAT('Working In ', mlk.`lokasi_kerja`)
            END ket,
            msk.id_status_kerja,
            mlk.id_lokasi_kerja
        FROM `m_status_kerja` msk
        LEFT JOIN `m_lokasi_kerja` mlk
            ON mlk.`id_status_kerja` = msk.`id_status_kerja`
            AND mlk.`id_lokasi_kerja` != 0
        WHERE
            msk.`id_status_kerja` != 0
        ORDER BY 2 ASC,3 DESC
        ")->result();
    }

    public function get_all_days($startDate, $endDate)
    {
        return $this->db->query("
        select a.Date as tgl
        from (
            select @lastDay - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as Date
            from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
            cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
            cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
            cross join (select @firstDay:='$startDate',@lastDay:='$endDate') var
        ) a
        where a.Date between @firstDay and @lastDay order by a.Date;
        ")->result();
    }

    public function query_all_days($startDate, $endDate)
    {
        return "
        select 
            @lastDay - INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as tgl
        from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c cross join (select @firstDay:='$startDate',@lastDay:='$endDate') var
        ";
    }

    public function get_kehadiran_bulanan($startDate, $endDate, $idDepartement, $isAdmin)
    {
        $queryDetailAbsensi = "
        SELECT
            CASE
                WHEN mlk.`lokasi_kerja` IS NULL
                    THEN msk.`status_kerja`
                ELSE 
                    CONCAT('Working In ', mlk.`lokasi_kerja`)
            END ket,
            msk.id_status_kerja,
            mlk.id_lokasi_kerja,
            DATE_FORMAT(da.`tanggal_absensi`, '%Y-%m-%d') tgl,
            COUNT(da.`id_absensi`) jumlah
        FROM `m_status_kerja` msk
        LEFT JOIN `m_lokasi_kerja` mlk
            ON mlk.`id_status_kerja` = msk.`id_status_kerja`
            AND mlk.`id_lokasi_kerja` != 0
        LEFT JOIN `detail_absensi` da
            ON (da.`status_kerja` = msk.`id_status_kerja`
            OR da.`lokasi_kerja` = mlk.`lokasi_kerja`)
            AND da.`tanggal_absensi` BETWEEN '$startDate' AND '$endDate'
        INNER JOIN `m_employee` me
            ON da.`id_employee` = me.`id_employee`
        WHERE
            msk.`id_status_kerja` != 0
        ";
        if (!$isAdmin) {
            $queryDetailAbsensi .= " AND
            me.id_departemen = $idDepartement";
        }
        $queryDetailAbsensi .= " GROUP BY 2, 3, 4
        ORDER BY 2 ASC,3 DESC";

        $queryAllDays = $this->query_all_days($startDate, $endDate);

        $query = "
        SELECT
            qtgl.tgl,
            qda.ket,
            qda.jumlah
        FROM ($queryAllDays) qtgl
        LEFT JOIN ($queryDetailAbsensi) qda
            ON qda.tgl = qtgl.tgl
        WHERE
            qtgl.tgl BETWEEN '$startDate' AND '$endDate'
        ORDER BY 
            1 ASC
        ";

        return $this->db->query($query)->result();
    }

    public function get_kesehatan_bulanan($startDate, $endDate, $idDepartement, $isAdmin)
    {
        $queryDetailAbsensi = "
        SELECT
            DATE_FORMAT(da.`tanggal_absensi`, '%Y-%m-%d') tgl,
        SUM(
            CASE
                WHEN da.`status_kerja` = 4
                    THEN 1
                ELSE 
                    0
            END
        ) sakit,
        SUM(
            CASE
                WHEN da.`status_kerja` != 4
                    THEN 1
                ELSE 
                    0
            END
        ) sehat
        FROM `detail_absensi` da
        INNER JOIN `m_employee` me
            ON da.`id_employee` = me.`id_employee`
        WHERE
            da.`tanggal_absensi` BETWEEN '$startDate' AND '$endDate'
        ";
        if (!$isAdmin) {
            $queryDetailAbsensi .= " AND
            me.id_departemen = $idDepartement";
        }
        $queryDetailAbsensi .= " GROUP BY 1
        ORDER BY 1 ASC";

        $queryAllDays = $this->query_all_days($startDate, $endDate);

        $query = "
        SELECT
            qtgl.tgl,
            qda.sakit,
            qda.sehat
        FROM ($queryAllDays) qtgl
        LEFT JOIN ($queryDetailAbsensi) qda
            ON qda.tgl = qtgl.tgl
        WHERE
            qtgl.tgl BETWEEN '$startDate' AND '$endDate'
        ORDER BY 
            1 ASC
        ";

        return $this->db->query($query)->result();
    }

    public function get_absen_bulanan($startDate, $endDate, $idDepartement, $isAdmin)
    {
        $queryDetailAbsensi = "
        SELECT
            DATE_FORMAT(da.`tanggal_absensi`, '%Y-%m-%d') tgl,
            COUNT(da.`id_employee`) hadir,
            (SELECT COUNT(me.id_employee) FROM `m_employee` me WHERE me.`aktif` = 1) - COUNT(da.`id_employee`) tidak_hadir
        FROM `detail_absensi` da
        LEFT JOIN `m_employee` me
            ON me.`id_employee` = da.`id_employee`
        WHERE
            da.`tanggal_absensi` BETWEEN '$startDate' AND '$endDate'
        ";
        if (!$isAdmin) {
            $queryDetailAbsensi .= " AND
            me.id_departemen = $idDepartement";
        }
        $queryDetailAbsensi .= " GROUP BY 1
        ORDER BY 1 ASC";

        $queryAllDays = $this->query_all_days($startDate, $endDate);

        $query = "
        SELECT
            qtgl.tgl,
            qda.hadir,
            qda.tidak_hadir
        FROM ($queryAllDays) qtgl
        LEFT JOIN ($queryDetailAbsensi) qda
            ON qda.tgl = qtgl.tgl
        WHERE
            qtgl.tgl BETWEEN '$startDate' AND '$endDate'
        ORDER BY 
            1 ASC
        ";

        return $this->db->query($query)->result();
    }
}
