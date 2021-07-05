@extends('layouts.app')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <div class="pb-2 mb-3">{{ __('Category Page') }}</div>
                    <a href="{{ route('wisata.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table id="data" class="m-2 table table-hover table-striped">
                        <thead>
                            <td>nama</td>
                            <td>category</td>
                            <td>alamat</td>
                            <td>lat</td>
                            <td>long</td>
                            <td>Action</td>
                        </thead>

                        <tbody>
                            @foreach($wisata as $data)
                            <tr>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data['categories']['categori'] }}
                                </td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->latitude }}</td>
                                <td>{{ $data->longitude }}</td>
                                <td>
                                    <form action="{{ route('wisata.destroy', $data->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger float-right"
                                            onclick="return confirm('are you sure?');">Delete</button>
                                        <a href="{{ route('wisata.edit', $data->id) }}"
                                            class="btn btn-sm btn-info float-right text-white">Edit</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-10">
            <div class="">
                <div class="pb-2">{{ __('Category Page') }}</div>
                <table class="table table-hover col-md-10">
                    <thead>
                        <tr>
                            <td>nama</td>
                            <td>category</td>
                            <td>alamat</td>
                            <td>lat</td>
                            <td>long</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($wisata as $data)
                            <tr>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data['categories']['categori'] }}
                                </td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->latitude }}</td>
                                <td>{{ $data->longitude }}</td>
                                <td>
                                    <form action="{{ route('wisata.destroy', $data->id) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger float-right"
                                            onclick="return confirm('are you sure?');">Delete</button>
                                        <a href="{{ route('wisata.edit', $data->id) }}"
                                            class="btn btn-sm btn-info float-right text-white">Edit</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> --}}
    </div>
</div>
@endsection

