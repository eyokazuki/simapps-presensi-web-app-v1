<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Dashboard';
$route['404_override'] = 'Error_404';
$route['translate_uri_dashes'] = FALSE;

/* LOGIN */
$route['login'] = 'Login';
$route['login/index'] = 'Login/index';
$route['login/action'] = 'Login/action';
$route['login/logout'] = 'Login/logout';
$route['login/change_pass'] = 'Login/change_pass';

/* Detailabsen */
$route['detailabsen'] = 'Detailabsen';
$route['detailabsen/index'] = 'Detailabsen/index';
$route['detailabsen/noauth'] = 'Detailabsen/noauth';
$route['detailabsen/tabel_absensi'] = 'Detailabsen/tabel_absensi';

/* Dashboard */
$route['dashboard'] = 'Dashboard';
$route['dashboard/index'] = 'Dashboard/index';
$route['dashboard/noauth'] = 'Dashboard/noauth';
$route['dashboard/tabel_progres_pic'] = 'Dashboard/tabel_progres_pic';
$route['dashboard/tabel_klaster'] = 'Dashboard/tabel_klaster';
$route['dashboard/tabel_indikator'] = 'Dashboard/tabel_indikator';
$route['dashboard/get_data_grafik'] = 'Dashboard/get_data_grafik';
$route['dashboard/get_data_grafik_opd'] = 'Dashboard/get_data_grafik_opd';
$route['dashboard/tabel_detail_rincian_pic'] = 'Dashboard/tabel_detail_rincian_pic';
$route['dashboard/tabel_indikator'] = 'Dashboard/tabel_indikator';
$route['dashboard/tabel_sub_indikator'] = 'Dashboard/tabel_sub_indikator';
$route['dashboard/tabel_pic_sub_indikator'] = 'Dashboard/tabel_pic_sub_indikator';
$route['dashboard/getchart_absen'] = 'Dashboard/getchart_absen';
$route['dashboard/getchart_sehat'] = 'Dashboard/getchart_sehat';
$route['dashboard/getchart_lokasi'] = 'Dashboard/getchart_lokasi';
$route['dashboard/getchart_lokasi2'] = 'Dashboard/getchart_lokasi2';
$route['dashboard/send_email'] = 'Dashboard/send_email';
$route['dashboard/upload'] = 'Dashboard/upload';


/* Privilege */
$route['privilege'] = 'Privilege';
$route['privilege/index'] = 'Privilege/index';
$route['privilege/noauth'] = 'Privilege/noauth';
$route['privilege/tabel_privilege'] = 'Privilege/tabel_privilege';
$route['privilege/hapus_privilege'] = 'Privilege/hapus_privilege';
$route['privilege/detail_privilege'] = 'Privilege/detail_privilege';
$route['privilege/simpan_privilege'] = 'Privilege/simpan_privilege';

/* User */
$route['user'] = 'User';
$route['user/index'] = 'User/index';
$route['user/noauth'] = 'User/noauth';
$route['user/tabel_user'] = 'User/tabel_user';
$route['user/hapus_user'] = 'User/hapus_user';
$route['user/detail_user'] = 'User/detail_user';
$route['user/simpan_user'] = 'User/simpan_user';

/* Modul */
$route['modul'] = 'Modul';
$route['modul/index'] = 'Modul/index';
$route['modul/noauth'] = 'Modul/noauth';
$route['modul/tabel_modul'] = 'Modul/tabel_modul';
$route['modul/hapus_modul'] = 'Modul/hapus_modul';
$route['modul/detail_modul'] = 'Modul/detail_modul';
$route['modul/simpan_modul'] = 'Modul/simpan_modul';
$route['modul/get_parent_modul'] = 'Modul/get_parent_modul';

/* Akses Modul */
$route['aksesmodul'] = 'Aksesmodul';
$route['aksesmodul/index'] = 'Aksesmodul/index';
$route['aksesmodul/noauth'] = 'Aksesmodul/noauth';
$route['aksesmodul/tabel_modul'] = 'Aksesmodul/tabel_modul';
$route['aksesmodul/update_akses_modul'] = 'Aksesmodul/update_akses_modul';
$route['aksesmodul/update_akses'] = 'Aksesmodul/update_akses';


