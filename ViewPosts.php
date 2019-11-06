<html>
	<head>
		<meta charset='UTF-8'>
		<link href='style.css' type='text/css' rel='stylesheet'/>
	</head>
	<body>

		<form action='ViewUserPosts.php' method='post'>
			
			<div>
            Users
            <select name='username'>
                <?php
                    $mysqli = mysqli_connect("mysql.eecs.ku.edu", "finndobbs", "ePh9Ecee", "finndobbs") or die('error');
                    $query = "SELECT * from Users";
                    $result = mysqli_query($mysqli, $query) or die('Error querying database');

                    while ($row = mysqli_fetch_assoc($result)){
                        echo '<option value="'.$row["user_id"].'">'.$row["user_id"].'</option>';

                    }
                    mysqli_close($mysqli);
                ?>
            </select>
			</div>

			<input type='submit'>
			<input type='reset'>
		</form>
	</body>
</html>
