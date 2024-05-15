@extends('admin.layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total User</h4>
            </div>
            <div class="card-body">
              {{ $count['users'] }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Kategori Artikel</h4>
            </div>
            <div class="card-body">
              {{ $count['post_categories'] }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Tag Artikel</h4>
            </div>
            <div class="card-body">
              {{ $count['post_tags'] }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Artikel</h4>
            </div>
            <div class="card-body">
              {{ $count['posts'] }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Artikel Terbaru</h4>
            <div class="card-header-action">
              <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">View All</a>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                      <tr>
                        <th>Judul</th>
                        <th style="min-width: 190px">Penulis</th>
                        <th style="min-width: 220px">Dibuat</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($post_latests as $pl)
                        <tr>
                          <td>
                           {{ $pl->title }}
                            <div class="table-links">
                              in <a href="#">{{ $pl->category->name ?? '-' }}</a>
                            </div>
                          </td>
                          <td>
                            <a href="#" class="font-weight-600"><img src="{{ $pl->user->avatar() }}" alt="avatar" width="30" class="rounded-circle mr-1"> {{ $pl->user->name }}</a>
                          </td>
                          <td>
                            {{ $pl->created_at->translatedFormat('l, d F Y') }}
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