/* API */
$route['api'] = 'Api';
$route['api/index'] = 'Api/index';
$route['api/create_sign'] = 'Api/create_sign';
$route['api/login'] = 'Api/login';


/* Akses Modul */
$route['departemen'] = 'Departemen';
$route['departemen/index'] = 'Departemen/index';
$route['departemen/tabel_departemen'] = 'Departemen/tabel_departemen';
$route['departemen/hapus_departemen'] = 'Departemen/hapus_departemen';
$route['departemen/detail_departemen'] = 'Departemen/detail_departemen';
$route['departemen/simpan_departemen'] = 'Departemen/simpan_departemen';
$route['departemen/rules_departemen'] = 'Departemen/rules_departemen';
$route['departemen/check_id'] = 'Departemen/check_id';
$route['departemen/get_company_modul'] = 'Departemen/get_company_modul';
$route['departemen/list_company_modul'] = 'Departemen/list_company_modul';



$route['company'] = 'Company';
$route['company/index'] = 'Company/index';
$route['company/tabel_company'] = 'Company/tabel_company';
$route['company/hapus_company'] = 'Company/hapus_company';
$route['company/detail_company'] = 'Company/detail_company';
$route['company/simpan_company'] = 'Company/simpan_company';
$route['company/rules_company'] = 'Company/rules_company';
$route['company/company_available'] = 'Company/company_available';
$route['company/check_id'] = 'Company/check_id';

$route['level'] = 'Level';
$route['level/index'] = 'Level/index';
$route['level/tabel_level'] = 'Level/tabel_level';
$route['level/hapus_level'] = 'Level/hapus_level';
$route['level/detail_level'] = 'Level/detail_level';
$route['level/simpan_level'] = 'Level/simpan_level';
$route['level/rules_level'] = 'Level/rules_level';
$route['level/level_available'] = 'Level/level_available';
$route['level/check_id'] = 'Level/check_id';

$route['jabatan'] = 'Jabatan';
$route['jabatan/index'] = 'Jabatan/index';
$route['jabatan/tabel_jabatan'] = 'Jabatan/tabel_jabatan';
$route['jabatan/hapus_jabatan'] = 'Jabatan/hapus_jabatan';
$route['jabatan/detail_jabatan'] = 'Jabatan/detail_jabatan';
$route['jabatan/simpan_jabatan'] = 'Jabatan/simpan_jabatan';
$route['jabatan/rules_jabatan'] = 'Jabatan/rules_jabatan';
$route['jabatan/jabatan_available'] = 'Jabatan/jabatan_available';
$route['jabatan/check_id'] = 'Jabatan/check_id';


$route['kondisikesehatan'] = 'Kondisikesehatan';
$route['kondisikesehatan/index'] = 'Kondisikesehatan/index';
$route['kondisikesehatan/tabel_kondisikesehatan'] = 'Kondisikesehatan/tabel_kondisikesehatan';
$route['kondisikesehatan/hapus_kondisikesehatan'] = 'Kondisikesehatan/hapus_kondisikesehatan';
$route['kondisikesehatan/detail_kondisikesehatan'] = 'Kondisikesehatan/detail_kondisikesehatan';
$route['kondisikesehatan/simpan_kondisikesehatan'] = 'Kondisikesehatan/simpan_kondisikesehatan';
$route['kondisikesehatan/rules_kondisikesehatan'] = 'Kondisikesehatan/rules_kondisikesehatan';
$route['kondisikesehatan/kondisikesehatan_available'] = 'Kondisikesehatan/kondisikesehatan_available';
$route['kondisikesehatan/check_id'] = 'Kondisikesehatan/check_id';


