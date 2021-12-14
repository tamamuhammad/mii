<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Tabel Data Alumni</h1>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
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
        <?php $this->session->unset_userdata('message'); ?>
        <div class="row">
            <div class="col-12">
                <form action="" method="post" class="form-inline w-100">
                    <a href="<?= base_url('dashboard/tambah') ?>" class="btn btn-info mb-2 mr-2">Tambah Data Alumni</a>
                    <a href="<?= base_url('dashboard/import') ?>" class="btn btn-success mb-2"><i class="fas fa-table mr-2"></i>Import Data Alumni</a>
                </form>
                <div class="card p-3">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIS</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Tahun Keluar</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($alumni as $alm) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $alm['nis'] ?></td>
                                        <td><?= $alm['nama'] ?></td>
                                        <td><?= $alm['jns_kel'] ?></td>
                                        <td><?= $alm['alamat'] ?></td>
                                        <td><?= $alm['tahun_keluar'] ?></td>
                                        <td>
                                            <a href="<?= base_url('dashboard/detail/') . $alm['id'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="<?= base_url('dashboard/edit/') . $alm['id'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="<?= base_url('dashboard/hapus/') . $alm['id'] ?>" class="btn btn-danger hapus"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>