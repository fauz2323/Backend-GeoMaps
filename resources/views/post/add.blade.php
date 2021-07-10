@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category Add') }}</div>

                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="Judul" class="form-label">Judul</label>
                        @if($errors->has('category'))
                                <div class="text-danger">
                                    {{ $errors->first('category')}}
                                </div>
                        @endif
                        <input type="text" class="form-control" name="judul" placeholder="Judul Berita">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Slug" class="form-label">Slug</label>
                        @if($errors->has('category'))
                                <div class="text-danger">
                                    {{ $errors->first('category')}}
                                </div>
                        @endif
                        <input type="text" class="form-control" name="slug" placeholder="slug">
                    </div>
                    <div class="form-group mb-3">
                        <label for="isi" class="form-label">Isi Berita</label>
                        @if($errors->has('category'))
                                <div class="text-danger">
                                    {{ $errors->first('category')}}
                                </div>
                        @endif
                        <input type="text" class="form-control" name="isi" placeholder="Isi Berita">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Gambar</label>
                        <div class="input-group">
                            <input type="file" name="photo" class="form-control">
                        </div>
                    </div>
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