$route['tipevaksin'] = 'Tipevaksin';
$route['tipevaksin/index'] = 'Tipevaksin/index';
$route['tipevaksin/tabel_tipe_vaksin'] = 'Tipevaksin/tabel_tipe_vaksin';
$route['tipevaksin/hapus_tipe_vaksin'] = 'Tipevaksin/hapus_tipe_vaksin';
$route['tipevaksin/detail_tipe_vaksin'] = 'Tipevaksin/detail_tipe_vaksin';
$route['tipevaksin/simpan_tipe_vaksin'] = 'Tipevaksin/simpan_tipe_vaksin';
$route['tipevaksin/rules_tipe_vaksin'] = 'Tipevaksin/rules_tipe_vaksin';
$route['tipevaksin/tipe_vaksin_available'] = 'Tipevaksin/tipe_vaksin_available';
$route['tipevaksin/check_id'] = 'Tipevaksin/check_id';


$route['statuskerja'] = 'Statuskerja';
$route['statuskerja/index'] = 'Statuskerja/index';
$route['statuskerja/tabel_status_kerja'] = 'Statuskerja/tabel_status_kerja';
$route['statuskerja/hapus_status_kerja'] = 'Statuskerja/hapus_status_kerja';
$route['statuskerja/detail_status_kerja'] = 'Statuskerja/detail_status_kerja';
$route['statuskerja/simpan_status_kerja'] = 'Statuskerja/simpan_status_kerja';
$route['statuskerja/rules_status_kerja'] = 'Statuskerja/rules_status_kerja';
$route['statuskerja/status_kerja_available'] = 'Statuskerja/status_kerja_available';
$route['statuskerja/check_id'] = 'Statuskerja/check_id';


$route['employee'] = 'Employee';
$route['employee/index'] = 'Employee/index';
$route['employee/noauth'] = 'Employee/noauth';
$route['employee/tabel_employee'] = 'Employee/tabel_employee';
$route['employee/hapus_employee'] = 'Employee/hapus_employee';
$route['employee/detail_employee'] = 'Employee/detail_employee';
$route['employee/simpan_employee'] = 'Employee/simpan_employee';
$route['employee/rules_employee'] = 'Employee/rules_employee';
$route['employee/check_id'] = 'Employee/check_id';
$route['employee/get_status_modul'] = 'Employee/get_status_modul';
$route['employee/list_status_modul'] = 'Employee/list_status_modul';
$route['employee/get_jabatan_modul'] = 'Employee/get_jabatan_modul';
$route['employee/list_jabatan_modul'] = 'Employee/list_jabatan_modul';
$route['employee/get_parent_modul'] = 'Employee/get_parent_modul';
$route['employee/list_parent_modul'] = 'Employee/list_parent_modul';
$route['employee/get_company_modul'] = 'Employee/get_company_modul';
$route['employee/list_company_modul'] = 'Employee/list_company_modul';
$route['employee/get_departemen_modul'] = 'Employee/get_departemen_modul';
$route['employee/list_departemen_modul'] = 'Employee/list_departemen_modul';
$route['employee/reset_password'] = 'Employee/reset_password';
$route['employee/excel'] = 'Employee/download_excel_employee';
$route['employee/keluarga'] = 'Employee/keluarga_page';
$route['employee/keluarga/table'] = 'Employee/tabel_employee_keluarga';
$route['employee/keluarga/simpan'] = 'Employee/simpan_employee_keluarga';
$route['employee/keluarga/hapus'] = 'Employee/hapus_employee_keluarga';



$route['statuskeluarga'] = 'Statuskeluarga';
$route['statuskeluarga/index'] = 'Statuskeluarga/index';
$route['statuskeluarga/tabel_status_keluarga'] = 'Statuskeluarga/tabel_status_keluarga';
$route['statuskeluarga/hapus_status_keluarga'] = 'Statuskeluarga/hapus_status_keluarga';
$route['statuskeluarga/detail_status_keluarga'] = 'Statuskeluarga/detail_status_keluarga';
$route['statuskeluarga/simpan_status_keluarga'] = 'Statuskeluarga/simpan_status_keluarga';
$route['statuskeluarga/rules_status_keluarga'] = 'Statuskeluarga/rules_status_keluarga';
$route['statuskeluarga/status_keluarga_available'] = 'Statuskeluarga/status_keluarga_available';
$route['statuskeluarga/check_id'] = 'Statuskeluarga/check_id';



