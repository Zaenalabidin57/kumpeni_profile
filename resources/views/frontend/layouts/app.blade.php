<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>UpConstruction Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/frontend') }}/img/favicon.png" rel="icon">
    <link href="{{ asset('assets/frontend') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/frontend') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets/frontend') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/frontend') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('assets/frontend') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('assets/frontend') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/frontend') }}/css/main.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="{{ asset('assets/frontend') }}/img/logo.png" alt=""> -->
                <h1>STMIK Bandung<span>.</span></h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{ route('home') }}" class="">Home</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-content position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 footer-links"">
                        <h4>Tentang STMIK Bandung</h4>
                        <ul>
                            <li><a href="#">Sejarah</a></li>
                            <li><a href="#">Visi Misi & Tujuan</a></li>
                            <li><a href="#">Pimpinan</a></li>
                            <li><a href="#">Struktur Organisasi</a></li>
                        </ul>
                    </div><!-- End footer info column-->

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Penelitian</h4>
                        <ul>
                            <li><a href="#">Jurnal</a></li>
                            <li><a href="#">Materi Kuliah</a></li>
                            <li><a href="#">Kumpulan Skripsi</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Pendidikan</h4>
                        <ul>
                            <li><a href="#">Teknik Informatika S1</a></li>
                            <li><a href="#">Sistem Informasi S1</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Kemahasiswaan</h4>
                        <ul>
                            <li><a href="#">BEM</a></li>
                        </ul>
                    </div><!-- End footer links column-->

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Kontak Kami</h4>
                        <ul>
                            <li class="">
                                <a href="" style="line-height: 20px">
                                    Jl. Cikutra No.113, Bandung Kota Bandung, Jawa Barat 40124 <br> Telp :
                                    +022-7207777 <br> E-mail : info@stmik-bandung.ac.id
                                </a>
                            </li>
                        </ul>
                    </div><!-- End footer links column-->

                </div>
            </div>
        </div>

        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>STMIK Bandung © 2024</span></strong>. All Rights
                    Reserved
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/frontend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('assets/frontend') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('assets/frontend') }}/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('assets/frontend') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/frontend') }}/js/main.js"></script>

</body>

</html>
