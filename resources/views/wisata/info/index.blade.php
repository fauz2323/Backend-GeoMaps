@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Category Page') }}</div>
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
        </div>
    </div>
</div>
@endsection
