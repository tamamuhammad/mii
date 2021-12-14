<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pl-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h1 class="m-0 text-dark">Ganti Password</h1>
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('profile') ?>">Profile</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('profile/changepassword') ?>">Ganti Password</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-md-10">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Password"></div>
            <?php $this->session->unset_userdata('message'); ?>
            <?= $this->session->flashdata('danger'); ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="currentPassword" class="col-form-label">Password lama</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                        <?= form_error('currentPassword', '<small class="text-danger">', '</small') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="newPassword" class="col-form-label">Password Baru</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                        <?= form_error('newPassword', '<small class="text-danger">', '</small') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="repeatPassword" class="col-form-label">Ulangi Password Baru</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="repeatPassword" name="repeatPassword">
                        <?= form_error('repeatPassword', '<small class="text-danger">', '</small') ?>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-warning" type="submit">Ganti password</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->