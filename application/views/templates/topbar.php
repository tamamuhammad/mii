<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-olive navbar-dark p-0">
    <!-- Left navbar links -->
    <?php
    $url = explode('/', current_url());
    if (isset($url[5])) {
        $uri = $url[5];
    } else {
        $uri = null;
    }
    $url = $url[4];
    ?>
    <ul class="navbar-nav ml-2 <?= ($url == 'profile' && $uri == null || $uri == 'profile' ? '' : 'mt-3') ?> barResponsive">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-flex">
            <a href="<?= base_url('dashboard') ?>" class="nav-link <?= ($url == 'dashboard' && $uri != 'profile' ? ' active' : 'linknav') ?>">Dashboard</a>
            <?php if ($user['role'] <= 1) : ?>
                <a href="<?= base_url('admin') ?>" class="nav-link <?= ($url == 'admin' ? ' active' : 'linknav') ?>">Admin</a>
                <a href="<?= base_url('menu') ?>" class="nav-link <?= ($url == 'menu' ? ' active' : 'linknav') ?>">Menu</a>
            <?php endif; ?>
            <a href="<?= base_url('profile') ?>" class="nav-link <?= ($url == 'profile' && $uri ? 'active' : 'linknav prof') ?>">Profile</a>
            <a href="<?= base_url('report') ?>" class="nav-link <?= ($url == 'report' ? ' active' : 'linknav') ?>">Report</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto <?= ($url == 'profile' ? '' : 'mb-1') ?>" style="cursor:pointer">
        <li class="nav-item dropdown">
            <a class="nav-link d-block py-0" role="button" data-toggle="dropdown" id="userDropdown" aria-haspopup="true" aria-expanded="false">
                <small class="user-name"><?= $user['nama'] ?></small>
                <img src="<?= base_url('assets/img/') . $user['gambar'] ?>" class="img-circle elevation-2 ml-2" alt="User Image" width="40" style="height: 40px; max-width: 40px; width: 40px; object-fit:cover">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a href="<?= base_url('profile') ?>" class="dropdown-item"><i class="fas fa-fw fa-user"></i>
                    My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item"><i class="fas fa-fw fa-sign-out-alt"></i>
                    Logout
                </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->