<?php
include_once "../../header.php";
include "loc_mod.php";

?>
<div class="top-bar clearfix">
    <div class="row gutter">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="page-title">
                <h3>Edit Data Wisata</h3>
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
                <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM ewisata WHERE idWt = '$id' ";
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Id Wisata</label>
                                <input type="text" value="<?= $row['idWt'] ?>" class="form-control" id="idWt" name="idWt" required="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Jenis Tempat</label>
                                <Select class="form-control" name="jns" id="jns">
                                    <option value="Wisata" <?php if ($row['jns'] == "Wisata") {echo "Selected";} ?>>Wisata</option>
                                    <option value="Penginapan" <?php if ($row['jns'] == "Penginapan") {echo "Selected";} ?> >Penginapan</option>
                                    <option value="Rumah Makan" <?php if ($row['jns'] == "Rumah Makan") {echo "Selected";} ?> >Rumah Makan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Kategori Tempat</label>
                                <Select class="form-control" name="kat" id="kat">
                                    <option value="Alam" <?php if ($row['jns'] == "Alam") {echo "Selected";} ?>>Alam</option>
                                    <option value="Religi" <?php if ($row['jns'] == "Religi") {echo "Selected";} ?> >Religi</option>
                                    <option value="Sejarah" <?php if ($row['jns'] == "Sejarah") {echo "Selected";} ?> >Sejarah</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Nama Wisata</label>
                                <input type="text" value="<?= $row['nama'] ?>" class="form-control" id="nama" name="nama" required="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Alamat</label>
                                <input type="text" value="<?= $row['alamat'] ?>" class="form-control" id="alamat" name="alamat" rows="2"></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Keterangan</label>
                                <input type="text" value="<?= $row['ket'] ?>" class="form-control" id="ket" name="ket" rows="5"></input>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Harga</label>
                                <input type="text" value="<?= $row['harga'] ?>" class="form-control" id="harga" name="harga" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Biaya Masuk</label>
                                <input type="text" class="form-control" id="bm" name="bm" value="<?= $row['bm'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">fav</label>
                                <input type="text" class="form-control" id="fav" name="fav" value="<?= $row['fav'] ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row gutter">
                            <div class="col-md-11">
                                <label class="control-label">Upload Foto Wisata</label>
                                <img src="<?= base_url() ?>/img/<?= $row['foto']; ?>" class="img-responsive">
                                <input type="checkbox" name="ubah_foto" id="centang" value="true">
                            <label for="centang">Centang jika ingin mengubah foto</label>
                            <input type="file" name="gbr" id="gbr" class="form-control" value="<?= $row['foto']; ?>">
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
                        <input type="text" value="<?= $row['lat'] ?>" class="form-control input-sm" name="lat" id="lat" required="" readonly /> </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label class="control-label">Longitude</label>
                            <input type="text" value="<?= $row['lng'] ?>" class="form-control input-sm" id="lng" name="lng" required="" readonly />
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
                            <button type="submit" name="edit" class="btn btn-success">Simpan</button>
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