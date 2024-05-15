@extends('frontend.layouts.app')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center"
            style="background-image: url({{ asset('assets/frontend/stmikbdg-bg1.jpg') }});">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>About</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>About</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="row ">

                    {{-- <div class="col-lg-12 about-img" style="background-image: url(assets/img/about.jpg);"></div> --}}

                    <div class="col-lg-12">
                        <h2 class="text-center" style="max-width: 100%">Sekolah Tinggi Manajemen Informatika & Komputer
                            (STMIK)
                            Bandung</h2>
                        <div class="our-story w-100  text-justify" style="padding-right:30px">
                            {{-- <h4>Est 1988</h4> --}}
                            <h3>Our Story</h3>
                            <p class="text-justify">STMIK Bandung merupakan STMIK pertama di Jawa Barat dan pelopor
                                pendidikan tinggi informatika
                                swasta dengan fokus untuk mencetak tenaga profesional dan technopreneur IT.

                                Dalam upaya memberikan kesempatan kepada masyarakat yang tidak mempunyai waktu luang
                                mengikuti pendidikan di hari kerja. STMIK BANDUNG membuka Program Kelas Karyawan atau
                                Program Kuliah Karyawan jenjang S1. Kualitas dan proses pendidikan di STMIK BANDUNG sama
                                dirancang sama dengan Kualitas dan proses pendidikan pada hari biasa. Setiap perkuliahaan
                                diatur secara terstruktur dan terjadwal dengan pemilihan tenaga pengajar terbaik dan
                                berpengalaman di bidangnya. Proses belajar didukung oleh fasilitas terbaik.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End About Section -->


    </main><!-- End #main -->
@endsection
