@extends('layouts.app')

@section('content')
<div class="container bg-white pb-3 pt-3">
    <form action="{{ route('wisata.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md">
                <div id='map' style='width: 100%; height: 100%;'></div>
            </div>
            <div class="col-md">
                <div class="form-group mb-3">
                    <label for="Category" class="form-label">Category</label>
                    <select class="form-control" name="category_id" aria-label="Default select example">
                        <option selected disabled>Pilih Kategori Wisata</option>
                        @foreach($category as $item)
                            <option value="{{ $item->id }}">{{ $item->categori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="Category" class="form-label">Nama</label>
                    @if($errors->has('nama'))
                                <div class="text-danger">
                                    {{ $errors->first('nama')}}
                                </div>
                        @endif
                    <input type="text" class="form-control" name="nama" placeholder="category wisata">
                </div>
                <div class="form-group mb-3">
                    <label for="Category" class="form-label">Alamat</label>
                    @if($errors->has('alamat'))
                                <div class="text-danger">
                                    {{ $errors->first('alamat')}}
                                </div>
                        @endif
                    <input type="text" class="form-control" name="alamat" placeholder="category wisata">
                </div>
                <div class="form-group mb-3">
                    <label for="Category" class="form-label">Desc</label>
                    @if($errors->has('deskripsi'))
                                <div class="text-danger">
                                    {{ $errors->first('deskripsi')}}
                                </div>
                        @endif
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="5"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="Category" class="form-label">Lat</label>
                    @if($errors->has('latitude'))
                                <div class="text-danger">
                                    {{ $errors->first('latitude')}}
                                </div>
                        @endif
                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="..." value="">
                </div>
                <div class="form-group mb-3">
                    <label for="Category" class="form-label">Long</label>
                    @if($errors->has('longitude'))
                                <div class="text-danger">
                                    {{ $errors->first('longitude')}}
                                </div>
                        @endif
                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="..." value="">
                </div>
                <div class="form-group increment">
                    <label for="">Photo</label>
                    <div class="input-group">
                        <input type="file" name="pp[]" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-primary btn-add"><i class="fas fa-plus-square"></i></button>
                        </div>
                    </div>
                </div>
                <div class="clone invisible">
                    <div class="input-group mt-2">
                        <input type="file" name="pp[]" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-danger btn-remove"><i class="fas fa-minus-square"></i></button>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Add</button>
            </div>
        </div>

    </form>
</div>

@endsection
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script>
        jQuery(document).ready(function () {
            jQuery(".btn-add").click(function () {
                let markup = jQuery(".invisible").html();
                jQuery(".increment").append(markup);
            });
            jQuery("body").on("click", ".btn-remove", function () {
                jQuery(this).parents(".input-group").remove();
            })
        })
        var addMarker;
        mapboxgl.accessToken = '{{ env('MAPBOX_KEY') }}';
        const location112 = [30.5, 50.5];

        var map = new mapboxgl.Map({
            container: 'map',
            center: location112,
            zoom: 11.5,
            style: 'mapbox://styles/mapbox/streets-v11'
        });

        /* map.on('click', (e) => {
             const latitude = e.lngLat.lat
             const longitude = e.lngLat.lng

             document.getElementById("latitude").value = e.lngLat.lat;
             document.getElementById("longitude").value = e.lngLat.lng;

         }); */
        map.on('click', (e) => {
            const latitude = e.lngLat.lat
            const longitude = e.lngLat.lng
            document.getElementById("latitude").value = e.lngLat.lat;
            document.getElementById("longitude").value = e.lngLat.lng;

            var coords = [latitude, longitude];


            // create the popup
            var popup = new mapboxgl.Popup().setText(coords);

            // create DOM element for the marker
            var el = document.createElement('div');
            el.id = 'marker';

            // create the marker
            if (addMarker) {
                addMarker.setLngLat(e.lngLat)
            } else {
                addMarker = new mapboxgl.Marker(el)
                    .setLngLat(e.lngLat)
                    .setPopup(popup)
                    .addTo(map);
            }
        });

        // var coor = {
        //   !!json_encode($category - > toArray()) !!
        //};

        //   coor.forEach(element => {
        //     console.log(element);
        //  });

        map.addControl(
            new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                trackUserLocation: true
            })
        );

    </script>
@endpush
