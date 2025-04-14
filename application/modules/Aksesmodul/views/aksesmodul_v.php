<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('partials/header');
?>

<!-- Content -->
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
                                <small>Halaman Akses Modul</small>
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
                <div class="card-body pb-0">
                    <div class="row mb-4 mt-5">
                        <div class="col-lg-2">
                            <label>Privilege</label>
                        </div>
                        <div class="col-lg-5">
                            <select type="text" class="form-control select2" style="width:100% !important;" id="privilege" name="privilege">
                                <?php echo $optionPriv; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-datatable table-responsive mt-4">
                    <input type="text" class="form-control" id="_token" name="<?php echo csrf_name(); ?>" value="<?php echo csrf_token(); ?>" style="display: none">
                    <table id="tabel_modul" class="dt-responsive table table-striped table-hover" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Parent Modul</th>
                                <th class="text-center">Child Modul</th>
                                <th class="text-center">Aksi</th>
                                <th class="text-center">Create</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Hapus</th>
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
<!-- / Content -->

<?php $this->load->view('partials/footer'); ?>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                "<?php echo csrf_name(); ?>": $("#_token").val()
            }
        });

        $(".select2").select2();

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

        // $(".select2").select2();


        tabel_modul("");
    });

    $("#privilege").change(function() {
        tabel_modul($(this).val());
    });

    function tabel_modul(id) {
        var t2 = $('#tabel_modul')
            .off('click ')
            .on('xhr.dt', function(e, settings, json, xhr) {
                generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
            })
            .dataTable({
                'paging': false,
                'destroy': true,
                'processing': true,
                'ajax': {
                    "url": "aksesmodul/tabel_modul",
                    "type": "POST",
                    "dataType": "JSON",
                    "data": {
                        "priv": id
                    },
                    "error": function(response) {
                        invalid_token(response);
                    }
                },
                'columns': [{
                        "data": "no"
                    },
                    {
                        "data": "parent"
                    },
                    {
                        "data": "child"
                    },
                    {
                        "data": "action"
                    },
                    {
                        "data": "create_action"
                    },
                    {
                        "data": "edit_action"
                    },
                    {
                        "data": "delete_action"
                    },
                ],
                "columnDefs": [{
                        "width": 50,
                        "targets": 0,
                        "orderable": false,
                        "searchable": false,
                    },
                    {
                        "targets": [1, 2],
                        "orderable": false
                    },
                    {
                        "width": 100,
                        "targets": [3, 4, 5, 6],
                        "orderable": false
                    },
                    {
                        "targets": [0, 3, 4, 5, 6],
                        "className": "text-center"
                    },
                ],
                'lengthChange': false,
                'pageLength': 100,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                "rowCallback": function(row, data, iDisplayIndex) {
                    var info = this.fnPagingInfo();
                    var page = info.iPage;
                    var length = info.iLength;
                    var index = page * length + (iDisplayIndex + 1);
                    $('td:eq(0)', row).html(index);
                }
            });
    }

    function cekthis(id) {
        console.log(id);
        var val = "0";

        if ($("#" + id).is(":checked")) {
            val = "1";
        }

        $.ajax({
            url: "aksesmodul/update_akses_modul",
            type: "POST",
            data: {
                id: id,
                value: val
            },
            dataType: "JSON",
            success: function(data, status, xhr) {
                generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));
                if (data.kode != 1) {
                    if (val == 0) {
                        $("#" + id).prop("checked", true);
                        $("#1_" + id).prop("checked", true);
                        $("#2_" + id).prop("checked", true);
                        $("#3_" + id).prop("checked", true);
                        $("#1_" + id).prop("disabled", false);
                        $("#2_" + id).prop("disabled", false);
                        $("#3_" + id).prop("disabled", false);
                    } else {
                        $("#" + id).prop("checked", false);
                        $("#1_" + id).prop("checked", false);
                        $("#2_" + id).prop("checked", false);
                        $("#3_" + id).prop("checked", false);
                        $("#1_" + id).prop("disabled", true);
                        $("#2_" + id).prop("disabled", true);
                        $("#3_" + id).prop("disabled", true);
                    }
                    swal(data.header, data.response, data.tipenotif);
                } else {
                    if (val == 0) {
                        $("#1_" + id).prop("checked", false);
                        $("#2_" + id).prop("checked", false);
                        $("#3_" + id).prop("checked", false);
                        $("#1_" + id).prop("disabled", true);
                        $("#2_" + id).prop("disabled", true);
                        $("#3_" + id).prop("disabled", true);
                    } else {
                        $("#1_" + id).prop("checked", true);
                        $("#2_" + id).prop("checked", true);
                        $("#3_" + id).prop("checked", true);
                        $("#1_" + id).prop("disabled", false);
                        $("#2_" + id).prop("disabled", false);
                        $("#3_" + id).prop("disabled", false);
                    }
                }
            },
            error: function(response) {
                invalid_token(response);
                if (val == 0) {
                    $("#" + id).prop("checked", true);
                    $("#1_" + id).prop("checked", true);
                    $("#2_" + id).prop("checked", true);
                    $("#3_" + id).prop("checked", true);
                    $("#1_" + id).prop("disabled", false);
                    $("#2_" + id).prop("disabled", false);
                    $("#3_" + id).prop("disabled", false);
                } else {
                    $("#" + id).prop("checked", false);
                    $("#1_" + id).prop("checked", false);
                    $("#2_" + id).prop("checked", false);
                    $("#3_" + id).prop("checked", false);
                    $("#1_" + id).prop("disabled", true);
                    $("#2_" + id).prop("disabled", true);
                    $("#3_" + id).prop("disabled", true);
                }
                swal("Gagal", "Privilege gagal diupdate", "error");
            }
        });
    }

    function cekthisupdate(id) {
        var val = "0";

        if ($("#" + id).is(":checked")) {
            val = "1";
        }

        $.ajax({
            url: "aksesmodul/update_akses",
            type: "POST",
            data: {
                id: id,
                value: val
            },
            dataType: "JSON",
            success: function(data, status, xhr) {
                generate_token(xhr.getResponseHeader("<?php echo csrf_name(); ?>"));

                if (data.kode != 1) {
                    if (val == 0) {
                        $("#" + id).prop("checked", true);
                    } else {
                        $("#" + id).prop("checked", false);
                    }
                    swal(data.header, data.response, data.tipenotif);
                }
            },
            error: function(response) {
                invalid_token(response);
                if (val == 0) {
                    $("#" + id).prop("checked", true);
                } else {
                    $("#" + id).prop("checked", false);
                }
                swal("Gagal", "Akses Create gagal diupdate", "error");
            }
        });
    }
</script>