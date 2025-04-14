<?php
defined('BASEPATH') or exit('No direct script access allowed');
// $this->load->view('dist/_partials/header');
$this->load->view('partials/header');

?>

<title>.:: Access Denied ::.</title>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <!-- <h3 class="box-title">Data List User </h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            </div>
        </div>
    </section>
</div>

<div class="main-content">
    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="row" style="margin:10px 0px">
                                <div class="col-md-12 cols-xs-12 text-center">
                                    <p><span><label></label></span>
                                    <h1 style="font-size:30px;font-weight:bold">Maaf anda tidak memiliki izin untuk mengakses halaman ini</h1>
                                    </p>
                                    <p><span><label></label></span>
                                    <h1 style="font-size:20px;font-weight:bold">Keterangan lebih lanjut silahkan hubungi administrator</h1>
                                    </p>
                                    <img src="<?php echo base_url(); ?>assets/img/access_denied.jpg" title="error" style="width:350px;height:400px" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
// $this->load->view('dist/_partials/footer');
$this->load->view('partials/footer');

?>