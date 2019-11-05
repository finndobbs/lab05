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
    /* the username is not taken */
    $query = "INSERT INTO Users (" .$username. ")";
    $mysqli->query($query));

    //free result
    $result->free();
}
/* close connection */
$mysqli->close();
echo '<head>';
echo "<link href='style.css' type='text/css' rel='stylesheet'/>";
echo '</head>';
echo "<body>";
echo "<p>line 8</p>";
echo "</body>";
?>
