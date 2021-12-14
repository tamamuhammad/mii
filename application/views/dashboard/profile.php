<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: -5px">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Profile"></div>
    <?= $this->session->unset_userdata('message') ?>
    <!-- Content Header (Page header) -->
    <div class="card card-widget widget-user" style="height: 720px;">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header text-white pt-5" style="height: 360px; background-image: url('<?= base_url('assets/img/') ?>schoolgreen.jpg'); background-size:cover; background-attachment: fixed">
            <h3 class="widget-user-username" style="font-size: 40pt; padding-top: 5vh"><?= $sekolah['nama_sekolah'] ?></h3>
            <h4 class="widget-user-desc pb-5"><?= $sekolah['slogan'] ?></h4>
        </div>
        <div class="widget-user-image ml-0 d-flex justify-content-center" style="width: 100%;top: 30vh; left:0%">
            <img class="img-circle elevation-2" src="<?= base_url('assets/img/') . $sekolah['logo'] ?>" alt="User Avatar" style="width: 240px!important">
        </div>
        <div class="cardfooter" style="margin-top: 150px;padding-right: 1.25rem;padding-bottom: 0.75rem;padding-left: 1.25rem">
            <div class="row">
                <div class="col-md-6 border-right px-4">
                    <div class="d-flex my-2" style="justify-content: space-between">
                        <span class="description-text">EMAIL</span>
                        <h6 class="description-header"><?= $sekolah['email'] ?></h6>
                    </div>
                    <div class="d-flex my-2" style="justify-content: space-between">
                        <span class="description-text">TELEPON</span>
                        <h6 class="description-header"><?= $sekolah['telp'] ?></h6>
                    </div>
                    <div class="d-flex my-2" style="justify-content: space-between">
                        <span class="description-text">ALAMAT</span>
                        <h6 class="description-header text-right"><?= $sekolah['alamat'] ?></h6>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-md-6 px-4">
                    <div class="d-flex my-2" style="justify-content: space-between">
                        <span class="description-text">FACEBOOK</span>
                        <h6 class="description-header"><a href="<?= $sekolah['link_fb'] ?>" style="color: black!important; text-decoration: none!important"><?= $sekolah['fb'] ?></a></h6>
                    </div>
                    <div class="d-flex my-2" style="justify-content: space-between">
                        <span class="description-text">INSTAGRAM</span>
                        <h6 class="description-header"><a href="<?= $sekolah['link_ig'] ?>" style="color: black!important; text-decoration: none!important"><?= $sekolah['ig'] ?></a></h6>
                    </div>
                    <div class="d-flex my-2" style="justify-content: space-between">
                        <span class="description-text">YOUTUBE</span>
                        <h6 class="description-header"><a href="<?= $sekolah['link_yt'] ?>" style="color: black!important; text-decoration: none!important"><?= $sekolah['yt'] ?></a></h6>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>
            <a href="" class="float-right pr-3" data-toggle="modal" data-target="#addModal">edit<i class="fas fa-pencil-alt ml-2"></i></a>
            <!-- /.row -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addNewModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewModal">Edit Profile Sekolah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?= $sekolah['id'] ?>">
                    <div class="form-group">
                        <label for="nama">Nama Sekolah:</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $sekolah['nama_sekolah'] ?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="slogan">Slogan:</label>
                        <input type="text" class="form-control" name="slogan" id="slogan" value="<?= $sekolah['slogan'] ?>">
                        <?= form_error('slogan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group mb-0">
                        <label for="logo">Logo:</label>
                    </div>
                    <div class="form-group custom-file mb-2">
                        <label class="custom-file-label"><?= $sekolah['logo'] ?></label>
                        <input type="file" class="custom-file-input" name="logo" id="logo">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $sekolah['email'] ?>">
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="telp">Telepon:</label>
                        <input type="text" class="form-control" name="telp" id="telp" value="<?= $sekolah['telp'] ?>">
                        <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"><?= $sekolah['alamat'] ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="fb">Facebook:</label>
                        <input type="text" class="form-control" name="fb" id="fb" value="<?= $sekolah['fb'] ?>">
                        <?= form_error('fb', '<small class="text-danger">', '</small>'); ?>
                        <input type="text" class="form-control" name="link_fb" id="linkfb" value="<?= $sekolah['link_fb'] ?>">
                        <?= form_error('link_fb', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="ig">Instagram:</label>
                        <input type="text" class="form-control" name="ig" id="ig" value="<?= $sekolah['ig'] ?>">
                        <?= form_error('ig', '<small class="text-danger">', '</small>'); ?>
                        <input type="text" class="form-control" name="link_ig" id="link_ig" value="<?= $sekolah['link_ig'] ?>">
                        <?= form_error('link_ig', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="yt">Youtube:</label>
                        <input type="text" class="form-control" name="yt" id="yt" value="<?= $sekolah['yt'] ?>">
                        <?= form_error('yt', '<small class="text-danger">', '</small>'); ?>
                        <input type="text" class="form-control" name="link_yt" id="link_yt" value="<?= $sekolah['link_yt'] ?>">
                        <?= form_error('link_yt', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Edit Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>