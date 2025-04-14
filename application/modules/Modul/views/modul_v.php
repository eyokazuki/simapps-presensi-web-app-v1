<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('partials/header');
?>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- Website Analytics -->
        <div class="col-lg-12 mb-4">
            <div class="swiper-container swiper-container-horizontal swiper swiper-card-advance-bg">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-white mb-0 mt-2">
                                    <?= $nama_menu; ?>
                                </h5>
                                <small>Halaman List Modul</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <!-- Projects table -->
        <div class="col-12 col-xl-12 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
            <div class="card">
                <div class="mt-4">
                    <?php
                    if ($create_akses) {
                    ?>
                        <h5 class="card-title">
                            <button class="btn btn-primary btn-sm" onclick="tambahModul()" data-bs-toggle='tooltip' data-bs-placement='top' data-bs-original-title='Tambah Modul'>
                                <i class="ti ti-pencil-plus"></i> &nbsp;MODUL&nbsp;&nbsp;
                            </button>
                        </h5>
                    <?php
                    }
                    ?>
                </div>
                <div class="card-datatable table-responsive mt-4">
                    <input type="text" class="form-control" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">
                    <table id="tabel_modul" class="dt-responsive table table-striped table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Aksi</th>
                                <th class="text-center">Menu</th>
                                <th class="text-center">Controller</th>
                                <th class="text-center">Icon</th>
                                <th class="text-center">Breadcumb</th>
                                <th class="text-center">Has Child</th>
                                <th class="text-center">Is Child</th>
                                <th class="text-center">Is Menu</th>
                                <th class="text-center">Need Auth</th>
                                <th class="text-center">Parent</th>
                                <th class="text-center">Urutan</th>
                                <th class="text-center">Sorts</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Projects table -->
    </div>
</div>

