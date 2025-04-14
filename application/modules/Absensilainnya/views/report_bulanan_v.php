<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('assets/') ?>" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Grafik Absensi Pekerja Bulanan</title>


    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico') ?>" />


    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/fontawesome.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/tabler-icons.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/flag-icons.css') ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/core.css') ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/theme-default.css') ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/apex-charts/apex-charts.css') ?>" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/pages/cards-advance.css') ?>" />
    <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>
</head>

<body id="pdfContainer" class="bg-white">
    <div class="row">
        <div class="col-12">
            <h5 class="text-center">Grafik Kehadiran<br /><small>(<?= "$startDate - $endDate" ?>)</small></h5>
            <div id="grafikKehadiran" style="width: 200mm;margin-left: 5mm;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h5 class="text-center">Grafik Kesehatan<br /><small>(<?= "$startDate - $endDate" ?>)</small></h5>
            <div id="grafikKesehatan" style="width: 200mm;margin-left: 5mm;"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h5 class="text-center">Grafik Absensi<br /><small>(<?= "$startDate - $endDate" ?>)</small></h5>
            <div id="grafikAbsen" style="width: 200mm;margin-left: 5mm;"></div>
        </div>
    </div>
</body>
<script src="<?= base_url('assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>
<script>
    const colorGrafik = ['#3a86ff', '#2a9d8f', '#fb8500', "#e63946", "#8338ec", "#264653", "#bb9457"];

    const optionKehadiran = {
        series: <?= $seriesKehadiran ?>,
        chart: {
            type: 'bar',
            height: 485,
            stacked: true,
            animations: {
                enabled: false
            },
            width: '100%',
        },
        plotOptions: {
            bar: {
                // horizontal: true,
            },
        },
        colors: colorGrafik,
        xaxis: {
            categories: <?= $categoriesKehadiran ?>,
        },
        yaxis: {
            title: {
                text: undefined
            },
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        fill: {
            opacity: 1
        },
    }
    var grafikKehadiran = new ApexCharts(document.querySelector("#grafikKehadiran"), optionKehadiran);
    grafikKehadiran.render();

    const optionKesehatan = {
        series: <?= $seriesKesehatan ?>,
        chart: {
            type: 'bar',
            height: 485,
            stacked: true,
            animations: {
                enabled: false
            },
            width: '100%',
        },
        plotOptions: {
            bar: {
                // horizontal: true,
            },
        },
        colors: colorGrafik,
        xaxis: {
            categories: <?= $categoriesKesehatan ?>,
        },
        yaxis: {
            title: {
                text: undefined
            },
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        fill: {
            opacity: 1
        },
    }
    var grafikKesehatan = new ApexCharts(document.querySelector("#grafikKesehatan"), optionKesehatan);
    grafikKesehatan.render();

    const optionAbsen = {
        series: <?= $seriesAbsen ?>,
        chart: {
            type: 'bar',
            height: 485,
            stacked: true,
            animations: {
                enabled: false
            },
            width: '100%',
        },
        plotOptions: {
            bar: {
                // horizontal: true,
            },
        },
        colors: colorGrafik,
        xaxis: {
            categories: <?= $categoriesAbsen ?>,
        },
        yaxis: {
            title: {
                text: undefined
            },
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
        },
        stroke: {
            width: 1,
            colors: ['#fff']
        },
        fill: {
            opacity: 1
        },
    }
    var grafikAbsen = new ApexCharts(document.querySelector("#grafikAbsen"), optionAbsen);
    grafikAbsen.render();
</script>

</html>