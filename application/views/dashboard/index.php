    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header pb-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-md-6">
                        <ol class="breadcrumb float-md-right">
                            <li class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row p-3 mb-3 justify-content-center" style="align-items: center;">
                    <h1 class="mb-0">Selamat Datang, <?= $user['nama'] ?>!</h1>
                </div>
                <form action="<?= base_url('dashboard/table') ?>" method="post">
                    <div class="row elevation-2" style="background-color: rgb(255, 255, 255); border-radius: 10px; align-items: center">
                        <div class="col-md-12 text-center">
                            <p class="text-bold mb-0 mt-3" style="font-size: 20pt">Grafik Alumni</p>
                        </div>
                        <div class="card-body col-md-9">
                            <p class="text-bold">Berdasarkan Tahun Lulus</p>
                            <div class="chart">
                                <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <div class="card-body col-md-3" style="border-left: 1px solid black">
                            <p class="text-center mb-0" style="font-size: 30pt"><?= $alumni; ?></p>
                            <p class="text-center mb-0" style="font-size: 15pt">TOTAL ALUMNI</p>
                        </div>
                        <div class="card-body col-md-6">
                            <p class="text-bold">Berdasarkan Jenis Kelamin</p>
                            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <div class="card-body col-md-3" style="border-left: 1px solid black">
                            <p class="text-center mb-0" style="font-size: 30pt"><?= $cowo; ?></p>
                            <p class="text-center mb-0" style="font-size: 15pt">ALUMNI LAKI-LAKI</p>
                        </div>
                        <div class="card-body col-md-3" style="border-left: 1px solid black">
                            <p class="text-center mb-0" style="font-size: 30pt"><?= $cewe; ?></p>
                            <p class="text-center mb-0" style="font-size: 15pt">ALUMNI PEREMPUAN</p>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>