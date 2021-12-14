<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Detail <?= $alumni['nama'] ?></h1>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/table') ?>">Table Data Alumni</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/table/detail') . $alumni['id'] ?>">Detail <?= $alumni['nama'] ?></a></li>
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
                            <h3 class="profile-username text-center"><?= $alumni['nama'] ?></h3>
                        </div>

                        <p class="text-muted text-center"><?= $alumni['nis'] ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b> <a class="float-right"><?= $alumni['jns_kel'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tahun Lulus</b> <a class="float-right"><?= $alumni['tahun_keluar'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tanggal Input</b> <a class="float-right"><?= $alumni['tgl_input'] ?></a>
                            </li>
                        </ul>
                        <a class="btn btn-secondary float-right" href="<?= base_url('dashboard/table') ?>">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-3">
                        <strong>Detail Alumni</strong>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <!-- Post -->
                        <strong>Tempat, Tanggal Lahir</strong>

                        <p class="text-muted">
                            <?= $alumni['tempat_lahir'] ?>, <?= $alumni['tgl_lahir'] ?>
                        </p>

                        <hr>

                        <strong>Alamat</strong>

                        <p class="text-muted"><?= $alumni['alamat'] ?></p>

                        <hr>

                        <strong>Nama Ayah</strong>

                        <p class="text-muted">
                            <?= $alumni['nama_ayah'] ?>
                        </p>
                        <hr>

                        <strong>Nama Ibu</strong>

                        <p class="text-muted">
                            <?= $alumni['nama_ibu'] ?>
                        </p>
                        <hr>

                        <strong>Tahun Masuk</strong>

                        <p class="text-muted">
                            <?= $alumni['tahun_masuk'] ?>
                        </p>
                        <hr>

                        <strong>Link Berkas</strong>

                        <a href="<?= $alumni['link_berkas'] ?>" class="btn btn-info float-right">Download Berkas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>