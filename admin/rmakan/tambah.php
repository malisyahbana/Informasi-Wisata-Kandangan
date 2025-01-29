<?php
include_once "../../header.php";
include "loc_mod.php";

?>
<div class="top-bar clearfix">
    <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="page-title">
                <h3>Input Data Rumah Makan</h3>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="right-stats" id="mini-nav-right">
                <li>
                    <a href="index.php" class="btn btn-danger"><i class="icon-reply"></i> Kembali</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- konten -->
<div class="row gutter">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="panel panel-blue">
            <div class="panel-heading">
                <!-- <h4>Responsive Table</h4> -->
            </div>
            <div class="panel-body">
                <form id="menuForm" method="post" action="pro.php" enctype="multipart/form-data">
                    <div class="form-group">
                         <?php 
                            $carikode = mysqli_query($link, "SELECT max(idWt) FROM ewisata ") or die(mysql_error());
                            $datakode = mysqli_fetch_array($carikode);
                            if ($datakode) {
                                $nilaikode = substr($datakode[0], 0);
                                $kode = (int)$nilaikode;

                                $kode = $kode + 1;
                                $kodeotomatis = str_pad($kode, 2, "0", STR_PAD_LEFT);
                            } else {
                                $kodeotomatis = "001";
                            }


                            $c = 'HND';
                            $idOto =   $kodeotomatis ;
                            ?>
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Id Rumah Makan</label>
                                <input type="text" value="<?php echo $idOto; ?>" class="form-control" id="idWt" name="idWt" required="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Kategori Tempat</label>
                                <Select class="form-control" name="jns" id="jns">
                                    <option value="">-->Pilih Jenis Kategori<--</option> <option>Wisata Alam</option>
                                    <option>Wisata Religi</option>
                                    <option>Wisata Sejarah</option>
                                    <option>Penginapan</option>
                                    <option>Rumah Makan</option>
                                    <option>Dll</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Nama Rumah Makan</label>
                                <input type="text" class="form-control" id="nama" name="nama" required="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Alamat</label>
                                <textarea type="text" class="form-control" id="alamat" name="alamat" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Keterangan</label>
                                <textarea type="text" class="form-control" id="ket" name="ket" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Upload Foto Rumah Makan</label>
                                <input type="file" class="form-control" name="gbr" id="gbr" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group no-margin">
                        <div class="row gutter">
                            <div class="col-md-6">
                                <!-- <button type="submit" name="add" class="btn btn-warning">Simpan</button> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="panel panel-blue">
            <div class="panel-heading">
                <!-- <h4>Responsive Table</h4> -->
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-md-6">
                        <label class="control-label">Latitude</label>
                        <input type="text" class="form-control input-sm" name="lat" id="lat" required="" readonly /> </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">Longitude</label>
                            <input type="text" class="form-control input-sm" id="lng" name="lng" required="" readonly />
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <div class="row gutter"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <div id='map' style='width: 470px; height: 400px;'></div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <div class="row gutter"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                            <button type="reset" name="reset" class="btn btn-warning">Batal</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

    </script>
    <?php
    include_once "../../footer.php";

    ?>
    <script>
        var saved_markers = <?= get_saved_locations() ?>;
        var user_location = [115.266670, -2.783330];
        mapboxgl.accessToken = 'pk.eyJ1IjoiYWxpc3lhaGJhbmEiLCJhIjoiY2p2cGNrc2x4MW10ajN5bXUzcGU2ZWYxaSJ9.-4aWxoXv2GIkMaYCP8mW-A';
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
            addMarker(user_location, 'load');
            add_markers(saved_markers);

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

        function addMarker(ltlng, event) {

            if (event === 'click') {
                user_location = ltlng;
            }
            marker = new mapboxgl.Marker({
                    draggable: true,
                    color: "#d02922"
                })
                .setLngLat(user_location)
                .addTo(map)
                .on('dragend', onDragEnd);
        }

        // function add_markers(coordinates) {

        //     var geojson = (saved_markers == coordinates ? saved_markers : '');

        //     console.log(geojson);
        //     // add markers to map
        //     geojson.forEach(function(marker) {
        //         console.log(marker);
        //         // make a marker for each feature and add to the map
        //         new mapboxgl.Marker()
        //             .setLngLat(marker)
        //             .addTo(map);
        //     });

        // }

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