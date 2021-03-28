<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
		<link rel="stylesheet" type="text/css" href="css/estiloss.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
<body>
			<?php
			include "header.php";

			$mailvalid=true;
			if (empty($_POST) == false){
				$nombre = $_POST["nombre"];
				$allow = array("pdf", "png", "jpg", "rar", "zip");
				$temp = explode(".", $_FILES["archivo"]["name"]);
				$extension = end($temp);
				$mail = $_POST["mail"];
				$text = $_POST["mensaje"];
					$numero=rand(10000,99999);
					$nombres = $_FILES["archivo"]["name"];
					$rutaTmp = $_FILES["archivo"]["tmp_name"];
					$tamanyo = $_FILES["archivo"]["size"];
					$tipo = $_FILES["archivo"]["type"];
					$extension = substr($nombres, strpos($nombres, "."));
					$rutaDestino = "files/".date('Y').date('m').date('d').$numero.$extension;
					$linkDescarga = $_SERVER["HTTP_ORIGIN"]."/uytransfer/$rutaDestino";		
				

				if($text==""){
					$text="Sorpresa!!Alguien ha compartido contigo un archivo";
				}


				if (isset($_POST["validar"])) {
					mail($mail, "ACT1",$text.$linkDescarga);
					if (strpos($mail, "@") == false) {
						$mailvalid = false;
						header("Location: index.php");//si no contingui el caracter @ tornar a index.php
					}
				}

			} else{
				header("Location: index.php");
			}
			if (($_FILES["archivo"]["type"] == "application/pdf")
				|| ($_FILES["archivo"]["type"] == "image/png")
				|| ($_FILES["archivo"]["type"] == "image/jpg")
				|| ($_FILES["archivo"]["type"] == "application/x-zip-compressed")
				|| ($_FILES["archivo"]["type"] == "application/x-rar-compressed")
				&& ($_FILES["archivo"]["size"] <= 1024000)  
				&& in_array($extension, $allowedExts))
				{ 
				if($_FILES["archivo"]["error"] == 0){

				move_uploaded_file($rutaTmp, $rutaDestino);

				echo "<div style=\" width: 300px; padding-left: 30px;padding-top:10px; float:left;margin-top:40px;;\">
				<img src=\"images/mail.jpg\" /style=\" width: 300px;\" >
				</div>";
								echo "<div style=\"float:right; margin-right:200px;margin-top:40px;\">
				<h1 >Archivo enviado correctamente</h1>";
				if(empty($_POST["nombre"])){
				echo "<h3 style=\"float:right;\">Oye tu, usa éste link para compartir tu archivo </h3>
				</div>";
				}
				else{
				echo "<h3 style=\"float:right;\">Hola $nombre, usa éste link para compartir tu archivo </h3>
				</div>";
				}
					echo "<div style=\" width: 300px; padding-left: 350px; float:left;margin-top:40px;;\">
					<a href=\"$rutaDestino\" class=\"mt-5\">$linkDescarga</a>
					</div>";
				}
			
				}elseif($_FILES["archivo"]["error"]==4) {
				echo "<div style=\" width: 300px; padding-left: 30px;padding-top:10px; float:left;margin-top:40px;;\">
				<img src=\"images/no satisfactorio.png\" /style=\" width: 300px;\" >
				</div>";
				echo "<div style=\" width: 600px; margin-left: 260px; float:left;margin-top:40px;;\">
				<h1>No has pujat cap arxiu o format no vàlid</h1>

				</div>";

				}elseif ($_FILES["archivo"]["error"]==2) {
				echo "<div style=\" width: 300px; padding-left: 30px;padding-top:10px; float:left;margin-top:40px;;\">
				<img src=\"images/no satisfactorio.png\" /style=\" width: 300px;\" >
				</div>";
				echo "<div style=\" width: 600px; margin-left: 260px; float:left;margin-top:40px;;\">
				<h1>L'arxiu supera la mida maxima</h1>

				</div>";
				}
					$numlinks = 1;
					if (isset($_COOKIE["numlinks"])) {
						$numlinks = $_COOKIE["numlinks"];
						$numlinks++;
					}
					setcookie("numlinks",$numlinks,time() + 60 * 60 * 24 * 1000);
					setcookie("linkDescarga$numlinks", $linkDescarga,time() + 60 * 60 * 24 * 7);



		?>
</body>
</html>
