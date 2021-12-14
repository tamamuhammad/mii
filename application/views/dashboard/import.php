<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Import Data Alumni</h1>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/table') ?>">Table Data Alumni</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/import') ?>">Import Data Alumni</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="alert alert-info" style="opacity: .7">
                    <strong>PERINGATAN!!!</strong>
                    <ol class="mb-0">
                        <li>Cell A1 - K1 merupakan header secara urut yaitu:</li>
                        <ul class="mb-0" type="none">
                            <li>A1: NIS</li>
                            <li>B1: Nama Lengkap</li>
                            <li>C1: Jenis Kelamin (Laki-Laki / Perempuan)</li>
                            <li>D1: Tempat Lahir</li>
                            <li>E1: Tanggal Lahir (dd-mm-yyyy)</li>
                            <li>F1: Alamat</li>
                            <li>G1: Nama Ayah</li>
                            <li>H1: Nama Ibu</li>
                            <li>I1: Tahun Masuk</li>
                            <li>J1: Tahun Lulus</li>
                            <li>K1: Link Berkas</li>
                        </ul>
                        <li>Cell A2 - K2, A3 - K3, dst merupakan datanya.</li>
                        <li>Format file harus .xlsx</li>
                        <li>Semua data harus lengkap</li>
                        <li>Besar kecilnya huruf diperhatikan, Jenis Kelamin harus menggunakan Sentence Case dan tanpa spasi
                            <a href="<?= base_url('assets/img/untitle.png') ?>" class="float-right" style="text-decoration:none">Lihat Contoh</a>
                        </li>
                    </ol>
                </div>
                <div class="card card-info">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" action="<?= base_url('dashboard/preview') ?>" enctype="multipart/form-data" class="form-inline">
                            <div class="col-md-9 my-1">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file" required>
                                    <label class="custom-file-label" for="file">Choose Excel file...</label>
                                </div>
                            </div>
                            <div class="col-md-3 my-1">
                                <a class="btn btn-secondary float-right" href="<?= base_url('dashboard/table') ?>">Kembali</a>
                                <button type="submit" class="btn btn-info float-right mx-1">Preview</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>