<!-- Modal Form -->
<div class="modal fade" id="ModalForm" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="header_title">Form</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="needs-validation was-validated" novalidate="" id="form_modal" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Menu</label>
                                <input type="hidden" class="form-control add-modul" id="id" name="id" placeholder="MENU" required>
                                <input type="hidden" class="form-control add-modul" id="tipe" name="tipe" placeholder="MENU" required>
                                <input type="text" class="form-control add-modul" id="menu" name="menu" placeholder="MENU" required>
                                <small class="form-text text-muted">
                                    Menu harus diisi dan maksimal 100 karakter.
                                </small>
                                <div class="invalid-feedback">
                                    Menu harus diisi
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Control</label>
                                <input type="text" class="form-control add-modul" id="control" name="control" placeholder="CONTROL" required>
                                <small class="form-text text-muted">
                                    Control harus diisi dan maksimal 100 karakter.
                                </small>
                                <div class="invalid-feedback">
                                    Control harus diisi
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Icon</label>
                                <input type="text" class="form-control add-modul" id="icon" name="icon" placeholder="ICON" required>
                                <small class="form-text text-muted">
                                    Icon harus diisi dan maksimal 100 karakter.
                                </small>
                                <div class="invalid-feedback">
                                    Icon harus diisi
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Breadcumb</label>
                                <input type="text" class="form-control add-modul" id="breadcumb" name="breadcumb" placeholder="BREADCUMB" required>
                                <small class="form-text text-muted">
                                    Breadcumb harus diisi dan maksimal 100 karakter.
                                </small>
                                <div class="invalid-feedback">
                                    Breadcumb harus diisi
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <div class="control-label">Is Menu</div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_menu" name="is_menu" checked required>
                                    <label class="form-check-label">Ya</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <div class="control-label">Auth</div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="need_auth" name="need_auth" checked required>
                                    <label class="form-check-label">Ya</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Struktur Menu</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input check-struktur" value="1" type="radio" id="single_header" name="struktur" checked required>
                                    <label class="form-check-label">None</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input check-struktur" type="radio" value="2" id="parent_header" name="struktur" checked required>
                                    <label class="form-check-label">Parent</label>
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input check-struktur" type="radio" value="3" id="child_header" name="struktur" checked required>
                                    <label class="form-check-label">Child</label>
                                </div>
                                <small class="form-text text-muted">
                                    Struktur Menu pilih salah satu antara None, Parent atau Child.
                                </small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Parent</label>
                                <select type="text" style="width:100%" class="form-control select2 add-modul" id="parent" name="parent" disabled>
                                    <option value="">Pilih Parent</option>
                                </select>
                                <small class="form-text text-muted">
                                    Jika Struktur Menu adalah Child maka harus pilih salah satu Parent.
                                </small>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Urutan</label>
                                <input type="text" class="form-control numeric add-modul" id="urutan" name="urutan" placeholder="URUTAN">
                                <small class="form-text text-muted">
                                    Urutan harus diisi dan hanya angka.
                                </small>
                                <div class="invalid-feedback">
                                    Urutan harus diisi dan berupa angka
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-label-secondary btn-sm" type="button" data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary submit btn-sm" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('partials/footer'); ?>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                "<?php echo csrf_name(); ?>": $("#_token").val()
            }
        });

        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        tabel_modul();

        $('#ModalForm').on('shown.bs.modal', function() {
            $('#menu').focus();
        });
    });

    function tabel_modul() {
        var t = $('#tabel_modul')
            .off('click ')
            .on('xhr.dt', function(e, settings, json, xhr) {
                generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
            })
            .dataTable({
                'responsive': true,
                'paging': true,
                'destroy': true,
                'processing': true,
                "language": {
                    "processing": '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
                },
                'serverSide': true,
                'ajax': {
                    "url": "modul/tabel_modul",
                    "type": "POST",
                    "dataType": "JSON",
                    "error": function(response) {
                        invalid_token(response);
                    }
                },
                "columnDefs": [{
                        "searchable": false,
                        "targets": 0,
                        "width": 50,
                        "targets": 0
                    },
                    {
                        "width": 100,
                        "targets": 9
                    },
                    {
                        "targets": 12,
                        "visible": false
                    },
                    {
                        "targets": [11],
                        "width": 150
                    },
                    {
                        "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 12],
                        "orderable": false
                    },
                    {
                        "targets": [0, 5, 6, 7, 8, 9, 10, 12],
                        "className": "text-center"
                    },
                    {
                        "targets": [4, 5, 11],
                        "className": "none"
                    }
                ],
                // 'scrollX'       : true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                // "pageLength"    : 10,
                "rowCallback": function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            });
        get_parent_modul();
    }

    function hapus(id) {
        swal({
                title: "Hapus Modul?",
                text: "Yakin ingin hapus Modul ini !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((isConfirm) => {
                if (isConfirm) {
                    loadingShow();
                    $.ajax({
                        url: "modul/hapus_modul",
                        type: "POST",
                        data: {
                            id: id
                        },
                        dataType: "JSON",
                        success: function(data, status, xhr) {
                            generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));

                            loadingHide();
                            if (data.kode == 1) {
                                tabel_modul();
                            }
                            swal(data.header, data.response, data.tipenotif);
                        },
                        error: function(response) {
                            invalid_token(response);
                            loadingHide();
                            swal("Gagal !", "Modul gagal dihapus", "error");
                        }
                    });
                }
            });
    }

    $(".check-struktur").click(function() {
        if ($(this).val() == 3) {
            $("#parent").prop("disabled", false);
        } else {
            $("#parent").prop("disabled", true);
            $("#parent").val("").select2({
                dropdownCssClass: "increasedzindexclass"
            });
        }
    });

    function get_parent_modul() {
        $.ajax({
            url: "modul/get_parent_modul",
            type: "POST",
            success: function(data, status, xhr) {
                generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
                $("#parent").html(data);
            },
            error: function(response) {
                invalid_token(response);
                console.log(response);
            }
        });
    }

    function detail_modul(id) {
        $.ajax({
            url: "modul/detail_modul",
            type: "POST",
            data: {
                id: id
            },
            dataType: "JSON",
            success: function(data, status, xhr) {
                generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
                $("#menu").val(data.menu);
                $("#control").val(data.control);
                $("#icon").val(data.icon);
                $("#breadcumb").val(data.breadcumb);
                $("#urutan").val(data.urutan);
                $("#menu").val(data.menu);
                $("#parent").html(data.option).select2({
                    dropdownCssClass: "increasedzindexclass"
                });
                $("#parent").val(data.parent).select2({
                    dropdownCssClass: "increasedzindexclass"
                });
                if (data.struktur == 1) {
                    $("#single_header").prop("checked", true);
                    $("#parent").prop("disabled", true);
                } else if (data.struktur == 2) {
                    $("#parent_header").prop("checked", true);
                    $("#parent").prop("disabled", true);
                } else if (data.struktur == 3) {
                    $("#child_header").prop("checked", true);
                    $("#parent").prop("disabled", false);
                }
                if (data.is_menu == 1) {
                    $("#is_menu").prop("checked", true);
                } else {
                    $("#is_menu").prop("checked", false);
                }

                if (data.need_auth == 1) {
                    $("#need_auth").prop("checked", true);
                } else {
                    $("#need_auth").prop("checked", false);
                }
                $("#id").val(id);
                $("#tipe").val("2");
                $("#header_title").html("Form Update Modul");
                $("#ModalForm").modal("show");
            },
            error: function(response) {
                invalid_token(response);
                console.log(response);
            }
        });
    }

    function tambahModul() {
        loadingShow()
        loadingHide();
        $(".add-modul").val("");
        $(".select2").val("").select2({
            dropdownParent: $('#ModalForm'),
        });
        $("#is_menu").prop("checked", true);
        $("#need_auth").prop("checked", true);
        $("#single_header").prop("checked", true);
        $("#parent").prop("disabled", true);
        $("#tipe").val("1");
        $("#header_title").html("Form Tambah Modul");
        $("#ModalForm").modal("show");
    }

    $("#form_modal").submit(function(e) {
        e.preventDefault();
        loadingShow();
        $("#ModalForm").modal("hide");
        var postData = $(this).serializeArray();

        $.ajax({
            url: "modul/simpan_modul",
            type: "POST",
            data: postData,
            dataType: "JSON",
            success: function(data, status, xhr) {
                generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
                loadingHide();
                if (data.kode == 1) {
                    tabel_modul();
                } else {
                    setTimeout(function() {
                        $("#ModalForm").modal("show");
                    }, 500);
                }
                swal(data.header, data.response, data.tipenotif);
            },
            error: function(response) {
                invalid_token(response);
                setTimeout(function() {
                    $("#ModalForm").modal("show");
                }, 500);
                loadingHide();
                swal("Gagal", "Modul gagal disimpan", "error");
            }
        });

    });

    new Cleave(".numeric", {
        numeral: true,
    });
</script>