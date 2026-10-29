<?php
require("../../config/db.php");

// Gets data from URL parameters.
if (isset($_GET['add_location'])) {
    add_location();
}

function add_location()
{
    global $connection;
    $con = $connection;
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $idWt = $_GET['idWt'];
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    // Inserts new row with place data.
    $query = sprintf(
        "INSERT INTO tempat " .
            " (idWt, lat, lng) " .
            " VALUES (%s, '%s', '%s');",
        mysqli_real_escape_string($con, $idWt),
        mysqli_real_escape_string($con, $lat),
        mysqli_real_escape_string($con, $lng)
    );

    $result = mysqli_query($con, $query);
    echo json_encode("Inserted Successfully");
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}

function get_saved_locations()
{
    global $connection;
    $con = $connection;
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    // update location with location_status if admin location_status.
    $sqldata = mysqli_query($con, "select lng,lat from tempat ");

    $rows = array();
    while ($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;
    }
    $indexed = array_map('array_values', $rows);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}
?>
