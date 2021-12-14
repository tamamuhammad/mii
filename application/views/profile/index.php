<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="margin-top: -5px">
    <!-- Content Header (Page header) -->
    <div class="card card-widget widget-user" style="height: 600px;">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-olive" style="height: 250px">
            <h3 class="widget-user-username pt-3" style="font-size: 30pt"><?= $user['nama'] ?></h3>
            <h5 class="widget-user-desc pb-5"><?= $role['role'] ?></h5>
        </div>
        <div class="widget-user-image" style="top: 175px; margin-left: -75px;">
            <img class="img-circle elevation-2" src="<?= base_url('assets/img/') . $user['gambar'] ?>" alt="User Avatar" style="height: 150px; max-width: 150px; width: 150px; object-fit:cover">
        </div>
        <div class="cardfooter" style="margin-top: 150px;padding-right: 1.25rem;padding-bottom: 0.75rem;padding-left: 1.25rem;">
            <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header"><?= $user['email'] ?></h5>
                        <span class="description-text">EMAIL</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header"><?= $role['role'] ?></h5>
                        <span class="description-text">ROLE</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header"><?= date('d F Y', $user['dibuat']) ?></h5>
                        <span class="description-text">JOIN</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </div>

    <!-- Main content -->
    <section class="content">

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->