@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header"><h2>{{ __('Category Add') }}</h2></div>
                <div class="m-3 p-3">
                <form class="was-validated" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
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
                        <label for="isi" class="form-label">Isi Berita</label>
                        @if($errors->has('category'))
                                <div class="text-danger">
                                    {{ $errors->first('category')}}
                                </div>
                        @endif
                        <textarea class="form-control" name="isi" id="content"></textarea>
                    </div>
                    {{-- <div class="custom-file mb-3">
                        <label for="">Gambar</label>
                        <div class="input-group">
                            <input type="file" name="photo" class="custom-file-input">
                        </div>
                    </div> --}}

                        <div class="form-group">
                          <label for="exampleFormControlFile1">Example file input</label>
                          <input name="photo" type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                    <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script >
  CKEDITOR.replace( 'content' );

</script>
@endpush
