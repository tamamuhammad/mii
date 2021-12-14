<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tabel Data Petugas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Petugas"></div>
        <?php $this->session->unset_userdata('message'); ?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <form action="" method="post" class="row">
                            <a href="<?= base_url('admin/signup') ?>" class="btn btn-info mr-auto">Tambah Data Petugas</a>
                        </form>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-hover text-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($petugas as $p) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $p['nama'] ?></td>
                                        <td><?= $p['email'] ?></td>
                                        <?php $role = $this->db->get_where('user_role', ['id' => $p['role']])->row_array(); ?>
                                        <td><?= $role['role'] ?></td>
                                        <td><img src="<?= base_url('assets/img/') . $p['gambar'] ?>" style="height: 100px!important; max-width: 100px!important; width: 100px!important; object-fit:cover"></td>
                                        <td>
                                            <?php
                                            if ($this->session->userdata('email') == $p['email']) {
                                            ?>
                                                <a href="<?= base_url('profile') ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="<?= base_url('profile/edit') ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <?php } else { ?>
                                                <a href="<?= base_url('admin/detail/') . $p['id'] ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="<?= base_url('admin/edit/') . $p['id'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                            <?php } ?>
                                            <?php
                                            if ($p['id'] > 1) : ?>
                                                <a href="<?= base_url('admin/hapus/') . $p['id'] ?>" class="btn btn-danger hapus"><i class="fas fa-trash-alt"></i></a>
                                            <?php endif; ?>
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