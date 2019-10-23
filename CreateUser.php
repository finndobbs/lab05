<?php

$username = $_POST["username"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "finndobbs", "ePh9Ecee", "finndobbs");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id, FROM Users, WHERE user_id=" .$username.;

if ($result = $mysqli->query($query)) {
    // the username is not taken
    $query = "INSERT INTO Users (" .$username. ")";
    $mysqli->query($query));
}
?>
