<?php
	require "header.php";
	include  "common/carrito.php";

		if (!empty($_POST)){
			$codi=$_POST["codi"];
			$unitat=$_POST["quantitat"];
			echo $codi;
			echo $unitat;
			afegirProducte($codi,"asad","12.2",$unitat);
		}	
	
?>
		<div class="container m-5 mx-auto">
			<div class="col-8 offset-2">
				<h3 class="text-white">Contingut del carrito</h3>
				<table class="table">        
					<tr> 
						<th>Producte</th> 
						<th class="text-right">Preu</th>
						<th class="text-right">Unitats</th>
						<th class="text-right">Import</th>
						<th class="text-right">Eliminar</th>
					</tr>
					<tr> 
						<td class="align-middle">
							Arroz Golden Sun 1 kg
						</td>
						<td class="align-middle text-right">0.75 €</td>
						<td class="align-middle text-right">2 u.</td>
						<td class="align-middle text-right">1.50 €</td>
						<td class="align-middle text-right"><form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get"><button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button></form></td>
					</tr>
					<tr> 
						<td class="align-middle">
							Arroz Golden Sun 1 kg
						</td>
						<td class="align-middle text-right">0.75 €</td>
						<td class="align-middle text-right">2 u.</td>
						<td class="align-middle text-right">1.50 €</td>
						<td class="align-middle text-right"><form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get"><button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button></form></td>
					</tr>
					<tr> 
						<td class="align-middle">
							Arroz Golden Sun 1 kg
						</td>
						<td class="align-middle text-right">0.75 €</td>
						<td class="align-middle text-right">2 u.</td>
						<td class="align-middle text-right">1.50 €</td>
						<td class="align-middle text-right"><form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get"><button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button></form></td>
					</tr>
					<tr> 
						<td class="align-middle">
							Arroz Golden Sun 1 kg
						</td>
						<td class="align-middle text-right">0.75 €</td>
						<td class="align-middle text-right">2 u.</td>
						<td class="align-middle text-right">1.50 €</td>
						<td class="align-middle text-right"><form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get"><button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button></form></td>
					</tr>
					<tr> 
						<td class="align-middle">
							Arroz Golden Sun 1 kg
						</td>
						<td class="align-middle text-right">0.75 €</td>
						<td class="align-middle text-right">2 u.</td>
						<td class="align-middle text-right">1.50 €</td>
						<td class="align-middle text-right"><form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get"><button type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i></button></form></td>
					</tr>
					<tr class="bg-info"> 
						<th colspan="3" scope="row" class="text-right">							
							Import total
						</td>
						<td class="align-middle text-right">7.50 €</td>
					</tr>
				</table>
				<div class="text-right">
					<a href="comprar.php" class="btn btn-outline-secondary mx-2">Afegir més productes</a>
					<a href="index.php" class="btn btn-secondary">Finalitzar la compra</a>
				</div>
			</div>
		</div>
		<?php




		?>
	</body>
</html>
