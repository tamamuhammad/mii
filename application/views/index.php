<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $sekolah['nama_sekolah'] ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url() ?>assets/img/favicon.png" rel="icon">
    <link href="<?= base_url() ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: iPortfolio - v1.5.1
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">

            <div class="profile">
                <img src="assets/img/sekolah.png" alt="" class="img-fluid rounded-circle">
                <h1 class="text-light"><a href="index.html">MI Islamiyah</a></h1>
                <h6 class="text-white text-center">Banyuurip Ageng 01</a></h6>
                <!-- <h2><a href="index.html">Banyuurip Ageng 01</a></h2> -->
                <div class="social-links mt-3 text-center">
                    <a href="<?= $sekolah['link_yt'] ?>" class="twitter"><i class="bx bxl-youtube"></i></a>
                    <a href="<?= $sekolah['link_fb'] ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="<?= $sekolah['link_ig'] ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
                </div>
            </div>

            <nav class="nav-menu">
                <ul>
                    <li class="active"><a href="#hero"><i class="bx bx-home"></i> <span>Beranda</span></a></li>
                    <li><a href="#about"><i class="bx bxs-user-detail"></i> <span>Sambutan Kepala Sekolah</span></a></li>
                    <li><a href="#sekolah"><i class="bx bxs-school"></i> <span>Profil Sekolah</span></a></li>
                    <li><a href="#portfolio"><i class="bx bx-photo-album"></i>Galeri</a></li>
                    <li><a href="#dataalumni"><i class="bx bx-table"></i> Data alumni</a></li>
                    <li><a href="#contact"><i class="bx bx-envelope"></i> Kontak</a></li>



                </ul>
            </nav><!-- .nav-menu -->
            <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">
            <h1><?= $sekolah['nama_sekolah'] ?></h1>
            <p><?= $sekolah['slogan'] ?></p>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Sambutan Kepsek Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container-fluid">

                <div class="section-title">
                    <h2>Sambutan Kepala Sekolah</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4" data-aos="fade-left">
                        <img src="assets/img/konten/<?= $sambutan['gambar'] ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-right">

                        <?= $sambutan['isi_konten'] ?>
                    </div>
                </div>

            </div>
        </section><!-- End Sambutan Kepsek Section -->

        <!-- Profile Sekolah Section -->
        <section id="sekolah" class="about">
            <div class="container-fluid">
                <div class="section-title">
                    <h2>Profil Sekolah</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <img src="assets/img/konten/<?= $sejarah['gambar'] ?>" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <?= $sejarah['isi_konten'] ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End od profile sekolah section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
            <div class="container-fluid">
                <div class="section-title">
                    <h2>Galeri</h2>
                </div>
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">

                    <?php foreach ($galeri as $img) : ?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="<?= base_url() ?>assets/img/galeri/<?= $img['nama_gambar'] ?>" class="img-fluid" alt="<?= $img['gambar'] ?>">
                                <div class="portfolio-links">
                                    <a href="<?= base_url() ?>assets/img/galeri/<?= $img['nama_gambar'] ?>" data-gall="<?= $img['gambar'] ?>" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                                    <!-- <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a> -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section><!-- End Portfolio Section -->

        <!--  data alumni -->
        <section id="dataalumni" class="portfolio">
            <div class="container-fluid">
                <div class="section-title">
                    <h2>Alumni</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>


                <div class="col-lg-12 d-flex justify-content-center">
                    <!-- DataTales -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>TTL</th>
                                    <th>Alamat</th>
                                    <th>Tahun Masuk</th>
                                    <th>Tahun Lulus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($alumni as $a) :
                                ?>
                                    <tr>
                                        <td><?= $a['nis'] ?></td>
                                        <td><?= $a['nama'] ?></td>
                                        <td><?= $a['jns_kel'] ?></td>
                                        <td><?= $a['tempat_lahir'] ?>, <?= $a['tgl_lahir'] ?></td>
                                        <td><?= $a['alamat'] ?></td>
                                        <td><?= $a['tahun_masuk'] ?></td>
                                        <td><?= $a['tahun_keluar'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.container-fluid -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact  section-bg">
            <div class="container-fluid">

                <div class="section-title">
                    <h2>Kontak</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row" data-aos="fade-in">

                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Alamat :</h4>
                                <p><?= $sekolah['alamat'] ?></p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email :</h4>
                                <p><?= $sekolah['email'] ?></p>
                            </div>

                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h4>Telp. :</h4>
                                <p><?= $sekolah['telp'] ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-youtube"></i>
                                <h4>Youtube :</h4>
                                <a href="<?= $sekolah['link_yt'] ?>"><?= $sekolah['yt'] ?></a>
                            </div>

                            <div class="address">
                                <i class="icofont-facebook"></i>
                                <h4>Facebook :</h4>
                                <a href="<?= $sekolah['link_fb'] ?>"><?= $sekolah['fb'] ?></a>
                            </div>

                            <div class="address">
                                <i class="icofont-instagram"></i>
                                <h4>Instagram :</h4>
                                <a href="<?= $sekolah['link_ig'] ?>"><?= $sekolah['ig'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->

        <div class="footer bg-light pt-4 pl-5 pb-0">
            <p>Developer by Codepelita - SMKSA</p>
        </div>

    </main><!-- End #main -->



    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url() ?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/counterup/counterup.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/venobox/venobox.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/typed.js/typed.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/js/main.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets/js/demo/demo/datatables-demo.js"></script>

</body>

</html>