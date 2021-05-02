<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$servername="localhost";
		$username = "root";
		$password = "";
		$dbname="supermercat";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
		die("error el connectar base de datos");
		}
	?>

</body>
</html>