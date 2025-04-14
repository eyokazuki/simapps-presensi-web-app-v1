<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>dashboard">
        <img src="<?= base_url(); ?>assets/img/logo_kecil.png" alt="logo" class="logo-brand-nav">
      </a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>dashboard">

        <img src="<?= base_url(); ?>assets/img/logo_kecil_1.png" alt="logo" class="logo-brand-sidebar">

      </a>
    </div>
    <ul class=" sidebar-menu mt-4">
      <!-- <li class="menu-header">Menu</li> -->
      <?= $menuSideBar; ?>
    </ul>
  </aside>
</div>

<!-- LOGOUT MODAL -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin keluar dari aplikasi ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih "Keluar" jika ingin keluar dari aplikasi sekarang.</div>
      <div class="modal-footer">
        <button class="btn btn-warning" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-info logout" href="#">Keluar</a>
      </div>
    </div>
  </div>
</div>

<!-- CHANGE PASSWORD MODAL -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form class="needs-validation" id="formchangepass" method="POST" novalidate="">
        <div class="modal-body">
          <div class="form-group">
            <label>Password Lama</label>
            <input type="text" class="form-control" id="_token_" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">
            <input type="password" class="form-control change-pass" id="a_old_pass" name="a_old_pass" placeholder="PASSWORD LAMA" required>
            <div class="invalid-feedback">
              Password Lama harus diisi
            </div>
          </div>
          <div class="form-group">
            <label>Password Baru</label>
            <input type="password" class="form-control change-pass" id="a_new_pass" name="a_new_pass" placeholder="PASSWORD BARU" required>
            <div class="invalid-feedback">
              Password Baru harus diisi
            </div>
          </div>
          <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" class="form-control change-pass" id="a_konf_pass" name="a_konf_pass" placeholder="KONFIRMASI PASSWORD BARU" required>
            <div class="invalid-feedback">
              Konfirmasi Password harus diisi
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-warning" type="button" data-dismiss="modal">Batal</button>
          <button class="btn btn-info submitChangePassword" type="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- LOADING MODAL -->
<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog text-center" role="document" style="margin-top:200px">
    <!-- <img src="<?= base_url(); ?>assets/img/1486.gif" style="width: 150px;height: 150px"> -->
    <img src="<?= base_url(); ?>assets/img/loading.gif" style="width: 250px;height: 150px">
    <!-- <img src="<?= base_url(); ?>assets/img/spinner_transparent_color.gif" style="width: 150px;height: 150px"> -->
  </div>
</div>