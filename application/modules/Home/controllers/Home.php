<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("home_m", "dbmodels");
        $this->auth->authlog();
    }

    public function index()
    {
        $setting                 = $this->auth->getSetting();
        $icon                     = $this->auth->getIcon();
        $data                     = array_merge($setting, $icon);

        $this->load->view('home_v', $data);
    }

    public function get_contact()
    {
        $db         = $this->dbmodels->get_contact();

        $output     = array(
            "kontak"    => 0
        );

        if ($db->num_rows() > 0) {
            $data   = $db->row();
            $output = array(
                "kontak"    => $data->jml
            );
        }

        echo json_encode($output);
    }

    public function get_inbox()
    {
        $db         = $this->dbmodels->get_inbox();

        $output     = array(
            "inbox"    => 0
        );

        if ($db->num_rows() > 0) {
            $data   = $db->row();
            $output = array(
                "inbox"    => $data->jml
            );
        }

        echo json_encode($output);
    }

    public function get_outbox()
    {
        $db         = $this->dbmodels->get_outbox();
        $outbox     = 0;
        $progress   = 0;
        $pending    = 0;


        if ($db->num_rows() > 0) {
            $data       = $db->row();
            $outbox     = $data->jml;
        }

        $params      = array(
            "status" => 0
        );

        $db         = $this->dbmodels->get_outbox_pending($params);
        if ($db->num_rows() > 0) {
            $data       = $db->row();
            $pending    = $data->jml;
        }

        if ($outbox > 0) {
            $progress     = (($outbox - $pending) / $outbox) * 100;
        } else {
            $progress     = '100';
        }

        $output     = array(
            "outbox"    => $outbox,
            "progress"  => $progress . "%"
        );

        echo json_encode($output);
    }

    public function get_broadcast()
    {
        $db         = $this->dbmodels->get_broadcast();
        $broadcast     = 0;
        $progress   = 0;
        $pending    = 0;


        if ($db->num_rows() > 0) {
            $data       = $db->row();
            $broadcast     = $data->jml;
        }

        $params      = array(
            "status" => 0
        );

        $db         = $this->dbmodels->get_broadcast_pending($params);
        if ($db->num_rows() > 0) {
            $data       = $db->row();
            $pending    = $data->jml;
        }

        if ($broadcast > 0) {
            $progress     = (($broadcast - $pending) / $broadcast) * 100;
        } else {
            $progress     = '100';
        }

        $output     = array(
            "broadcast"    => $broadcast,
            "progress"  => $progress . "%"
        );

        echo json_encode($output);
    }

    // {
    //     name: 'Pesan Masuk',
    //     data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
    // }, {
    //     name: 'Pesan Keluar',
    //     data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
    // }, {
    //     name: 'Pesan Broadcast',
    //     data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
    // }, {
    //     name: 'Pesan Pending',
    //     data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
    // },
    public function get_graphic_harian()
    {
        $tahun              = $this->input->get('tahun');
        $bulan              = $this->input->get('bulan');
        $bulan              = $bulan < 10 ? '0' . $bulan : $bulan;
        $jml_hari           = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        /* Data Pesan Masuk*/
        $data_pesan_masuk   = $this->dbmodels->get_pesan_masuk_harian($tahun . "-" . $bulan);
        $data_inbox         = array();

        for ($i = 1; $i <= $jml_hari; $i++) {
            foreach ($data_pesan_masuk->result() as $a) {
                if ($i == intval($a->tanggal)) {
                    $data_inbox[$i - 1]   = intval($a->jml);
                }
            }

            if (!array_key_exists(($i - 1), $data_inbox)) {
                $data_inbox[($i - 1)]   = 0;
            }
        }

        $pesan_masuk    = array(
            "name"  => "Pesan Masuk",
            "data"  => $data_inbox
        );


        /*Data Pesan Keluar*/
        $data_pesan_keluar   = $this->dbmodels->get_pesan_keluar_harian($tahun . "-" . $bulan);
        $data_outbox        = array();

        for ($i = 1; $i <= $jml_hari; $i++) {
            foreach ($data_pesan_keluar->result() as $a) {
                if ($i == intval($a->tanggal)) {
                    $data_outbox[$i - 1]   = intval($a->jml);
                }
            }

            if (!array_key_exists(($i - 1), $data_outbox)) {
                $data_outbox[($i - 1)]   = 0;
            }
        }

        $pesan_keluar       = array(
            "name"  => "Pesan Keluar",
            "data"  => $data_outbox
        );

        /*Data Pesan Broadcast*/
        $data_pesan_broadcast   = $this->dbmodels->get_pesan_broadcast_harian($tahun . "-" . $bulan);
        $data_broadcast        = array();

        for ($i = 1; $i <= $jml_hari; $i++) {
            foreach ($data_pesan_broadcast->result() as $a) {
                if ($i == intval($a->tanggal)) {
                    $data_broadcast[$i - 1]   = intval($a->jml);
                }
            }

            if (!array_key_exists(($i - 1), $data_broadcast)) {
                $data_broadcast[($i - 1)]   = 0;
            }
        }

        $pesan_broadcast       = array(
            "name"  => "Pesan Broadcast",
            "data"  => $data_broadcast
        );

        $output   = array(
            "data_harian"   => array(
                $pesan_masuk,
                $pesan_keluar,
                $pesan_broadcast

            )
        );

        echo json_encode($output);
    }
}
