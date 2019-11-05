<?php
echo '<head>';
echo "<link href='style.css' type='text/css' rel='stylesheet'/>";
echo '</head>';
echo "<body>";

$username = $_POST["username"];
$post = $_POST["post"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "finndobbs", "ePh9Ecee", "finndobbs");
/* check connection */
if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users";
#$query = "SELECT user_id FROM Users WHERE user_id='".$username."'";
#if($result = $mysqli->query($query)){
    #echo $result ? 'true' : 'false';
#} else{
    #echo "Error: " .$query. "<br>" .$mysqli->error;
#}
if ($result = $mysqli->query($query)){
    $user_exists = FALSE;
    while($row = $result->fetch_assoc()){
        if ($row["user_id"] == $username){
            $user_exists = TRUE;
        }
    }

    if ($user_exists){
        $query = "INSERT INTO Posts (content, author_id) VALUES ('".$post."','" .$username. "')";
        $result->free();
        if($result = $mysqli->query($query)){
            echo "success";
        } else{
            echo "Error: " .$query. "<br>" .$mysqli->error;
        }
    } else{
        echo "user " .$username. " does not exist";
    }
} else {
    echo "Error: " .$query. "<br>" .$mysqli->error;
}
//free result
$result->free();
/* close connection */
$mysqli->close();
echo "</body>";
?>
