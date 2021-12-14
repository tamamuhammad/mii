<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container mx-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h1 class="m-0 text-dark">Role Access <?= $role['role'] ?></h1>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Admin</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/role') ?>">Role Management</a></li>
                            <li class="breadcrumb-item active"><a href="<?= base_url('admin/role/roleAccess/' . $role['id']) ?>"><?= $role['role'] ?> Access</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Akses"></div>
            <?php $this->session->unset_userdata('message'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h5>Role : <?= $role['role']; ?></h5>
                    <table class="table table-hover">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Access</th>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($menu as $m) :
                            ?>
                                <tr>
                                    <th><?= $i++; ?></th>
                                    <td><?= $m['menu'] ?></td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input access" type="checkbox" <?= check_access($role['id'], $m['id']) ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id'] ?>">
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->