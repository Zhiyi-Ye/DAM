<?php
	require "header.php";
	include "config.php";
	if (!empty($_POST)){
		$cod=$_POST["codi"];
			$sb = "DELETE FROM productes WHERE codi = '$cod'";
			$result = $conn->query($sb);
	}

?>
		<div class="container m-5 mx-auto">
			<div class="col-8 offset-2">
				<table class="table">        
					<tr> 
						<th>Producte</th> 
						<th>Categoria</th>
						<th>Preu</th>
						<th></th>
					</tr>
					<tr> 
						<td class="align-middle">
							<img src="images/productes/no-image.png" class="img-thumbnail mr-2" style="height: 50px;" />
							Arroz Golden Sun 1 kg
						</td>
						<td class="align-middle">Arròs</td>
						<td class="align-middle">0.75 €</td>
						<td class="align-middle">
							<form class="form-inline" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
								<a href="form_producte.php?codi=ARR00001" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
								<div class="form-group">
									<input type="hidden" name="codi" value="ARR00001" />
								</div>
								<button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
							</form>
						</td> 
					</tr>
					<tr> 
						<td class="align-middle">
							<img src="images/productes/no-image.png" class="img-thumbnail mr-2" style="height: 50px;" />
							Arroz Golden Sun 1 kg
						</td>
						<td class="align-middle">Arròs</td>
						<td class="align-middle">0.75 €</td>
						<td class="align-middle">
							<form class="form-inline" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
								<a href="form_producte.php?codi=ARR00001" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
								<div class="form-group">
									<input type="hidden" name="codi" value="ARR00001" />
								</div>
								<button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
							</form>
						</td> 
					</tr>
					<tr> 
						<td class="align-middle">
							<img src="images/productes/no-image.png" class="img-thumbnail mr-2" style="height: 50px;" />
							Arroz Golden Sun 1 kg
						</td>
						<td class="align-middle">Arròs</td>
						<td class="align-middle">0.75 €</td>
						<td class="align-middle">
							<form class="form-inline" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
								<a href="form_producte.php?codi=ARR00001" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
								<div class="form-group">
									<input type="hidden" name="codi" value="ARR00001" />
								</div>
								<button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
							</form>
						</td> 
					</tr>
					<tr> 
						<td class="align-middle">
							<img src="images/productes/no-image.png" class="img-thumbnail mr-2" style="height: 50px;" />
							Arroz Golden Sun 1 kg
						</td>
						<td class="align-middle">Arròs</td>
						<td class="align-middle">0.75 €</td>
						<td class="align-middle">
							<form class="form-inline" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
								<a href="form_producte.php?codi=ARR00001" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
								<div class="form-group">
									<input type="hidden" name="codi" value="ARR00001" />
								</div>
								<button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
							</form>
						</td> 
					</tr>
					<tr> 
						<td class="align-middle">
							<img src="images/productes/no-image.png" class="img-thumbnail mr-2" style="height: 50px;" />
							Arroz Golden Sun 1 kg
						</td>
						<td class="align-middle">Arròs</td>
						<td class="align-middle">0.75 €</td>
						<td class="align-middle">
							<form class="form-inline" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> method="post">
								<a href="form_producte.php?codi=ARR00001" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
								<div class="form-group">
									<input type="hidden" name="codi" value="ARR00001" />
								</div>
								<button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button>
							</form>
						</td> 
					</tr>
					<?php
						$sql="SELECT * FROM detall_productes";
						$result = $conn->query($sql);
						if ($result) {

							if ($result->num_rows > 0) {

									$row = $result->fetch_assoc();
										while($row) {
										$img = $row["imatge"];
										$nom = $row["nom"];
										$cat = $row["nom_categoria"];
										$preu = $row["preu"];
										$codi = $row["codi"];
										echo "<tr>";
										echo "<td class=\"align-middle\"><img src=$img class=\"img-thumbnail mr-2\" style=\"height: 50px;\" />$nom</td>";
										echo "<td class=\"align-middle\">$cat</td>";
										echo "<td class=\"align-middle\">$preu €</td>";
										echo "<td class=\"align-middle\">
							<form class=\"form-inline\" action=\"productes.php\" method=\"post\">
								<a href=\"form_producte.php?codi=$codi\" class=\"btn btn-primary\"><i class=\"fas fa-pencil-alt\"></i></a>
								<div class=\"form-group\">
									<input type=\"hidden\" name=\"codi\" value=$codi />
								</div>
								<button type=\"submit\" class=\"btn btn-primary\"><i class=\"fas fa-trash-alt\"></i></button>
							</form>
						</td>";
										echo "</tr>";


										$row = $result->fetch_assoc();
									}
								}
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>
