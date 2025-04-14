<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Employee_import extends CI_Controller
{
    private $grant;
    private $ses;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("employee_import_m", "dbmodels");
        $this->auth->authlog();
        $this->grant     = $this->auth->getGrant();
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $modul          = $this->auth->modul();
        $this->ses         = $this->session->userdata($modul);
    }

    public function index()
    {
        $data["menuSideBar"]       = $this->auth->getMenu();
        $data["create_akses"]    = $this->grant["create"];
        $setting                 = $this->auth->getSetting();
        $icon                     = $this->auth->getIcon();
        $data                     = array_merge($data, $setting, $icon);

        $this->load->view('employee_import_v', $data);
    }

    public function noauth()
    {
        $data["menuSideBar"]    = $this->auth->getMenu();
        $setting                 = $this->auth->getSetting();
        $data                     = array_merge($data, $setting);
        $data["nama_menu"]        = "Access Denied";

        $this->load->view("partials/noauth", $data);
    }

    protected $abjad = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];

    public function createSheetTitle($spreadsheet, $title, $column)
    {
        $spreadsheet->setActiveSheetIndexByName($title);
        $sheet = $spreadsheet->getActiveSheet();
        foreach ($column as $key => $value) {
            $sheet->setCellValue($this->abjad[$key] . "1", $value);
        }

        return $sheet;
    }

    public function export()
    {
        $spreadsheet = new Spreadsheet();

        // Create company sheet
        $spreadsheet->getActiveSheet()->setTitle("company");
        $table_columns = array("ID COMPANY", "COMPANY", "CODE");
        $sheet = $this->createSheetTitle($spreadsheet, "company", $table_columns);
        $data = $this->dbmodels->getcompany();
        $baris = 2;
        for ($a = 0; $a < count($data); $a++) {
            $id = $data[$a]["id"];
            $name = $data[$a]["text"];
            $code = $data[$a]["code"];
            $sheet->setCellValueByColumnAndRow(1, $baris, "$id");
            $sheet->setCellValueByColumnAndRow(2, $baris, "$name");
            $sheet->setCellValueByColumnAndRow(3, $baris, "$code");
            $baris++;
        }
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        // Create jabatan sheet
        $spreadsheet->createSheet()->setTitle("jabatan");
        $table_columns = array("ID JABATAN", "JABATAN", "CODE");
        $sheet = $this->createSheetTitle($spreadsheet, "jabatan", $table_columns);
        $data = $this->dbmodels->getjabatan();
        $baris = 2;
        for ($a = 0; $a < count($data); $a++) {
            $id = $data[$a]["id"];
            $name = $data[$a]["text"];
            $code = $data[$a]["code"];
            $sheet->setCellValueByColumnAndRow(1, $baris, "$id");
            $sheet->setCellValueByColumnAndRow(2, $baris, "$name");
            $sheet->setCellValueByColumnAndRow(3, $baris, "$code");
            $baris++;
        }
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        // Create department sheet
        $spreadsheet->createSheet()->setTitle("departemen");
        $table_columns = array("ID DEPARTEMEN", "DEPARTEMEN", "CODE");
        $sheet = $this->createSheetTitle($spreadsheet, "departemen", $table_columns);
        $data = $this->dbmodels->getdepartemen();
        $baris = 2;
        for ($a = 0; $a < count($data); $a++) {
            $id = $data[$a]["id"];
            $name = $data[$a]["text"];
            $code = $data[$a]["code"];
            $sheet->setCellValueByColumnAndRow(1, $baris, "$id");
            $sheet->setCellValueByColumnAndRow(2, $baris, "$name");
            $sheet->setCellValueByColumnAndRow(3, $baris, "$code");
            $baris++;
        }
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        // Create section sheet
        $spreadsheet->createSheet()->setTitle("section");
        $table_columns = array("ID SECTION", "SECTION", "CODE");
        $sheet = $this->createSheetTitle($spreadsheet, "section", $table_columns);
        $data = $this->dbmodels->getsection();
        $baris = 2;
        for ($a = 0; $a < count($data); $a++) {
            $id = $data[$a]["id"];
            $name = $data[$a]["text"];
            $code = $data[$a]["code"];
            $sheet->setCellValueByColumnAndRow(1, $baris, "$id");
            $sheet->setCellValueByColumnAndRow(2, $baris, "$name");
            $sheet->setCellValueByColumnAndRow(3, $baris, "$code");
            $baris++;
        }
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        // Create status sheet
        $spreadsheet->createSheet()->setTitle("status");
        $table_columns = array("ID STATUS", "STATUS");
        $sheet = $this->createSheetTitle($spreadsheet, "status", $table_columns);
        $data = $this->dbmodels->getstatus();
        $baris = 2;
        for ($a = 0; $a < count($data); $a++) {
            $id = $data[$a]["id"];
            $name = $data[$a]["text"];
            $sheet->setCellValueByColumnAndRow(1, $baris, "$id");
            $sheet->setCellValueByColumnAndRow(2, $baris, "$name");
            $baris++;
        }
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        // Create jenis_kelamin sheet
        $spreadsheet->createSheet()->setTitle("jenis_kelamin");
        $table_columns = array("ID JENIS KELAMIN", "JENIS KELAMIN");
        $sheet = $this->createSheetTitle($spreadsheet, "jenis_kelamin", $table_columns);
        $data = array(
            array("id" => "L", "text" => "Laki-Laki"),
            array("id" => "P", "text" => "Perempuan")
        );
        $baris = 2;
        for ($a = 0; $a < count($data); $a++) {
            $id = $data[$a]["id"];
            $name = $data[$a]["text"];
            $sheet->setCellValueByColumnAndRow(1, $baris, "$id");
            $sheet->setCellValueByColumnAndRow(2, $baris, "$name");
            $baris++;
        }
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        // Create employee sheet
        $spreadsheet->createSheet()->setTitle("employee");
        $table_columns = array("NO", "Code", "Nama Employee", "NIK", "No HP", "Tanggal Lahir", "Alamat", "Email", "Jenis Kelamin", "Company", "Departemen", "Jabatan", "Section", "Jabatan Atasan", "Status");
        $spreadsheet->setActiveSheetIndexByName("employee");
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells("A1:O1");
        $sheet->setCellValue("A1", "Keterangan:");
        $sheet->mergeCells("A2:O2");
        $sheet->setCellValue("A2", "1. Isi Code dengan no payroll");
        $sheet->mergeCells("A3:O3");
        $sheet->setCellValue("A3", "2. Isi Tanggal Lahir dengan format tahun-bulan-tanggal");
        $sheet->mergeCells("A4:O4");
        $sheet->setCellValue("A4", "3. Isi Jenis kelamin dengan ID JENIS KELAMIN yang ada di sheet jenis_kelamin");
        $sheet->mergeCells("A5:O5");
        $sheet->setCellValue("A5", "4. Isi Company dengan CODE yang ada di sheet company");
        $sheet->mergeCells("A6:O6");
        $sheet->setCellValue("A6", "5. Isi Departemen dengan CODE yang ada di sheet departemen");
        $sheet->mergeCells("A7:O7");
        $sheet->setCellValue("A7", "6. Isi Jabatan dengan CODE yang ada di sheet jabatan");
        $sheet->mergeCells("A8:O8");
        $sheet->setCellValue("A8", "7. Isi Section dengan CODE yang ada di sheet section");
        $sheet->mergeCells("A9:O9");
        $sheet->setCellValue("A9", "8. Isi Jabatan Atasan dengan CODE yang ada di sheet jabatan");
        $sheet->mergeCells("A10:O10");
        $sheet->setCellValue("A10", "9. Isi Status dengan STATUS yang ada di sheet status");
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f4db05');
        $spreadsheet->getActiveSheet()->getStyle('A2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f4db05');
        $spreadsheet->getActiveSheet()->getStyle('A3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f4db05');
        $spreadsheet->getActiveSheet()->getStyle('A4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f4db05');
        $spreadsheet->getActiveSheet()->getStyle('A5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f4db05');
        $spreadsheet->getActiveSheet()->getStyle('A6')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f4db05');
        $spreadsheet->getActiveSheet()->getStyle('A7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f4db05');
        $spreadsheet->getActiveSheet()->getStyle('A8')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f4db05');
        $spreadsheet->getActiveSheet()->getStyle('A9')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f4db05');
        $spreadsheet->getActiveSheet()->getStyle('A10')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('f4db05');

        foreach ($table_columns as $key => $value) {
            $sheet->setCellValue($this->abjad[$key] . "12", $value);
            $spreadsheet->getActiveSheet()->getStyle($this->abjad[$key] . "12")->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('0082de');
            $spreadsheet->getActiveSheet()->getStyle($this->abjad[$key] . "12")->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        }
        $sheet->setCellValue("A13", "1");
        $sheet->setCellValue("B13", "20230606");
        $sheet->setCellValue("C13", "Contoh Nama Karyawan");
        $sheet->setCellValue("D13", "123456789");
        $sheet->setCellValue("E13", "082123456789");
        $sheet->setCellValue("F13", "1998-06-29");
        $sheet->setCellValue("G13", "Contoh Alamat Karyawan");
        $sheet->setCellValue("H13", "contoh@email.com");
        $sheet->setCellValue("I13", "L");
        $sheet->setCellValue("J13", "PS");
        $sheet->setCellValue("K13", "TPL");
        $sheet->setCellValue("L13", "TPM");
        $sheet->setCellValue("M13", "RLT");
        $sheet->setCellValue("N13", "TPM");
        $sheet->setCellValue("O13", "Permanent");
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }


        $writer = new Xlsx($spreadsheet);
        $filename = 'template_import_employee.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }

    public function export2()
    {
        $this->load->library("excel");
        $object = new PHPExcel();

        //$object->createSheet();

        $object->setActiveSheetIndex(0);
        $table_columns = array("ID COMPANY", "COMPANY");
        $column = 0;
        $response_company = $this->dbmodels->getcompany();
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $baris = 2;
        for ($a = 0; $a < count($response_company); $a++) {
            $Cid = $response_company[$a]["id"];
            $Ctext = $response_company[$a]["text"];
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $baris, "$Cid");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $baris, "$Ctext");
            $baris++;
        }
        $sheet = $object->getActiveSheet();
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $object->getActiveSheet()->setTitle('Company');

        // Untuk Data Jabatan
        $object->createSheet();
        $object->setActiveSheetIndex(1);
        $table_columns = array("ID JABATAN", "JABATAN");
        $column = 0;
        $response = $this->dbmodels->getjabatan();
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $baris = 2;
        for ($a = 0; $a < count($response); $a++) {
            $id = $response[$a]["id"];
            $text = $response[$a]["text"];
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $baris, "$id");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $baris, "$text");
            $baris++;
        }
        $sheet = $object->getActiveSheet();
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $object->getActiveSheet()->setTitle('Jabatan');

        // Untuk Data Departemen
        $object->createSheet();
        $object->setActiveSheetIndex(2);
        $table_columns = array("ID DEPARTEMEN", "DEPARTEMEN");
        $column = 0;
        $response = $this->dbmodels->getdepartemen();
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $baris = 2;
        for ($a = 0; $a < count($response); $a++) {
            $Did = $response[$a]["id"];
            $Dtext = $response[$a]["text"];
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $baris, "$Did");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $baris, "$Dtext");
            $baris++;
        }
        $sheet = $object->getActiveSheet();
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $object->getActiveSheet()->setTitle('Departemen');

        // Untuk Data Section
        $object->createSheet();
        $object->setActiveSheetIndex(3);
        $table_columns = array("ID SECTION", "SECTION");
        $column = 0;
        $response = $this->dbmodels->getsection();
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $baris = 2;
        for ($a = 0; $a < count($response); $a++) {
            $Sid = $response[$a]["id"];
            $Stext = $response[$a]["text"];
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $baris, "$Sid");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $baris, "$Stext");
            $baris++;
        }
        $sheet = $object->getActiveSheet();
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $object->getActiveSheet()->setTitle('Section');

        // Untuk Data Status
        $object->createSheet();
        $object->setActiveSheetIndex(4);
        $table_columns = array("ID STATUS", "STATUS");
        $column = 0;
        $response = $this->dbmodels->getstatus();
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $baris = 2;
        for ($a = 0; $a < count($response); $a++) {
            $ESid = $response[$a]["id"];
            $EStext = $response[$a]["text"];
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $baris, "$ESid");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $baris, "$EStext");
            $baris++;
        }
        $sheet = $object->getActiveSheet();
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $object->getActiveSheet()->setTitle('Status');

        // Untuk Data Jenis Kelamin
        $object->createSheet();
        $object->setActiveSheetIndex(5);
        $table_columns = array("ID JENIS", "JENIS KELAMIN");
        $column = 0;
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $response = array(
            array("id" => "L", "text" => "Laki-Laki"),
            array("id" => "P", "text" => "Perempuan")
        );

        $baris = 2;
        for ($a = 0; $a < count($response); $a++) {
            $Jid = $response[$a]["id"];
            $Jtext = $response[$a]["text"];
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $baris, "$Jid");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $baris, "$Jtext");
            $baris++;
        }
        $sheet = $object->getActiveSheet();
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $object->getActiveSheet()->setTitle('Jenis Kelamin');


        // Untuk Data Employee
        $object->createSheet();
        $object->setActiveSheetIndex(6);
        $table_columns = array("NO", "Code", "Nama Employee", "NIK", "No HP", "Tanggal Lahir", "Alamat", "Email", "Jenis Kelamin", "Company", "Departemen", "Jabatan", "Section", "Jabatan Atasan", "Status");
        $column = 0;
        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }
        $baris = 2;
        for ($a = 1; $a < 4; $a++) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $baris, "$a");
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $baris, " ");
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $baris, " ");
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $baris, " ");
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $baris, " ");
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $baris, "0000-00-00");
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $baris, " ");
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $baris, " ");
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $baris, " ");
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $baris, " ");
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $baris, " ");
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $baris, " ");
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $baris, " ");
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $baris, " ");
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $baris, " ");
            $baris++;
        }
        $sheet = $object->getActiveSheet();
        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }
        $object->getActiveSheet()->setTitle('Employee');


        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Employee Data.xls"');
        $object_writer->save('php://output');
    }

    function simpandokumenberkas()
    {
        ini_set('max_execution_time', 86400000);
        $path = 'documents/employee/';
        $ket = "";
        $statusRes = "Sukses";
        $this->upload_config($path);
        if (!$this->upload->do_upload('dokumen')) {
            $ket = "Proses Gagal, File Tidak Terbaca.";
            $statusRes = "Gagal";
        } else {
            $file_data = $this->upload->data();
            $file_name = $path . $file_data['file_name'];
            $arr_file = explode(".", $file_name);
            $extension = end($arr_file);
            if ("csv" == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file_name);
            $sheet_data = $spreadsheet->setActiveSheetIndexByName("employee")->toArray();
            for ($i = 12; $i < count($sheet_data); $i++) {
                $data = $sheet_data[$i];
                if (strtoupper($data[2]) != "CONTOH NAMA KARYAWAN") {
                    $code = $data[1];
                    $name = $data[2];
                    $nik = $data[3];
                    $noHP = $data[4];
                    $tglLahir = $data[5];
                    $alamat = $data[6];
                    $email = $data[7];
                    $jenisKelamin = $data[8];
                    $company = $data[9];
                    $departemen = $data[10];
                    $jabatan = $data[11];
                    $section = $data[12];
                    $jabatanAtasan = $data[13];
                    $status = $data[14];

                    $checkCode = $code != null && $code != (strlen($code) > 0 && strlen(trim($code)) == 0);
                    $checkName = $name != null && $name != (strlen($name) > 0 && strlen(trim($name)) == 0);
                    $checkCompany = $company != null && $company != (strlen($company) > 0 && strlen(trim($company)) == 0);
                    $checkDepartemen = $departemen != null && $departemen != (strlen($departemen) > 0 && strlen(trim($departemen)) == 0);
                    $checkJabatan = $jabatan != null && $jabatan != (strlen($jabatan) > 0 && strlen(trim($jabatan)) == 0);
                    $checkSection = $section != null && $section != (strlen($section) > 0 && strlen(trim($section)) == 0);
                    $checkJabatanAtasan = $jabatanAtasan != null && $jabatanAtasan != (strlen($jabatanAtasan) > 0 && strlen(trim($jabatanAtasan)) == 0);
                    $checkStatus = $status != null && $status != (strlen($status) > 0 && strlen(trim($status)) == 0);

                    if (
                        $checkCode &&
                        $checkName &&
                        $checkCompany &&
                        $checkDepartemen &&
                        $checkJabatan &&
                        $checkSection &&
                        $checkJabatanAtasan &&
                        $checkStatus
                    ) {
                        $checkEmployee = $this->dbmodels->getEmployee($code)->row();
                        if ($checkEmployee->jumlah < 1) {
                            $jabatanAtasan = $this->dbmodels->getjabatanId($jabatanAtasan);
                            $section = $this->dbmodels->getsectionId($section);
                            $jabatan = $this->dbmodels->getjabatanId($jabatan);
                            $status = $this->dbmodels->getstatusId($status);
                            $company = $this->dbmodels->getcompanyId($company);
                            $departemen = $this->dbmodels->getdepartemenId($departemen);
                            $params     = array(
                                "code"    => $code,
                                "nama"    => $name,
                                "nik"    => $nik,
                                "no_hp"    => $noHP,
                                "tanggal_lahir"    => $tglLahir,
                                "alamat"    => $alamat,
                                "password"    => password_hash("12345", PASSWORD_DEFAULT),
                                "email"    => $email,
                                "jenis_kelamin"    => $jenisKelamin,
                                "parent_position_id"    => $jabatanAtasan,
                                "position_id"    => $section,
                                "id_jabatan"    => $jabatan,
                                "id_employee_status"    => $status,
                                "id_company"    => $company,
                                "id_departemen" => $departemen,
                                "id_section" => $section,
                                "aktif"        => 1,
                            );
                            // echo json_encode($params);

                            $this->dbmodels->simpan_employee($params);
                        }
                    }
                }
            }
        }

        $output = array("status" => $statusRes, "ket" => $ket);
        echo json_encode($output);
    }

    function simpandokumenberkas2()
    {
        $config['upload_path'] = "assets/employee";
        $config['allowed_types'] = 'xls';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload("dokumen")) {
            $data = array('upload_data' => $this->upload->data());
            $filenya = $data['upload_data']['file_name'];
            $reader     = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            $spreadsheet     = $reader->load("https://simenggaris.absenyuk.xyz/assets/employee/546cd2150d7bf42b52a5dff53934c47a.xls");
            $sheet_data     = $spreadsheet->getActiveSheet()->toArray();
            $list             = [];
            $judul          = $sheet_data[0];
            $ket = $judul;
            $status = "Sukses";
        } else {
            $ket = "Proses Gagal, File Tidak Terbaca.";
            $status = "Gagal";
        }
        $output = array("status" => $status, "ket" => $ket);
        echo json_encode($output);
    }

    public function upload_config($path)
    {
        if (!is_dir($path))
            mkdir($path, 0777, TRUE);
        $config['upload_path']         = './' . $path;
        $config['allowed_types']     = '*';
        $config['max_filename']         = '255';
        $config['encrypt_name']     = TRUE;
        $config['max_size']         = 100000;
        $this->load->library('upload', $config);
    }
}
