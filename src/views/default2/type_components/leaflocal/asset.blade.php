@push('head')
    <script src="{{ asset('leaflet/leaflet.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" />

    <script src="{{ asset('leaflet/osmgeocoder/Control.OSMGeocoder.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('leaflet/osmgeocoder/Control.OSMGeocoder.css') }}" />
@endpush
@push('bottom')
    <script>
        var map;
        var pin;
        var marker;
        var tilesURL = 'https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.{ext}';
        var mapAttrib =
            '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';
        MapCreate();

        function MapCreate() {
            // create map instance
            if (!(typeof map == "object")) {
                map = L.map('map', {
                    center: [40, 0],
                    zoom: 3
                });
            } else {
                map.setZoom(3).panTo([40, 0]);
            }
            // create the tile layer with correct attribution
            L.tileLayer(tilesURL, {
                attribution: mapAttrib,
                minZoom: 7,
                maxZoom: 20,
                ext: 'png'
            }).addTo(map);
            map.setView([29.735712944678173, -8.646240234375002], 7);
            map.setMaxBounds([
                [28.101, -10.64],
                [31.735, -5.64]
            ]);

            /*** Geocoder ***/
            // OSM Geocoder
            var osmGeocoder = new L.Control.OSMGeocoder({
                collapsed: false,
                position: 'topright',
                text: 'Go',
                placeholder: 'Search location...'
            });

            map.addControl(osmGeocoder);


        }
        map.on("click", function(ev) {
            map.removeLayer(marker);
            $("#{{ $form['latitude'] }}").val(ev.latlng.lat);
            $("#{{ $form['longitude'] }}").val(ev.latlng.lng);
            if (typeof pin == "object") {
                pin.setLatLng(ev.latlng);
            } else {
                pin = L.marker(ev.latlng, {
                    riseOnHover: true,
                    draggable: true
                });
                pin.addTo(map);
                pin.on("drag", function(ev) {
                    $("#{{ $form['latitude'] }}").val(ev.latlng.lat);
                    $("#{{ $form['longitude'] }}").val(ev.latlng.lng);
                });
            }
            // Send lng,lat to reverse geocoder.
            fetch(
                    `https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/reverseGeocode?f=pjson&langCode=fr&location=${ev.latlng.lng},${ev.latlng.lat}`
                )
                .then(res => res.json())
                .then(myJson => {
                    // alert(myJson.address.LongLabel);
                    $("#{{ $form['addresse'] }}").val(myJson.address.LongLabel);
                    // newMarker.bindPopup(myJson.address.LongLabel).openPopup();
                    //console.log(myJson.address);
                });
        });

        marker = L.marker([$("#lat_pin").val(), $("#long_pin").val()]).addTo(map);
    </script>
@endpush
