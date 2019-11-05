<?php

$username = $_POST["username"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "finndobbs", "ePh9Ecee", "finndobbs");
/* check connection */
if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users";

if ($result = $mysqli->query($query)) {
    /* the username is not taken */

    $available = FALSE;
    while($row = $result->fetch_assoc()) {
        if ($row["user_id"] == $username){
            $available = FALSE;
            break;
        }
    }
    if ($available){
        $query = "INSERT INTO Users (user_id) VALUES (" .$username. ")";
        if ($mysqli->query($query) === TRUE){
            echo "success";
        } else{
            echo "Error: " .$query. "<br>" .$mysqli->error;
        }
    } else {
        echo "username already taken";
    }

    //free result
    $result->free();
}else{
        echo "Error: " .$query. "<br>" .$mysqli->error;
    }

/* close connection */
$mysqli->close();
echo '<head>';
echo "<link href='style.css' type='text/css' rel='stylesheet'/>";
echo '</head>';
echo "<body>";
echo "</body>";
?>
