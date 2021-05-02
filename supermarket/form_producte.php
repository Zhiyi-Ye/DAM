<?php
	require "header.php";
	include "config.php";
	$info="";
	if (isset($_GET['codi'])) {
		if ($_GET['codi'] != " ") {
			$info = $_GET['codi'];
		}
	}
	if ($info != "") {
		$sss = "SELECT * FROM productes WHERE codi = '$info'";

	$resu = $conn->query($sss);
							if ($resu) {

								if ($resu->num_rows > 0) {

									$row = $resu->fetch_assoc();
									    while($row) {
										$img = $row["imatge"];
										$nome = $row["nom"];
										$Categ= $row["categoria"];
										$pre = $row["preu"];
										$unitat = $row["unitats_stock"];
										$row = $resu->fetch_assoc();
										}	
								}
							}else {
								echo "ssssss";
							}
	}

	

	


?>
		<div class="container m-5 mx-auto text-white">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-4 offset-2">
						<div class="form-group">
							<label for="codi">Codi:</label>
							<input type="text" class="form-control" name="codi" id="codi" <?php if (isset($info)) {
						echo "value=\"$info\"";
					} ?>>
						</div>
						<div class="form-group">
							<label for="nom">Nom:</label>
							<input type="text" class="form-control" name="nom" id="nom" <?php if (isset($nome)) {
						echo "value=\"$nome\"";
					} ?>>
						</div>
						<div class="form-group">
							<label for="categoria">Categoria:</label>
							<select class="form-control" name="categoria" id="categoria" >
								<option value="">Selecciona una opció</option>
								<option value="1">Arròs</option>
								<?php 
									if ($Categ) {
										$sql = "SELECT id_categoria, nom FROM categories where 	id_categoria = '$Categ' ORDER BY nom";
									}else {
										$sql = "SELECT id_categoria, nom FROM categories ORDER BY nom";
									}
									$result = $conn->query($sql);
									if ($result) {

										if ($result->num_rows > 0) {

										$row = $result->fetch_assoc();
										while($row) {

										$id = $row["id_categoria"];
										$nom = $row["nom"];
										if ($Categ) {
										echo " <option selected value=\"$id\">$nom</option> ";
										}else{
											echo " <option value=\"$id\">$nom</option> ";
										}
										$row = $result->fetch_assoc();
									}
								} else {
									echo "<p>No hay ningún categoria</p>";
								}

							}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="preu">Preu:</label>
							<input type="number" class="form-control" name="preu" id="preu" <?php if (isset($pre)) {
						echo "value=\"$pre\""; } ?>/>
						</div>
						<div class="form-group">
							<label for="stock">Unitats en stock:</label>
							<input type="number" class="form-control" name="stock" id="stock" <?php if (isset($unitat)) {
						echo "value=\"$unitat\"";
					} ?>>
						</div>
						<div class="form-group text-right">
							<a href="productes.php" class="btn btn-outline-secondary mx-2">Tornar</a>
							<button type="submit" class="btn btn-default">Guardar</button>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<label for="imatge">Imatge:</label>
							<input type="file" class="form-control" name="imatge" id="imatge" />
						</div>
						<div class="text-center">
							<img src="images/productes/no-image.png" class="img-thumbnail" style="height: 250px;" />
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php 
		if (!empty($_POST)){

				$codi=$_POST["codi"];
				$categoria =$_POST["categoria"];
				$nom =$_POST["nom"];
				$preu =$_POST["preu"];
				$img = $_FILES["imatge"]["name"];
				$unitat=$_POST["stock"];
				$codi = $_POST["codi"];
				$temp = explode(".", $_FILES["imatge"]["name"]);
				$rutaTmp = $_FILES["imatge"]["tmp_name"];
				$extension = substr($img, strpos($img, "."));
				$rutaDestino = "images/productes/".$codi.$extension;


				$sql = "INSERT INTO productes VALUES ('$codi', '$categoria', '$nom', '$preu', '$unitat', '$img')";
				$result = $conn->query($sql);
				echo $sql;

				if ($result) {
					header("Location: form_producte.php");
					echo "Datos insertados correctamente";
					if($_FILES["imatge"]["error"] == 0){
					move_uploaded_file($rutaTmp, $rutaDestino);
				}
				} else {
					echo "ERROR al insertar los datos";
				}
		}



		?>
	</body>
</html>
