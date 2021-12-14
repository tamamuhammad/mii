<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Daftar Konten</h1>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/konten') ?>">Daftar Konten</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Konten"></div>
        <?= $this->session->unset_userdata('message') ?>
        <div class="row">
            <?php
            $i = 1;
            foreach ($konten as $k) : ?>
                <?php
                $tgl = explode('-', $k['tanggal']);
                $tgl = date('l, d F Y', mktime(0, 0, 0, $tgl[1], $tgl[2], $tgl[0]));
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= base_url('assets/img/konten/') . $k['gambar'] ?>" class="card-img-top">
                        <div class="card-body p-3">
                            <h3><?= $k['judul_konten'] ?></h3>
                            <small style="color:grey"><?= $tgl ?></small>
                            <a href="<?= base_url('dashboard/editK/') . $k['id'] ?>" class="badge badge-warning float-right"><i class="fas fa-pencil-alt"></i> edit</a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-8">
                    <?php
                    $res = 1000;
                    $char = strlen($k['isi_konten']);
                    if ($char >= $res) :
                    ?>
                        <div class="ringkas<?= $i ?>">
                            <?= substr($k['isi_konten'], 0, $res) ?>... <p style="cursor:pointer; color:dodgerblue" class="read<?= $i ?>">View more</p>
                        </div>
                        <div class="panjang<?= $i ?> d-none">
                            <?= $k['isi_konten'] ?> <p style="cursor:pointer; color:dodgerblue" class="short<?= $i ?>">View less</p>
                        </div>
                    <?php else : ?>
                        <?= $k['isi_konten'] ?>
                    <?php endif;
                    $i++; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>