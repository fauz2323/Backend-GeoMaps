@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('wisata.store') }}" method="post">
        @csrf
        <div class="row">
        <div class="col-md">
            <div id='map' style='width: 100%; height: 100%;'></div>
        </div>
        <div class="col-md">
            <div class="form-group mb-3">
                <label for="Category" class="form-label">Category</label>
                <select class="form-control" name="category_id" aria-label="Default select example">
                    <option selected disabled>Open this select menu</option>
                    @foreach($category as $item)
                        <option value="{{ $item->id }}">{{ $item->categori }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="form-group mb-3">
                <label for="Category" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="category wisata">
            </div>
            <div class="form-group mb-3">
                <label for="Category" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" placeholder="category wisata">
            </div>
            <div class="form-group mb-3">
                <label for="Category" class="form-label">Desc</label>
                <input type="text" class="form-control" name="deskripsi" placeholder="category wisata">
            </div>
            <div class="form-group mb-3">
                <label for="Category" class="form-label">Lat</label>
                <input type="text" class="form-control" id="latitude" name="latitude" placeholder="..."
                    value="">
            </div>
            <div class="form-group mb-3">
                <label for="Category" class="form-label">Long</label>
                <input type="text" class="form-control" id="longitude" name="longitude" placeholder="..."
                    value="">
            </div>
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </div>

    </form>
</div>

@endsection

@push('script')
    <script>
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
