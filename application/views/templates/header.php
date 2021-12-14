<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">
    <style>
        body {
            font-family: Nunito, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        .main-header {
            height: 55px !important;
        }

        .content-header {
            padding-bottom: 0px;
        }

        @media (max-width: 690px) {
            .barResponsive {
                margin-top: 0 !important;
            }

            small.user-name {
                display: none;
            }
        }

        .linknav:hover {
            background-color: #34805e;
            height: 50px !important;
        }

        .active {
            background-color: #f4f6f9;
            color: #425931 !important;
            height: 60px !important;
        }

        .form-inline label {
            justify-content: start;
        }

        .bg-hijau {
            background-color: #85cc52 !important;
        }

        .accent-hijau {
            color: #425931 !important;
        }

        .main-header {
            border-bottom: 0px !important;
        }

        .circle {
            background-color: cornsilk;
            width: 125px;
            height: 125px;
            border-radius: 100%;
            text-shadow: 5px solid black;
            margin-top: -80px;
            padding-top: 26px;
            color: #3d9970;
            margin-right: -10px
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">