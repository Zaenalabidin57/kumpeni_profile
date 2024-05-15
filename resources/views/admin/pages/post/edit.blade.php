@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Artikel</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.posts.index') }}">Data Artikel</a></div>
                <div class="breadcrumb-item">Edit Artikel</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.posts.update',$item->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Judul</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                name="title" value="{{ $item->title ?? old('title') }}" id="title">
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="post_category_id">Kategori</label>
                                            <select name="post_category_id" id="post_category_id"
                                                class="form-control @error('post_category_id') is-invalid @enderror">
                                                <option value="" selected disabled>Pilih Kategori</option>
                                                @foreach ($post_categories as $category)
                                                    <option @if($category->id == $item->post_category_id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('post_category_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="post_tag_id">Tag <span>(Dapat memilih lebih dari 1 tag)</span></label>
                                            <select name="post_tag_id[]" id="post_tag_id"
                                                class="form-control @error('post_tag_id') is-invalid @enderror" multiple>
                                                @foreach ($item->tags as $itag)
                                                    <option selected value="{{ $itag->id }}">{{ $itag->name }}</option>
                                                @endforeach
                                                @foreach ($post_tags->whereNotIn('id',$item_tags) as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('post_tag_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_keyword">Meta Kata Kunci</label>
                                            <input type="text"
                                                class="form-control @error('meta_keyword') is-invalid @enderror"
                                                name="meta_keyword" value="{{ $item->meta_keyword ?? old('meta_keyword') }}" id="meta_keyword">
                                            @error('meta_keyword')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="meta_description">Meta Deskripsi</label>
                                            <textarea name="meta_description" id="meta_description"
                                                class="form-control @error('meta_description') is-invalid @enderror" cols="30" rows="5">{{ $item->meta_description ??  old('meta_description')}}</textarea>
                                            @error('meta_description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                                <option value="" selected disabled>Pilih Status</option>
                                                <option @if ($item->status === 1) selected @endif value="1">
                                                    Aktif</option>
                                                <option @if ($item->status ==0 ) selected @endif value="0">
                                                    Tidak Aktif
                                                </option>
                                            </select>
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label for="image">Gambar</label>
                                                <b></b>
                                                <img src="{{ $item->image() }}" class="img-fluid" style="max-height: 60px" alt="">
                                            </div>
                                            <div class="col-md-10 align-self-center">
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-block btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <textarea name="description" id="description"
                                                class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ $item->description ?? old('description')}}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/plugin/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugin/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/plugin/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('assets/plugin/select2/js/select2.min.js') }}"></script>
<script>
    $(function(){
        $('#post_tag_id').select2({
                    theme: 'bootstrap4'
                });
        var options = {
    filebrowserImageBrowseUrl: '/filemanager',
    filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/filemanager?type=Files',
    filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
  };
        CKEDITOR.replace( 'description',options);
    })
</script>
@endpush
