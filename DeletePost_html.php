<html>
	<head>
		<meta charset='UTF-8'>
		<link href='style.css' type='text/css' rel='stylesheet'/>
	</head>
	<body>

		<form action='DeletePost.php' method='post'>
			
			<table>
            <th scope="col" class="col">Delete</th>
            <th scope="col" class="col">Post ID</th>
            <th scope="col" class="col">User</th>
            <th scope="col" class="col">Post</th>

            <?php
                $mysqli = mysqli_connect("mysql.eecs.ku.edu", "finndobbs", "ePh9Ecee", "finndobbs") or die('error');
                $query = "SELECT * from Posts";
                $result = mysqli_query($mysqli, $query) or die('Error querying database');

                while ($row = mysqli_fetch_assoc($result)){
                    echo '<tr><td><input type="checkbox" name="post[]" value="'.$row["post_id"].'"></td>';
                    echo '<td>'.$row["post_id"].'</td>';
                    echo '<td>'.$row["author_id"].'</td>';
                    echo '<td>'.$row["content"].'</td></tr>';

                }
                mysqli_close($mysqli);
            ?>
			</table>

			<input type='submit'>
			<input type='reset'>
		</form>
	</body>
</html>
