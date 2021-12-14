<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Galeri</h1>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/galeri') ?>">Galeri</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Konten"></div>
                <?= $this->session->unset_userdata('message') ?>
                <div class="card shadow">
                    <div class="card-header">
                        <p class="mb-0">Tambah Foto</p>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('dashboard/tambahF/') ?>" enctype="multipart/form-data">
                            <div class="form-group row mt-2 w-100">
                                <div class="col-md-12 d-flex align-items-center">
                                    <div class="col-5">
                                        <input type="text" class="form-control" name="nama" id="nama" required placeholder="Masukkan Judul Gambar">
                                    </div>
                                    <div class="col-5">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
                                            <label class="custom-file-label" for="gambar">Choose file...</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <input type="submit" value="Tambah" name="submit" class="btn btn-primary px-3">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($galeri as $g) : ?>
                                <div class="col-md-3 col-sm-6 p-0">
                                    <img src="<?= base_url('assets/img/galeri/') . $g['nama_gambar'] ?>" class="img-fluid" style="border-radius: 5px; height: 240px; max-width: 240px; width: 240px; object-fit:cover">
                                    <div class="d-flex mt-3 align-items-center" style="justify-content: space-between">
                                        <div class="caption mb-3">
                                            <p class="mb-0"><?= $g['gambar'] ?></p>
                                            <small style="color:grey"><?= $g['tgl'] ?></small>
                                        </div>
                                        <a href="<?= base_url('dashboard/hapusF/' . $g['id']) ?>" class="float-right hapus" style="margin-right: 3vw; color:black"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>