$route['lokasikerja'] = 'Lokasikerja';
$route['lokasikerja/index'] = 'Lokasikerja/index';
$route['lokasikerja/noauth'] = 'Lokasikerja/noauth';
$route['lokasikerja/tabel_lokasi_kerja'] = 'Lokasikerja/tabel_lokasi_kerja';
$route['lokasikerja/hapus_lokasi_kerja'] = 'Lokasikerja/hapus_lokasi_kerja';
$route['lokasikerja/detail_lokasi_kerja'] = 'Lokasikerja/detail_lokasi_kerja';
$route['lokasikerja/simpan_lokasi_kerja'] = 'Lokasikerja/simpan_lokasi_kerja';
$route['lokasikerja/rules_lokasi_kerja'] = 'Lokasikerja/rules_lokasi_kerja';
$route['lokasikerja/check_id'] = 'Lokasikerja/check_id';
$route['lokasikerja/get_status_modul'] = 'Lokasikerja/get_status_modul';
$route['lokasikerja/list_status_modul'] = 'Lokasikerja/list_status_modul';



$route['kalender'] = 'Kalender';
$route['kalender/index'] = 'Kalender/index';
$route['kalender/noauth'] = 'Kalender/noauth';
$route['kalender/tabel_kalender'] = 'Kalender/tabel_kalender';
$route['kalender/hapus_kalender'] = 'Kalender/hapus_kalender';
$route['kalender/detail_kalender'] = 'Kalender/detail_kalender';
$route['kalender/simpan_kalender'] = 'Kalender/simpan_kalender';
$route['kalender/check_id'] = 'Kalender/check_id';
$route['kalender/update_aktif'] = 'Kalender/update_aktif';



$route['banner'] = 'Banner';
$route['banner/index'] = 'Banner/index';
$route['banner/noauth'] = 'Banner/noauth';
$route['banner/tabel_banner'] = 'Banner/tabel_banner';
$route['banner/hapus_banner'] = 'Banner/hapus_banner';
$route['banner/simpan_banner'] = 'Banner/simpan_banner';
$route['banner/check_id'] = 'Banner/check_id';
$route['banner/update_aktif'] = 'Banner/update_aktif';


$route['section'] = 'Section';
$route['section/index'] = 'Section/index';
$route['section/tabel_section'] = 'Section/tabel_section';
$route['section/hapus_section'] = 'Section/hapus_section';
$route['section/detail_section'] = 'Section/detail_section';
$route['section/simpan_section'] = 'Section/simpan_section';
$route['section/rules_section'] = 'Section/rules_section';
$route['section/section_available'] = 'Section/section_available';
$route['section/check_id'] = 'Section/check_id';

$route['absensilainnya'] = 'Absensilainnya';
$route['absensilainnya/index'] = 'Absensilainnya/index';
$route['absensilainnya/tabel_detail_absensi_pegawai_lainnya'] = 'Absensilainnya/tabel_detail_absensi_pegawai_lainnya';
$route['absensilainnya/hapus_detail_absensi_pegawai_lainnya'] = 'Absensilainnya/hapus_detail_absensi_pegawai_lainnya';
$route['absensilainnya/detail_detail_absensi_pegawai_lainnya'] = 'Absensilainnya/detail_detail_absensi_pegawai_lainnya';
$route['absensilainnya/simpan_detail_absensi_pegawai_lainnya'] = 'Absensilainnya/simpan_detail_absensi_pegawai_lainnya';
$route['absensilainnya/rules_detail_absensi_pegawai_lainnya'] = 'Absensilainnya/rules_detail_absensi_pegawai_lainnya';
$route['absensilainnya/detail_absensi_pegawai_lainnya_available'] = 'Absensilainnya/detail_absensi_pegawai_lainnya_available';
$route['absensilainnya/check_id'] = 'Absensilainnya/check_id';
$route['absensilainnya/get_employee_modul'] = 'Absensilainnya/get_employee_modul';
$route['absensilainnya/list_employee_modul'] = 'Absensilainnya/list_employee_modul';
$route['absensilainnya/report_manhours'] = 'Absensilainnya/download_report_manhours';
$route['absensilainnya/report/bulanan'] = 'Absensilainnya/download_report_bulanan';


