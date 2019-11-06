<?php

$user = $_POST['username'];

echo '<style>table, th, td { border:1px solid black;}</style>';
$mysqli = new mysqli("mysql.eecs.ku.edu", "finndobbs", "ePh9Ecee", "finndobbs");
/* check connection */
if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT content FROM Posts WHERE author_id='".$user."'";
$result = $mysqli->query($query);

echo '<table>';
echo '<tr><th scope="col" class="col">User</th><th scope="col" class="col">Posts</th></tr>';
while($row = $result->fetch_assoc()) {
    echo '<tr>';
    foreach ($row as $value){
        echo '<td>'.$user.'</td><td>'.$value.'</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>
