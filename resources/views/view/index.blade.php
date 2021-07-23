<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data->title}}</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="container bg-light">
        <img src="{{ asset('storage/' . $data->path) }}" class="img-fluid" alt="ini gambar">
        <div class="mt-3 pt-3">
            {!! $data->body !!}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>
