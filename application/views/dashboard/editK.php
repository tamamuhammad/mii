<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Edit <?= $konten['judul_konten'] ?></h1>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard/konten') ?>">Daftar Konten</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/editK/' . $konten['id']) ?>">Edit <?= $konten['judul_konten'] ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <?= form_open_multipart('dashboard/editK/' . $konten['id']); ?>
                <div class="row">
                    <div class="col-md-12">
                        <!-- text input -->
                        <div class="form-group form-inline">
                            <div class="col-md-4">
                                <label for="judul">Judul</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control w-100" placeholder="Masukkan judul" name="judul" id="judul" value="<?= $konten['judul_konten'] ?>">
                                <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <div class="col-md-4">
                                <label for="isi">Deskripsi Konten</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="isi" id="isi"><?= $konten['isi_konten'] ?></textarea>
                                <?= form_error('isi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group form-inline">
                            <div class="col-md-4">
                                <label for="gambar" class="col-form-label">Header Konten</label>
                            </div>
                            <div class="col-md-8 px-3">
                                <div class="row align-items-center">
                                    <div class="custom-file w-75 mr-auto">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="gambar"><?= $konten['gambar'] ?></label>
                                    </div>
                                    <img src="<?= base_url('assets/img/konten/') . $konten['gambar'] ?>" width="90px" style="border-radius: 5px">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info float-right mx-1" type="submit">Edit</button>
                            <a class="btn btn-secondary float-right mx-1" href="<?= base_url('dashboard/konten') ?>">Kembali</a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>