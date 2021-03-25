<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		include "header.php";

		
		if (isset($_COOKIE["numlinks"])) {
			$numlinks = $_COOKIE["numlinks"];
			echo "<h1 style=\" margin-left:350px;margin-top:40px;\">Archivos enviados recientemente</h1>";
			while (isset($_COOKIE["linkDescarga$numlinks"])) {
				$link = $_COOKIE["linkDescarga$numlinks"];
				echo "<h5 style=\" margin-left:400px;margin-top:40px;text-decoration:underline;\"><a href=\"$link\">$link</a></h5>";
				$numlinks--;
			}
		}

	?>
</body>
</html>