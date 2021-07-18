@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        @foreach ($data as $data1)
                        <div class="card-header ">
                            <div class="card-header"><h2>{{ $data1->title }}</h2></div>
                        <div class="card-body table-full-width table-responsive">
                            <img src="{{ asset('storage/' . $data1->path) }}" class="img-fluid" alt="ini gambar">
                            <div class="mt-3 pt-3">
                                {!! $data1->body !!}
                            </div>
                        </div>
                    </div>
                        @endforeach

                </div>
    </div>
</div>
@endsection
