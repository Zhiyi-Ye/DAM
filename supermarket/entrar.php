<?php
	require "header.php";


?>
		<div class="container m-5 mx-auto col-4 offset-4 text-white">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<div class="form-group">
					<label for="username">Nom d'usuari:</label>
					<input type="text" class="form-control" name="username" id="username" />
				</div>
				<div class="form-group">
					<label for="pass">Contrasenya:</label>
					<input type="password" class="form-control" name="pass" id="pass" />
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Entrar</button>
				</div>
					<?php
						include "config.php";
						$incioSesion = false;

						if (!empty($_POST)) {

							
							$usuario = $_POST["username"];
							$contrasenya = $_POST["pass"];

							$sql = "SELECT * FROM clients WHERE nom_usuari = '$usuario' AND contrasenya = '$contrasenya'";
							
							$result = $conn->query($sql);

							$row = $result->fetch_assoc();
							if ($row) {	
								
								$_SESSION["user"] = $row["id_client"];

								$incioSesion = true;
								header("Location: comprar.php");

							}else {
								
								echo "<p>Usuari o contrasenya no es valid</p>";

							}
						}
					?>
			</form>
		</div>
	</body>
</html>
