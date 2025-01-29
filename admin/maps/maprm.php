<?php
include_once '../../header.php';
include "loc_mod.php";
?>
<style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
        }

        .marker {
            background-image: url('<?= base_url(); ?>/img/lokasi-logo-25366.png');
            background-size: cover;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }

        .mapboxgl-popup {
            max-width: 200px;
        }

        .mapboxgl-popup-content {
            text-align: center;
            font-family: 'Open Sans', sans-serif;
        }
    </style>
<div class="contentpanel">
    <div class="panel panel-default">
        <div class="panel-heading pageheader">
            <h4 class="panel-title"><i class="fa fa-map-marker"></i> <b>mAPBOX</b></h4>
        </div><!-- panel-heading -->
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div1 id="map" style="height: 800px"></div1>
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
            style: 'mapbox://styles/mapbox/satellite-v9',
            center: user_location,
            zoom: 15
        });
// Add geolocate control to the map.
map.addControl(
new mapboxgl.GeolocateControl({
positionOptions: {
enableHighAccuracy: true
},
// When active the map will receive updates to the device's location as it changes.
trackUserLocation: true,
// Draw an arrow next to the location dot to indicate which direction the device is heading.
showUserHeading: true
})
);

// Adding markers below >>>
</script>
<script>
<?php

$dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'sigkdg';
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli->connect_error);
            exit();
        }
        printf('Connected successfully.<br />');
         $sql = "SELECT * FROM ewisata WHERE jns = 'Rumah Makan'";
        
        $result = $mysqli->query($sql);
        
        if ($result->num_rows > 0) {
        } else {
            printf('Unexpected Error. DB did not return enough values for a successful export.<br />');
        }

?>
</script>

<script>
const geojson = {
type: 'FeatureCollection',
features: [
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        $displayName = $row['nama'];
        $displayDescription = $row['alamat'];
        ?>
        {
            type: "Feature",
            geometry: {
                type: "Point",
                coordinates: [<?php echo $row['lng']; ?>, <?php echo $row['lat']; ?>]
            },
            properties: {
                title: "<?php echo $displayName; ?>",
                description: "<?php echo $displayDescription; ?>"
            }
        },
<?php
    
}

mysqli_free_result($result);
$mysqli->close();
?>
]
};

// add markers to map
// Popups and Display Details
for (const feature of geojson.features) {
// create a HTML element for each feature
const el = document.createElement('div1');
el.className = 'marker';

// make a marker for each feature and add it to the map
new mapboxgl.Marker(el)
.setLngLat(feature.geometry.coordinates)
.setPopup(
new mapboxgl.Popup({ offset: 25 }) // add popups
.setHTML(
`<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
)
)
.addTo(map);
}

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
</script>
