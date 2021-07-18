@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header ">
                            <div class="card-header">{{ __('Category Page') }}</div>
                            <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <table class="m-2 table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <td>judul</td>
                                        <td>slug</td>
                                        <td>tanggal publish</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->slug }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>
                                            <form action="{{ route('post.destroy', $data->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger float-right"
                                                    onclick="return confirm('are you sure?');">Delete</button>
                                                <a href="{{ route('post.edit', $data->id) }}"
                                                    class="btn btn-sm btn-info float-right text-white">Edit</a>
                                                 <a href="{{ route('post.show', $data->slug) }}"
                                                    class="btn btn-sm btn-info float-right text-white">lihat</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Category</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $data)
                            <tr>
                                <td>{{ $data->categori }}</td>
                                <td>
                                    <form action="{{ route('category.destroy', $data->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger float-right"
                                            onclick="return confirm('are you sure?');">Delete</button>
                                        <a href="{{ route('category.edit', $data->id) }}"
                                            class="btn btn-sm btn-info float-right text-white">Edit</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
    </div>
</div>
@endsection
