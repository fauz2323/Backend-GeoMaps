@extends('layouts.app')

@section('content')
<div class="container bg-white pb-3 pt-3">
    <div class="row">
        <div class="card border-success mb-3" style="max-width: 18rem;">
            <div class="card-header bg-transparent border-success">Kategori</div>
            <div class="card-body text-success">
              <h3 class="card-text">{{ \App\Models\Category::count() }}<sup style="font-size: 20px"></sup></h3></div>
            <div class="card-footer bg-transparent border-success"><a href="{{ route('category.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div id='map' style='width: 1000px; height: 600px;'></div>
        </div>
    </div>
</div>

@endsection
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
@endpush

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <script>
        var addMarker;
        mapboxgl.accessToken = '{{ env('MAPBOX_KEY') }}';
        const location112 = [ 106.625141,-6.618823,];

        var map = new mapboxgl.Map({
            container: 'map',
            center: location112,
            zoom: 11.5,
            style: 'mapbox://styles/mapbox/streets-v11'
        });

        var projects = <?php echo json_encode($data);?>;
        console.log(projects[0]['latitude']);
        console.log(projects[0]['longitude']);

        for (let index = 0; index < projects.length; index++) {
            var popup = new mapboxgl.Popup().setText(projects[index]['nama']).addTo(map);
            var marker = new mapboxgl.Marker().setLngLat([projects[index]['longitude'],projects[index]['latitude']]).addTo(map).setPopup(popup);
        }

        /* map.on('click', (e) => {
             const latitude = e.lngLat.lat
             const longitude = e.lngLat.lng

             document.getElementById("latitude").value = e.lngLat.lat;
             document.getElementById("longitude").value = e.lngLat.lng;

         }); */

        map.addControl(
            new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                trackUserLocation: true
            })
        );
        map.addControl(new mapboxgl.NavigationControl());

    </script>
@endpush
