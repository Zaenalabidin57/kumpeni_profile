@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengaturan Web</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Pengaturan Web</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Pengaturan</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-inline">
                                <li class="list-item-inline d-flex justify-content-between">
                                    <span>Nama Situs</span>
                                    <span class="ml-4 text-right">{{ $setting->site_name }}</span>
                                </li>
                                <hr>
                                <li class="list-item-inline d-flex justify-content-between">
                                    <span>Email</span>
                                    <span class="ml-4 text-right">{{ $setting->email }}</span>
                                </li>
                                <hr>
                                <li class="list-item-inline d-flex justify-content-between">
                                    <span>No. HP</span>
                                    <span class="ml-4 text-right">{{ $setting->phone }}</span>
                                </li>
                                <hr>
                                <li class="list-item-inline d-flex justify-content-between">
                                    <span>Alamat</span>
                                    <span class="ml-4 text-right">{{ $setting->address }}</span>
                                </li>
                                <hr>
                                <li class="list-item-inline d-flex justify-content-between">
                                    <span>Meta Kata Kunci</span>
                                    <span class="ml-4 text-right">{{ $setting->meta_keyword }}</span>
                                </li>
                                <hr>
                                <li class="list-item-inline d-flex justify-content-between">
                                    <span>Meta Deskripsi</span>
                                    <span class="ml-4 text-right">{{ $setting->meta_description }}</span>
                                </li>
                                <hr>
                                <li class="list-item-inline d-flex justify-content-between">
                                    <span>Pemilik</span>
                                    <span class="ml-4 text-right">{{ $setting->author }}</span>
                                </li>
                                <hr>
                                <li class="list-item-inline d-flex justify-content-between">
                                    <span>Favicon</span>
                                    <img src="{{ $setting->favicon() }}" class="img-fluid" style="max-height: 50px" alt="">
                                </li>
                                <hr>
                                <li class="list-item-inline d-flex justify-content-between">
                                    <span>Gambar</span>
                                    <img src="{{ $setting->image() }}" class="img-fluid" style="max-height: 50px" alt="">
                                </li>
                                <hr>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <form method="post" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Edit Pengaturan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="site_name">Nama Situs</label>
                                    <input type="text" class="form-control @error('site_name') is-invalid @enderror"
                                        value="{{ $setting->site_name }}" name="site_name">
                                    @error('site_name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $setting->email }}" name="email">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">No. HP</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ $setting->phone }}" name="phone">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea name="address" id="address" cols="30" rows="4" class="form-control @error('address') is-invalid @enderror" style="min-height: 120px">{{ $setting->address }}</textarea>
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Kata Kunci</label>
                                    <input type="text" class="form-control @error('meta_keyword') is-invalid @enderror"
                                        value="{{ $setting->meta_keyword }}" name="meta_keyword">
                                    @error('meta_keyword')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Deskripsi</label>
                                    <textarea name="meta_description" id="meta_description" cols="30" rows="4" class="form-control @error('meta_description') is-invalid @enderror" style="min-height: 120px">{{ $setting->meta_description }}</textarea>
                                    @error('meta_description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="author">Pemilik</label>
                                    <input type="text" class="form-control @error('author') is-invalid @enderror"
                                        value="{{ $setting->author }}" name="author">
                                    @error('author')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="favicon">Favicon</label>
                                    <input type="file" class="form-control @error('favicon') is-invalid @enderror"
                                        value="{{ $setting->favicon }}" name="favicon">
                                    @error('favicon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        value="{{ $setting->image }}" name="image">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    @include('admin.layouts.partials.sweetalert')
@endpush
