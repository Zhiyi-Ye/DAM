<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
		<link rel="stylesheet" type="text/css" href="css/estiloss.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
	<?php	
		include "header.php";
	?>	
	<div id="tabla" align="center">
		<form action="upload.php" method="post" enctype="multipart/form-data" name="datos" id="formulari">
			<div class="container-fluid pt-5" id="formu">
				<div class="form-check col-md-4" id="nn">
			  		<input type="text"  name="nombre" placeholder="Tu nombre" id="nom" >

				</div>
			
			  	<div class="form-group col-md-5" id="ss">
			   		<input type="file" id="fitxe" name="archivo">
			 	</div></br>

			    <div class="form-check col-md-4" id="vv">
			  		<input class="form-check-input" type="checkbox" value="" id="valida" name="validar">
			  		<label class="form-check-label" for="defaultCheck1">
			    		Quiero enviar el link de descarga por email
			  		</label>
				</div>
				
			    <div class="form-group col-md-4" id="mm">
			      <input type="email"  id="mail" placeholder="Email de destinatario" name="mail">
			    </div>
	  	 		<p id="missatge">Mensaje</p>
	 		 	<p><textarea name="mensaje" cols="60" rows="5"></textarea></p>
	 	 		</div>
	 	 		<button type="submit" id="boton">subir archivo</button>
	 	</form>
	</div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
     
	</body>   
</html>