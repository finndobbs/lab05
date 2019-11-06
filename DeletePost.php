<?php

$post_ids = $_POST['post'];

echo '<style>table, th, td { border:1px solid black;}</style>';
$mysqli = new mysqli("mysql.eecs.ku.edu", "finndobbs", "ePh9Ecee", "finndobbs");
/* check connection */
if ($mysqli->connect_error) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$N = count($post_ids);
for ($i=0;$i < $N; $i++){
    $query = "DELETE FROM Posts WHERE post_id='".$post_ids[$i]"'";
    $result = $mysqli->query($query);

echo '<table>';
echo '<tr><th scope="col" class="col">post_id</th></tr>';
while($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>'.$row["post_id"].'</td>';
    echo '</tr>';
}
echo '</table>';
?>
