@extends('dashboard')

@section('section')



    <script type="text/javascript" src="{{ URL::asset('js/src/leaflet-src.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/leaflet.css') }}" />
    <script type="text/javascript" src="{{ URL::asset('js/src/Leaflet.draw.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/Leaflet.Draw.Event.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('css/leaflet.draw.css') }}" />
    <script type="text/javascript" src="{{ URL::asset('js/src/Toolbar.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/Tooltip.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/ext/GeometryUtil.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/ext/LatLngUtil.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/ext/LineUtil.Intersect.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/ext/Polygon.Intersect.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/ext/Polyline.Intersect.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/ext/TouchEvents.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/DrawToolbar.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.Feature.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.SimpleShape.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.Polyline.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.Circle.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.Marker.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.Polygon.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/draw/handler/Draw.Rectangle.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/EditToolbar.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/EditToolbar.Edit.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/EditToolbar.Delete.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/Control.Draw.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/Edit.Poly.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/Edit.SimpleShape.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/Edit.Circle.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/Edit.Rectangle.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/src/edit/handler/Edit.Marker.js') }}"></script>





    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Create New Location</h2>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="form-group" >
                    <strong>Select the Area:</strong>
                    <div id="mapid1" style="width: 100%; height: 600px;border: 2px solid black"></div>
                </div>
        </div>
    </div>



    {!! Form::open(array('action' => 'LocationController@store','method'=>'POST')) !!}


    <div class="row">


        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Title:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Enter the name of the place','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Address:</strong>
                {!! Form::text('address', null, array('placeholder' => 'Enter the full address here','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Enter additional information','class' => 'form-control','style'=>'height:250px')) !!}
            </div>
        </div>

        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Coordinates:</strong>
                {!! Form::text('coordinates', null, array('placeholder' => 'Selected Coordinates','class' => 'form-control','id'=>'coordinates','readonly    php ')) !!}
            </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8">
            <div class="form-group">
                <strong>Associated Gallery:</strong>
                {!! Form::select('gallery_id', $galleries, null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div  class="form-group">
                {!! Form::Label('profile', 'Which profile this location belongs to:') !!}
                {!! Form::select('profile_id', $profiles, null, ['class' => 'form-control']) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-primary" href="{{ route('location.index') }}">Back</a>
        </div>

    </div>

    {!! Form::close() !!}



    <script>
        var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">Go Queer</a>',
            osm = L.tileLayer(osmUrl, { maxZoom: 18, attribution: osmAttrib }),
            map = new L.Map('mapid1', { center: new L.LatLng(53.523631, -113.5335), zoom: 11 }),
        drawnItems = L.featureGroup().addTo(map);
        L.control.layers({'osm': osm.addTo(map), "google": L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}',
                {
                    attribution: 'google'
                })}, { 'drawlayer': drawnItems },
                { position: 'topleft', collapsed: false }
            ).addTo(map);
        var drawControl = new L.Control.Draw({
            edit: {
                featureGroup: drawnItems,
                poly: {
                    allowIntersection: false
                }
            },
            draw: {
                polygon: {
                    allowIntersection: false,
                    showArea: true
                },
                polyline : false,
                rectangle : true,
                circle: false,
                marker: true,
                polygon: true
            }
        });
        map.addControl(drawControl);
        map.on(L.Draw.Event.CREATED, function (event) {
            var layer = event.layer;
            drawnItems.addLayer(layer);
        });
        map.on('draw:edited', function (e) {
            console.log('edited')
        });
        map.on('draw:deleted', function (e) {
            document.getElementById("coordinates").value ="No Polygon Selected";
        });
        map.on('draw:created', function (e) {
            var type = e.layerType,
                    layer = e.layer;

            if (type === 'polygon' || type === 'circle' || type === 'rectangle' || type== 'marker') {
                // here you got the polygon points
                var points = layer._latlngs;

                // here you can get it in geojson format
                var geojson = layer.toGeoJSON();
                document.getElementById("coordinates").value = JSON.stringify(geojson);
                console.log('hi');
            }
            // here you add it to a layer to display it in the map
            drawnItems.addLayer(layer);
        });

    </script>






@endsection