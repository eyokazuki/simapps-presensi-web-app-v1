<?php

use Mpdf\Mpdf;

defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    private $ses;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("report_m", "dbmodels");
        $this->load->library('globalfungsi');
        // $this->load->library('email');
        $this->load->library('pdf');
    }

    public function index()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        $urlnya = $url['query'];
        $asal_enkripsi = $this->encryption->decrypt($urlnya);

        $data['ses']            = $this->ses;
        $data['urlnya']            = $urlnya;
        $data['asal']            = $asal_enkripsi;

        $data['sekarang']       = $this->globalfungsi->tgl_indonesia($asal_enkripsi);

        $this->load->view('v_report', $data);
    }

    public function getchart_absen()
    {
        header('Content-Type: application/json');
        $tanggal = $this->input->post("tanggal");
        $list = $this->dbmodels->getchart_absen($tanggal)->result();
        $departemen = array();
        $absen = array();
        $absentidak = array();
        foreach ($list as $arr) {
            // $departemen[] = $arr->inisial;
            // $absen[] = (int)$arr->absen;
            // $absentidak[] = (int)$arr->absentidak;
            $total = (int)$arr->absen + (int)$arr->absentidak;
            $departemen[] = $arr->inisial;
            $absen[] = round((int)$arr->absen / $total * 100);
            $absentidak[] = round((int)$arr->absentidak / $total * 100);
        }
        $output = array("departemen" => $departemen, "absen" => $absen, "absentidak" => $absentidak);
        echo json_encode($output);
    }
    public function getchart_sehat()
    {
        header('Content-Type: application/json');
        $tanggal = $this->input->post("tanggal");
        $list = $this->dbmodels->getchart_sehat($tanggal)->result();
        $departemen = array();
        $sehat = array();
        $sehattidak = array();
        foreach ($list as $arr) {
            $total = (int)$arr->sehat + (int)$arr->sehattidak;
            $departemen[] = $arr->inisial;
            $sehat[] = $arr->sehat == 0 ? 0 : round((int)$arr->sehat / $total * 100);
            $sehattidak[] = $arr->sehattidak == 0 ? 0 : round((int)$arr->sehattidak / $total * 100);
            // $departemen[] = $arr->inisial;
            // $sehat[] = (int)$arr->sehat;
            // $sehattidak[] = (int)$arr->sehattidak;
        }
        $output = array("departemen" => $departemen, "sehat" => $sehat, "sehattidak" => $sehattidak);
        echo json_encode($output);
    }

    public function getchart_lokasi()
    {
        header('Content-Type: application/json');
        $tanggal = $this->input->post("tanggal");
        $list = $this->dbmodels->getchart_lokasi()->result();
        $id_lokasi_kerja = array();
        $id_status_kerja = array();
        $status = array();
        $nume   = array();
        $jumlahData = 0;
        foreach ($list as $arr) {
            $id_status_kerja[] = $arr->id_status_kerja;
            $id_lokasi_kerja[] = $arr->id_lokasi_kerja;
            $status[] = $arr->status;
            $list2 = $this->dbmodels->getchart_lokasi2($arr->id_status_kerja, $arr->id_lokasi_kerja, $tanggal);
            // if ($list2->num_rows() > 0) {
            //     $ngantuk = $list2->row();
            //     $nume[] = (int)$ngantuk->jumlah;
            // } else {
            //     $nume[] = (int)0;
            // }
            if ($list2->num_rows() > 0) {
                $ngantuk = $list2->row();
                $nume[] = (int)$ngantuk->jumlah;
                $jumlahData += (int)$ngantuk->jumlah;
            } else {
                $nume[] = (int)0;
                $jumlahData += 0;
            }
        }
        foreach ($nume as $key => $value) {
            $nume[$key] = $value == 0 ? 0 : round($value / $jumlahData * 100);
        }
        $output = array("status" => $status, "jumlah" => $nume);
        echo json_encode($output);
    }

    public function send_email()
    {
        $tanggal = date('Y-m-d');
        $tanggal_enkripsi = $this->encryption->encrypt($tanggal);

        $url = parse_url(base_url('report?' . $tanggal_enkripsi . ''));

        $urlnya = $url['query'];
        $asal_enkripsi = $this->encryption->decrypt($urlnya);

        $data['ses']            = $this->ses;
        $data['urlnya']            = $urlnya;
        $data['asal']            = $tanggal;

        $data['sekarang']       = $this->globalfungsi->tgl_indonesia($tanggal);

        return $this->load->view('new_v_report', $data);
    }

    public function generateEmailConfig()
    {
        $config['mailtype']  = 'html';
        $config['charset']   = 'utf-8';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.hostinger.com';
        $config['smtp_port'] = 465; // Change to the appropriate SMTP port
        $config['smtp_user'] = 'job.simenggaris@job-simenggaris.com';
        $config['smtp_pass'] = 'JOB!Simenggaris2023!';
        $config['smtp_crypto'] = 'ssl';

        return $config;
    }

    public function send_report()
    {
        ini_set('max_execution_time', 86400000);

        // Set config email
        $config = $this->generateEmailConfig();
        $this->load->library('email', $config);

        // Set body email
        $tanggal = date('Y-m-d');
        $tanggal_indo = $this->globalfungsi->tgl_indonesia($tanggal);
        $email_subject      = 'Laporan Absensi Pekerja [' . $tanggal_indo . ']';
        $message            = 'Dengan hormat, <br>Berikut kami lampirkan berkas untuk memantau Absensi Pekerja pada ' . $tanggal_indo . '.<br><br>';
        $email_pengirim     = 'job.simenggaris@job-simenggaris.com';

        // Set attachments
        $json_data = $this->input->raw_input_stream;
        $data = json_decode($json_data, true);
        $file = $data['file'];
        // $file = "<h1>hello</h1>";

        // Generate pdf
        $pdfFilePath = FCPATH . 'assets/report/email/' . str_replace(" ", "_", 'Laporan Absensi Pekerja_' . $tanggal_indo) . '.pdf';
        
        $dompdf = $this->pdf->instance();
        $dompdf->loadHtml($file);
        $dompdf->render();
        $pdfOutput = $dompdf->output();
        file_put_contents($pdfFilePath, $pdfOutput);

        // send email
        $listPenerima = $this->dbmodels->get_penerima()->result();
        $email_penerima = array();
        foreach ($listPenerima as $arr) {
            $email_penerima[] = $arr->mailreport;
        }
        $this->email->from($email_pengirim, 'Job Simenggaris');
        $this->email->subject($email_subject);
        $this->email->message($message);
        $this->email->attach($pdfFilePath);
        $this->email->to(implode(',', $email_penerima));
        $this->email->send();

        $response = ['message' => "oke"];
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function send_report2()
    {
        ini_set('max_execution_time', 86400000);
        $file = $_FILES['pdf'];
        $config['mailtype']  = 'html';
        $config['charset']   = 'utf-8';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.hostinger.com';
        $config['smtp_port'] = 465; // Change to the appropriate SMTP port
        $config['smtp_user'] = 'job.simenggaris@job-simenggaris.com';
        $config['smtp_pass'] = 'JOB!Simenggaris2023!';
        $config['smtp_crypto'] = 'ssl';

        $this->load->library('email', $config);
        $tanggal = date('Y-m-d');
        $tanggal_indo = $this->globalfungsi->tgl_indonesia($tanggal);
        $email_subject      = 'Laporan Absensi Pekerja [' . $tanggal_indo . ']';
        $message            = 'Dengan hormat, <br>Berikut kami lampirkan berkas untuk memantau Absensi Pekerja pada ' . $tanggal_indo . '.<br><br>';
        $email_pengirim     = 'job.simenggaris@job-simenggaris.com';
        $this->email->from($email_pengirim, 'Job Simenggaris');
        $this->email->subject($email_subject);
        $this->email->message($message);

        if (!empty($file['tmp_name']) && file_exists($file['tmp_name'])) {
            // Define the attachment's filename and MIME type
            $attachmentFileName = $file['name'];
            $attachmentMimeType = $file['type'];

            // Add the attachment to the email
            $this->email->attach($file['tmp_name'], $attachmentMimeType, $attachmentFileName);
        }

        $listPenerima = $this->dbmodels->get_penerima()->result();
        $email_penerima = array();
        foreach ($listPenerima as $arr) {
            $email_penerima[] = $arr->mailreport;
        }
        $this->email->to(implode(',', $email_penerima));
        if ($this->email->send()) {
            $sudah = true;
        } else {
            $sudah = false;
        }

        echo json_encode(["status" => $sudah]);
    }

    private function sendEmailWithAttachment($pdfContent)
    {
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'trialsimenggaris@gmail.com',  // Email gmail
            'smtp_pass'   => 'sxxfofyrmuovlzvb',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);
        // $this->email->initialize(array(
        //     // 'protocol' => 'smtp',
        //     // 'smtp_host' => 'smtp.gmail.com',
        //     // 'smtp_user' => 'simenggarisuss@gmail.com',
        //     // 'smtp_pass' => 'simenggariS100%',
        //     // 'mailtype' => 'html',
        //     // 'charset' => 'utf-8',
        //     // 'smtp_port'   => 587,
        //     'mailtype'  => 'html',
        //     'charset'   => 'utf-8',
        //     'protocol'  => 'smtp',
        //     'smtp_host' => 'smtp.gmail.com',
        //     'smtp_user' => 'trialsimenggaris@gmail.com',  // Email gmail
        //     'smtp_pass'   => 'sxxfofyrmuovlzvb',  // Password gmail
        //     'smtp_crypto' => 'ssl',
        //     'smtp_port'   => 465,
        //     'crlf'    => "\r\n",
        //     'newline' => "\r\n"
        // ));

        $this->email->from('trialsimenggaris@gmail.com', 'JOB Simenggaris');
        $this->email->to('eyokazuki@gmail.com');

        $this->email->subject('PDF Attachment');
        $this->email->message('Please find the attached PDF.');

        // Attach the PDF file
        $this->email->attach($pdfContent, 'attachment.pdf', 'application/pdf');

        if ($this->email->send()) {
            echo 'Email sent successfully';
        } else {
            show_error($this->email->print_debugger());
        }
    }


    public function send_email2()
    {

        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'trialsimenggaris@gmail.com',  // Email gmail
            'smtp_pass'   => 'sxxfofyrmuovlzvb',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        $tanggal = date('Y-m-d');
        $tanggal_enkripsi = $this->encryption->encrypt($tanggal);
        $tanggal_indo = $this->globalfungsi->tgl_indonesia($tanggal);
        $listPenerima = $this->dbmodels->get_penerima()->result();
        $email_subject      = 'Laporan Absensi Pekerja [' . $tanggal_indo . ']';
        $message            = 'Dengan hormat, <br>Berikut kami lampirkan Link/tautan untuk memantau Absensi Pekerja pada ' . $tanggal_indo . '.<br><br>' . base_url('report?' . $tanggal_enkripsi . '') . '';
        $email_pengirim     = 'trialsimenggaris@gmail.com';
        $sudah = '';
        foreach ($listPenerima as $arr) {
            $email_penerima     = $arr->mailreport;

            // Konfigurasi email

            // Email dan nama pengirim
            $this->email->from($email_pengirim, 'Job Simenggaris');

            // Email penerima
            $this->email->to($email_penerima); // Ganti dengan email tujuan

            // Lampiran email, isi dengan url/path file
            //$this->email->attach(base_url('report?'.$tanggal_enkripsi.''));

            // Subject email
            $this->email->subject($email_subject);

            // Isi email
            // $this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.<br><br> Klik <strong><a href='https://masrud.com/kirim-email-codeigniter/' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");
            $this->email->message($message);

            // Tampilkan pesan sukses atau error
            if ($this->email->send()) {
                $sudah = $email_penerima . "-OK<br>";
            } else {
                $sudah = $email_penerima . "-Gagal<br>";
            }
        }
    }
}
