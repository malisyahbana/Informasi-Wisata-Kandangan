<?php
require("../../config/db.php");

// Gets data from URL parameters.
if (isset($_GET['add_location'])) {
    add_location();
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
