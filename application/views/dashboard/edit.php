<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Edit Data <?= $alumni['nama'] ?></h1>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/table') ?>">Table Data Alumni</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/edit') ?>">Edit Data Alumni</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Formulir Edit Alumni</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= form_open_multipart('dashboard/edit/' . $alumni['id']); ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="nis">NIS</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control w-100" value="<?= $alumni['nis'] ?>" name="nis" id="nis">
                                        <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="nama">Nama Lengkap</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control w-100" value="<?= $alumni['nama'] ?>" name="nama" id="nama">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group d-flex custom-control custom-radio pl-0 my-2">
                                    <div class="col-sm-4">
                                        <label for="jeniskelamin">Jenis Kelamin</label>
                                    </div>
                                    <div class="col-sm-8 d-flex">
                                        <div class="custom-control custom-radio mr-1">
                                            <input class="custom-control-input" type="radio" id="laki" name="jeniskelamin" value="Laki-Laki" <?= ($alumni['jns_kel'] == 'Laki-Laki' ? ' checked' : '') ?>>
                                            <label for="laki" class="custom-control-label">Laki - Laki</label>
                                        </div>
                                        <div class="custom-control custom-radio ml-1">
                                            <input class="custom-control-input" type="radio" id="perempuan" name="jeniskelamin" value="Perempuan" <?= ($alumni['jns_kel'] == 'Perempuan' ? ' checked' : '') ?>>
                                            <label for="perempuan" class="custom-control-label">Perempuan</label>
                                        </div>
                                        <?= form_error('jeniskelamin', '<small class="text-danger ml-5">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="ttl">TTL</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control w-100" value="<?= $alumni['tempat_lahir'] ?>" name="ttl" id="ttl">
                                        <?= form_error('ttl', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control w-100" value="<?= $alumni['tgl_lahir'] ?>" name="tgl" id="tgl">
                                        <?= form_error('tgl', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="alamat">Alamat</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea class="form-control w-100" rows="3" placeholder="Masukkan Alamat" name="alamat" id="alamat"><?= $alumni['alamat'] ?></textarea>
                                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="ayah">Nama Orangtua</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control w-100" value="<?= $alumni['nama_ayah'] ?>" name="ayah" id="ayah">
                                        <?= form_error('ayah', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control w-100" value="<?= $alumni['nama_ibu'] ?>" name="ibu" id="ibu">
                                        <?= form_error('ibu', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="tahun">Tahun Masuk dan Lulus</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="custom-select w-100" name="masuk" id="masuk" required>
                                            <option value="" selected disabled>Pilih Tahun Masuk</option>
                                            <?php for ($i = 2007; $i <= date('Y'); $i++) : ?>
                                                <option value="<?= $i ?>" <?= ($alumni['tahun_masuk'] == $i ? ' selected' : '') ?>><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="custom-select w-100" name="keluar" id="keluar" required>
                                            <option value="" selected disabled>Pilih Tahun Lulus</option>
                                            <?php for ($i = 2007; $i <= date('Y'); $i++) : ?>
                                                <option value="<?= $i ?>" <?= ($alumni['tahun_keluar'] == $i ? ' selected' : '') ?>><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-inline">
                                    <div class="col-sm-4">
                                        <label for="berkas">Link Berkas</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <textarea class="form-control w-100" rows="2" name="berkas" id="berkas"><?= $alumni['link_berkas'] ?></textarea>
                                        <?= form_error('berkas', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info float-right mx-1" type="submit">Tambah</button>
                                    <a class="btn btn-secondary float-right mx-1" href="<?= base_url('dashboard/table') ?>">Kembali</a>
                                </div>
                            </div>
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