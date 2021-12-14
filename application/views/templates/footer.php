<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        by <b>Muhammad M. T.</b>
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="http://ponpes-smksa.sch.id">SMK Syafi'i Akrom</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min copy.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/script.js"></script>
<script src="<?= base_url('assets/') ?>plugins/chart.js/Chart.js"></script>
<script src="<?= base_url('assets/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        $('.read1').on('click', function() {
            $('.ringkas1').addClass('d-none')
            $('.panjang1').removeClass('d-none')
        })

        $('.short1').on('click', function() {
            $('.panjang1').addClass('d-none')
            $('.ringkas1').removeClass('d-none')
        })

        $('.read2').on('click', function() {
            $('.ringkas2').addClass('d-none')
            $('.panjang2').removeClass('d-none')
        })

        $('.short2').on('click', function() {
            $('.panjang2').addClass('d-none')
            $('.ringkas2').removeClass('d-none')
        })
        // Summernote
        $('#dataTable').DataTable();
        $('.textarea').summernote();
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
        var date = new Date();
        var areaChartData = {
            labels: [date.getFullYear() - 6, date.getFullYear() - 5, date.getFullYear() - 4, date.getFullYear() - 3, date.getFullYear() - 2, date.getFullYear() - 1, date.getFullYear()],
            datasets: [{
                label: 'Jumlah Alumni',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: [
                    <?php
                    $satu = $this->db->get_where('alumni', ['tahun_keluar' => date('Y') - 6])->num_rows();
                    echo $satu;
                    ?>,
                    <?php
                    $dua = $this->db->get_where('alumni', ['tahun_keluar' => date('Y') - 5])->num_rows();
                    echo $dua;
                    ?>,
                    <?php
                    $tiga = $this->db->get_where('alumni', ['tahun_keluar' => date('Y') - 4])->num_rows();
                    echo $tiga;
                    ?>,
                    <?php
                    $empat = $this->db->get_where('alumni', ['tahun_keluar' => date('Y') - 3])->num_rows();
                    echo $empat;
                    ?>,
                    <?php
                    $lima = $this->db->get_where('alumni', ['tahun_keluar' => date('Y') - 2])->num_rows();
                    echo $lima;
                    ?>,
                    <?php
                    $enam = $this->db->get_where('alumni', ['tahun_keluar' => date('Y') - 1])->num_rows();
                    echo $enam;
                    ?>,
                    <?php
                    $tujuh = $this->db->get_where('alumni', ['tahun_keluar' => date('Y')])->num_rows();
                    echo $tujuh;
                    ?>
                ]
            }]
        }
        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        var areaChart = new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        });

        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = {
            labels: ["Laki - Laki", "Perempuan"],
            datasets: [{
                label: '',
                data: [
                    <?php
                    $cowo = $this->db->get_where('alumni', ['jns_kel' => 'Laki-Laki'])->num_rows();
                    echo $cowo;
                    ?>,
                    <?php
                    $cewe = $this->db->get_where('alumni', ['jns_kel' => 'Perempuan'])->num_rows();
                    echo $cewe;
                    ?>
                ],
                backgroundColor: [
                    'rgb(61, 153, 112)',
                    'rgb(255, 99, 132)'
                ]
            }]
        }
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        });
    });
</script>
</body>

</html>