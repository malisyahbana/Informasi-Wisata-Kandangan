<?php
include_once '../../header.php';
include "loc_mod.php";
?>

<div class="contentpanel">
    <div class="panel panel-default">
        <div class="panel-heading pageheader">
            <h4 class="panel-title"><i class="fa fa-map-marker"></i> <b>mAPBOX</b></h4>
        </div><!-- panel-heading -->
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div id="map" style="height: 500px"></div>
                </div><!-- col-md-6 -->
            </div><!-- row -->
        </div><!-- panel-body -->
    </div><!-- panel -->
</div>

<?php include_once '../../footer.php'; ?>
<script>
        var saved_markers = <?= get_saved_locations() ?>;
        var user_location = [115.266670, -2.783330];
        mapboxgl.accessToken = 'pk.eyJ1Ijoicml6YWxkZXYiLCJhIjoiY2p2d2Z6a2gwMnVsajN6bzE4cnVla2dscSJ9.rOecnfTEpVlBvFc3ZIrJag';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v9',
            center: user_location,
            zoom: 10
        });

        //  geocoder here
        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            // limit results to Australia
            //country: 'IN',
        });

        var geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            marker: {
                color: 'orange'
            },
            mapboxgl: mapboxgl
        });

        map.addControl(geocoder);

        // Add geolocate control to the map.
        map.addControl(new mapboxgl.GeolocateControl({
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true
        }));

        map.addControl(new mapboxgl.FullscreenControl());

        map.addControl(new mapboxgl.NavigationControl());

        var marker;

        // After the map style has loaded on the page, add a source layer and default
        // styling for a single point.
        map.on('load', function() {
            // addMarker(user_location, 'load');
            add_markers(saved_markers, 'load');

            // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
            // makes a selection and add a symbol that matches the result.
            geocoder.on('result', function(ev) {
                alert("aaaaa");
                console.log(ev.result.center);

            });
        });
        map.on('click', function(e) {
            marker.remove();
            addMarker(e.lngLat, 'click');
            //console.log(e.lngLat.lat);
            document.getElementById("lat").value = e.lngLat.lat;
            document.getElementById("lng").value = e.lngLat.lng;

        });

        // function addMarker(ltlng, event) {

        //     if (event === 'click') {
        //         user_location = ltlng;
        //     }
        //     marker = new mapboxgl.Marker({
        //             draggable: true,
        //             color: "#d02922"
        //         })
        //         .setLngLat(user_location)
        //         .addTo(map)
        //         .on('dragend', onDragEnd);
        // }

        function add_markers(coordinates) {

            var geojson = (saved_markers == coordinates ? saved_markers : '');

            console.log(geojson);
            // add markers to map
            geojson.forEach(function(marker) {
                console.log(marker);
                // make a marker for each feature and add to the map
                new mapboxgl.Marker()
                    .setLngLat(marker)
                    .addTo(map);
            });

        }

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            document.getElementById("lat").value = lngLat.lat;
            document.getElementById("lng").value = lngLat.lng;
            console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
        }

        $('#signupForm').submit(function(event) {
            event.preventDefault();

            var lat = $('#lat').val();
            var lng = $('#lng').val();
            var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
            $.ajax({
                url: url,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    alert(data);
                    location.reload();
                }
            });
        });

        document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
    </script>