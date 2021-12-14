<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tabel Data Alumni</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/table') ?>">Table Data Alumni</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Alumni"></div>
        <div class="row">
            <div class="col-12">
                <form action="" method="post" class="form-inline justify-content-end mb-2">
                    <div class="card-tools ml-2">
                        <div class="input-group input-group-sm mt-1" style="width: 200px;">
                            <input type="text" name="keyword" class="form-control float-right search" placeholder="Search">

                            <div class="input-group-append">
                                <input type="submit" class="btn btn-default" name="submit" value="Cari">
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <form action="" method="post" class="form-inline justify-content-end w-100">
                                <a href="<?= base_url('dashboard/tambah') ?>" class="btn btn-info mb-2 mr-auto">Tambah Data Alumni</a>
                                <!-- <select class="custom-select w-25 mx-1" name="jurusanfilter" id="jurusanfilter">
                                    <option value="">Pilih Jurusan</option>
                                    <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                    <option value="Tata Busana">Tata Busana</option>
                                    <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif</option>
                                    <option value="Teknik Bisnis Sepeda Motor">Teknik Bisnis Sepeda Motor</option>
                                </select>
                                <select class="custom-select mx-1" name="tahunfilter" id="tahunfilter" style="width : 18%">
                                    <option value="">Pilih Tahun Kelulusan</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                </select>
                                <input type="submit" class="btn btn-outline-success mx-1" name="aktif" value="Aktifkan">
                                <input type="submit" class="btn btn-outline-danger mx-1" name="nonaktif" value="Nonaktifkan"> -->
                            </form>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Tahun Lulus</th>
                                    <th>No. Telp</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($alumni as $alm) : ?>
                                    <tr>
                                        <td><?= ++$start; ?></td>
                                        <td><?= $alm['nama_alumni'] ?></td>
                                        <td><?= $alm['jurusan'] ?></td>
                                        <td><?= $alm['tahun_lulus'] ?></td>
                                        <td><?= $alm['no_telp'] ?></td>
                                        <td><?= $alm['keg_set_lulus'] ?></td>
                                        <td>
                                            <a href="<?= base_url('dashboard/detail/') . $alm['id'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="<?= base_url('dashboard/edit/') . $alm['id'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="<?= base_url('dashboard/hapus/') . $alm['id'] ?>" class="btn btn-danger hapus"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <hr class="mt-0">
                        <div class="row mx-4">
                            <p class="w-25 mr-auto pt-2">Showing <?= $start - $per_page + 1 ?> until <?= $start ?> of <?= $total_rows ?> result</p>
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>