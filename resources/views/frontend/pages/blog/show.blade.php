@extends('frontend.layouts.app')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url();">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

                <h2>Blog Details</h2>
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Blog Details</li>
                </ol>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Details Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row g-5 justify-content-center">

                    <div class="col-lg-12">

                        <article class="blog-details">

                            <div class="post-img text-center mb-3">
                                <img src="{{ $item->image() }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">{{ $item->title }}
                            </h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                            href="#">{{ $item->user->name }}</a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="#">{{ $item->created_at->translatedFormat('d F Y') }}</a></li>
                                    {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                            href="#">12
                                            Comments</a></li> --}}
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                {!! $item->description !!}

                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">{{ $item->category->name }}</a></li>
                                </ul>

                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    @foreach ($item->tags as $tag)
                                        <li><a href="#">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div><!-- End meta bottom -->

                        </article><!-- End blog post -->

                    </div>
                </div>

            </div>
        </section><!-- End Blog Details Section -->

    </main><!-- End #main -->
@endsection
