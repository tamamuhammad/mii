<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail <?= $petugas['nama'] ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('admin/detail/') . $petugas['id'] ?>">Detail <?= $petugas['nama'] ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/img/') . $petugas['gambar'] ?>" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= $petugas['nama'] ?></h3>

                        <p class="text-muted text-center"><?= $role['role'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <strong>Detail Petugas</strong>
                    </div>
                    <div class="card-body">
                        <!-- Post -->
                        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                        <p class="text-muted">
                            <?= $petugas['email'] ?>
                        </p>
                        <hr>
                        <strong><i class="fas fa-envelope mr-1"></i> Tanggal Dibuat</strong>

                        <p class="text-muted">
                            <?= date('d M Y', $petugas['dibuat']) ?>
                        </p>
                        <!-- /.tab-content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>