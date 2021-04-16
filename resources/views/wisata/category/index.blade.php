@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category Page') }}</div>

                <table class="table table-hover">
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
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
