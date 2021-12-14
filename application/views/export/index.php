<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="container mx-3">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Export Laporan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="<?= base_url('report') ?>">Report</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </section>

        <form action="<?= base_url('report/export') ?>" method="post">
            <section class="filter">
                <div class="container">
                    <div class="row">
                        <div class="col-10">
                            <div class="card">
                                <div class="card-header">
                                    <label class="mr-1">Filter Berdasarkan :</label>
                                    <select class="custom-select w-25 mr-1" name="masuk" id="masuk">
                                        <option value="" selected>Pilih Tahun Masuk</option>
                                        <?php for ($i = 2007; $i <= date('Y'); $i++) : ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <select class="custom-select w-25 ml-1" name="keluar" id="keluar">
                                        <option value="" selected>Pilih Tahun Lulus</option>
                                        <?php for ($i = 2007; $i <= date('Y'); $i++) : ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-10">
                        <div class="col-12 d-flex mb-3">
                            <div class="col-4">
                                <input class="btn btn-success w-100" type="submit" name="excel" value="Export Excel">
                            </div>
                            <div class="col-4">
                                <input class="btn btn-warning w-100" type="submit" name="pdf" value="Export PDF">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->