<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('partials/header');

?>

<div class="container-xxl container-p-y">
    <div class="misc-wrapper">
        <h2 class="mb-1 mx-2">You are not authorized!</h2>
        <p class="mb-4 mx-2">
            You do not have permission to view this page using the credentials that you have provided while login. <br />
            Please contact your site administrator.
        </p>
        <a href="<?= base_url(); ?>" class="btn btn-primary mb-4">Back to home</a>
        <div class="mt-4">
            <!-- <img src="assets/img/illustrations/page-misc-you-are-not-authorized.png" alt="page-misc-not-authorized" width="170" class="img-fluid" /> -->
        </div>
    </div>
</div>
<div class="container-fluid misc-bg-wrapper">
    <img src="<?= base_url('assets/img/illustrations/bg-shape-image-light.png'); ?>" alt="page-misc-not-authorized" data-app-light-img="illustrations/bg-shape-image-light.png" data-app-dark-img="illustrations/bg-shape-image-dark.png" />
</div>
<!-- /Not Authorized -->

<?php
$this->load->view('partials/footer');

?>