/* Report */
$route['report'] = 'Report';
$route['report/index'] = 'Report/index';
$route['report/getchart_absen'] = 'Report/getchart_absen';
$route['report/getchart_sehat'] = 'Report/getchart_sehat';
$route['report/getchart_lokasi'] = 'Report/getchart_lokasi';
$route['report/getchart_lokasi2'] = 'Report/getchart_lokasi2';
$route['report/send_email'] = 'Report/send_email';
$route['report/send_report'] = 'Report/send_report';


$route['mailreport'] = 'Mailreport';
$route['mailreport/index'] = 'Mailreport/index';
$route['mailreport/tabel_mailreport'] = 'Mailreport/tabel_mailreport';
$route['mailreport/hapus_mailreport'] = 'Mailreport/hapus_mailreport';
$route['mailreport/detail_mailreport'] = 'Mailreport/detail_mailreport';
$route['mailreport/simpan_mailreport'] = 'Mailreport/simpan_mailreport';
$route['mailreport/rules_mailreport'] = 'Mailreport/rules_mailreport';
$route['mailreport/mailreport_available'] = 'Mailreport/mailreport_available';
$route['mailreport/check_id'] = 'Mailreport/check_id';


/* employee_import */
$route['employee_import'] = 'Employee_import';
$route['employee_import/index'] = 'Employee_import/index';
$route['employee_import/noauth'] = 'Employee_import/noauth';
$route['employee_import/export'] = 'Employee_import/export';
$route['employee_import/simpandokumenberkas'] = 'Employee_import/simpandokumenberkas';

/* employee_import */
$route['bataswaktu'] = 'Bataswaktu';
$route['bataswaktu/index'] = 'Bataswaktu/index';
$route['bataswaktu/simpan'] = 'Bataswaktu/simpan';

/* employee_status */
$route['statuspegawai'] = 'Statuspegawai';
$route['statuspegawai/index'] = 'Statuspegawai/index';
$route['statuspegawai/tabel_employee_status'] = 'Statuspegawai/tabel_employee_status';
$route['statuspegawai/hapus_employee_status'] = 'Statuspegawai/hapus_employee_status';
$route['statuspegawai/detail_employee_status'] = 'Statuspegawai/detail_employee_status';
$route['statuspegawai/simpan_employee_status'] = 'Statuspegawai/simpan_employee_status';
$route['statuspegawai/rules_employee_status'] = 'Statuspegawai/rules_employee_status';
$route['statuspegawai/check_id'] = 'Statuspegawai/check_id';

$route['notifikasi'] = 'Notifikasi';
$route['notifikasi/alarm_index'] = 'Notifikasi/alarm_index';
$route['notifikasi/tabel_notifikasi'] = 'Notifikasi/tabel_notifikasi';
$route['notifikasi/simpan_notifikasi'] = 'Notifikasi/simpan_notifikasi';
$route['notifikasi/detail_notifikasi'] = 'Notifikasi/detail_notifikasi';
$route['notifikasi/hapus_notifikasi'] = 'Notifikasi/hapus_notifikasi';
$route['notifikasi/kirim_notifikasi'] = 'Notifikasi/kirim_notifikasi';
$route['notifikasi/simpan_alarm'] = 'Notifikasi/simpan_alarm';

$route['reportbulanan'] = 'Reportbulanan';
$route['reportbulanan/index'] = 'Reportbulanan/index';
$route['reportbulanan/report/get_bulanan'] = 'Reportbulanan/get_report_bulanan';
