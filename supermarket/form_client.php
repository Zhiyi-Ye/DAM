<?php
	require "header.php";

?>
		<div class="container m-5 mx-auto text-white">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<div class="row">
					<div class="col-4 offset-2">
						<div class="form-group">
							<label for="username">Nom d'usuari (obligatori):</label>
							<input type="text" class="form-control" name="username" id="username" <?php if(isset($_SESSION["user"])){
								echo "value=\"$user\"";
							}  ?>/ >
						</div>
						<div class="form-group">
							<label for="pass">Contrasenya (obligatori):</label>
							<input type="password" class="form-control" name="pass" id="pass" <?php if(isset($_SESSION["user"])){
								echo "value=\"$passd\"";
							}  ?>/>
						</div>
						<div class="form-group">
							<label for="rp_pass">Repeteix la contrasenya (obligatori):</label>
							<input type="password" class="form-control" name="rp_pass" id="rp_pass" <?php if(isset($_SESSION["user"])){
								echo "value=\"$passd\"";
							}  ?> />
						</div>
						<div class="form-group">
							<label for="nombre">Nom (obligatori):</label>
							<input type="text" class="form-control" name="nombre" id="nombre" <?php if(isset($_SESSION["user"])){
								echo "value=\"$nom\"";
							}  ?>/>
						</div>
						<div class="form-group">
							<label for="apellidos">Cognoms (obligatori):</label>
							<input type="text" class="form-control" name="apellidos" id="apellidos" <?php if(isset($_SESSION["user"])){
								echo "value=\"$cognom\"";
							}  ?>/>
						</div>
						<div class="form-group">
							<label for="nif">NIF (obligatori):</label>
							<input type="text" class="form-control" name="nif" id="nif" <?php if(isset($_SESSION["user"])){
								echo "value=\"$nif\"";
							}  ?> />
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="direccion">Adreça (obligatori):</label>
							<input type="text" class="form-control" name="direccion" id="direccion" <?php if(isset($_SESSION["user"])){
								echo "value=\"$adres\"";
							}  ?>/>
						</div>
						<div class="form-group">
							<label for="codigo_postal">Codi postal (obligatori):</label>
							<input type="text" class="form-control" name="codigo_postal" id="codigo_postal" <?php if(isset($_SESSION["user"])){
								echo "value=\"$pos\"";
							}  ?>/>
						</div>
						<div class="form-group">
							<label for="poblacion">Població (obligatori):</label>
							<select class="form-control" name="poblacion" id="poblacion">
								<option value="">Selecciona una opció</option>
								<?php
									include "config.php";
									$sql = "SELECT id_poblacio, nom FROM poblacions order by nom";

									$result = $conn->query($sql);

									if ($result) {

										if ($result->num_rows > 0) {

										$row = $result->fetch_assoc();
										while($row) {

										$id = $row["id_poblacio"];
										$nom = $row["nom"];

										echo "<option value=\"$id\">$nom</option>";

										$row = $result->fetch_assoc();
									}
								} else {
									echo "<p>No hay ningún productes/a</p>";
								}

							} else {
								echo "ERROR al seleccionar los datos";
							}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="telefono">Telèfon:</label>
							<input type="text" class="form-control" name="telefono" id="telefono" <?php if(isset($_SESSION["user"])){
								echo "value=\"$tel\"";
							}  ?>/>
						</div>
						<div class="form-group">
							<label for="codigo_postal">Email:</label>
							<input type="text" class="form-control" name="mail" id="mail" <?php if(isset($_SESSION["user"])){
								echo "value=\"$em\"";
							}  ?>/>
						</div>
						<div class="form-group text-right">
							<button type="submit" class="btn btn-default">Enviar</button>
						</div>
					</div>
				</div>
			</form>
		</div>

		<?php
			require "common/validacions.php";



			if (!empty($_POST)){
				$user = $_POST["username"];
				$pas = $_POST["pass"];
				$rp = $_POST["rp_pass"];
				$nom = $_POST["nombre"];
				$cognom = $_POST["apellidos"];
				$nif = $_POST["nif"];
				$dic = $_POST["direccion"];
				$codi = $_POST["codigo_postal"];
				$pob = $_POST["poblacion"];
				$tel = $_POST["telefono"];
				$mail = $_POST["mail"];

			if(isset($_SESSION["user"])){

				$sss="UPDATE clients SET nom_usuari = '$user', contrasenya = '$pas', nom = '$nom', cognoms = '$cognom', nif = '$nif', adreca = '$dic', codi_postal = '$codi', poblacio = '$pob', telefon = '$tel', email = '$mail' WHERE id_client = $_SESSION[user]";
				echo $sss;
				$result = $conn->query($sss);

		}elseif(!isset($_SESSION["user"])){	
				$mensaje = "";
				$correcte = true;
				if (!nomUsuariValid($user)) {
					$mensaje = $mensaje."usuari no valid. ";
				}
				if ($pas!=$rp) {
					$mensaje ="La contrasenya no coincida. ";
				} else {
					if (seguretatContrasenya($pas != 3)) {
					$mensaje = $mensaje." la contrasenya no es segur. ";
					}
				}
				if (NIFValid($nif)!=true) {
					$mensaje = $mensaje." El nif no es valid";
				}
				if (!esEmail($mail)) {
					$mensaje = $mensaje." El email no es valid";
				}
				echo $mensaje;
				
					if($correcte == true){
						$sq = "INSERT INTO clients (nom_usuari, contrasenya, nom, cognoms, nif, adreca, codi_postal, poblacio, telefon, email) VALUES ('$user', '$pas', '$nom', '$cognom', '$nif', '$dic','$codi' , '$pob', '$tel', '$mail')";
						echo $sq;	

						$result = mysqli_query($conn, $sq);

						if (!$result) {
							echo "ERROR al insertar los datos";		
						} else {

						}
					}else {
						
					}
				
				}
			}

													

		?>
	</body>
</html>
