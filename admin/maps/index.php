<?php
include_once "../../header.php";
?>
<!-- Judul Halaman -->
<div class="top-bar clearfix">
    <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="page-title">
                <h3>Marker Terdata</h3>
                <p>Map Seluruh Tempat / <a href="#">Maps</a> / <a href="#">Home</a></p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="right-stats" id="mini-nav-right">
                <!-- <li>
                    <a href="mapw.php" class="btn btn-success"><span><i class="icon-map2"></i></span>Tempat Wisata</a>
                </li>
                <li>
                    <a href="mapp.php" class="btn btn-success"><span><i class="icon-map2"></i></span>Penginapan</a>
                </li>
                <li>
                    <a href="maprm.php" class="btn btn-success"><i class="icon-map2"></i>Rumah Makan</a>
                </li> -->
            </ul>
        </div>
    </div>
</div>
<!-- Top Bar Ends -->

<div id="map" style="height: 500px"></div>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAvipLM2vFAwgLRnaw55gvaqAwkzg5VYg&sensor=false"></script>


<script>
    var marker;

    function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var infoWindow = new google.maps.InfoWindow;
        var bounds = new google.maps.LatLngBounds();



        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
        }

        function addMarker(lat, lng, info) {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);
            var marker = new google.maps.Marker({
                map: map,
                position: pt,

            });
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
        }

        <?php
        $query = mysqli_query($link, "SELECT * FROM ewisata");
        while ($row = $query->fetch_array()) {
            $lat  = $row['lat'];
            $lng  = $row['lng'];
            $nama = $row['nama'];
            $ket   = $row['ket'];
            echo ("addMarker($lat, $lng, '<b>$nama<br>Keterangan : $ket</br>');\n");
        }
        ?>
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>
    jQuery(document).ready(function() {
        Main.init();
        Maps.init();
    });
</script>
<?php
include_once "../../footer.php";
?>