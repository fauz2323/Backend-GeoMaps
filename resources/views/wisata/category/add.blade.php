@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category Add') }}</div>

                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="Category" class="form-label">Category</label>
                        @if($errors->has('category'))
                                <div class="text-danger">
                                    {{ $errors->first('category')}}
                                </div>
                        @endif
                        <input type="text" class="form-control" name="category" placeholder="category wisata">
                    </div>
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
