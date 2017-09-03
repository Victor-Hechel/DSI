<!DOCTYPE html>
<html>
<head>
	<title>Tabela de Preços</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

	<?php
		require '../controls/tabelaPrecosGet.php';
	?>

	<?php
		require_once '../certificacao.php';

		if (!Certificacao::isGerente()) {
			header("Location: menu.php?erro=" . urlencode("Você não é gerente!"));
		}
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 text-center"><h1>Tabela Preços</h1></div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form method="post" action="../controls/tabelaPrecosControl.php">
				  <div class="form-group">
				    <label for="carro">Carro: </label>
				    <input type="number" class="form-control" id="carro" name="carro" step="0.01" value="<?php echo $carro;?>">
				  </div>
				  <div class="form-group">
				    <label for="moto">Moto: </label>
				    <input type="number" class="form-control" id="moto" name="moto" step="0.01" value="<?php echo $moto; ?>">
				  </div>

				  <div class="form-group">
				    <label for="outro">Outro: </label>
				    <input type="number" class="form-control" id="outro" name="outro" step="0.01" value="<?php echo $outro; ?>">
				  </div>

				  <div class="form-group">
				    <label for="diaria">Diária: </label>
				    <input type="number" class="form-control" id="diaria" name="diaria" step="0.01" value="<?php echo $diaria; ?>">
				  </div>

				  <div class="form-group">
				    <label for="diaria">Per Noite: </label>
				    <input type="number" class="form-control" id="per_noite" name="per_noite" step="0.01" value="<?php echo $per_noite; ?>">
				  </div>

				  <div class="text-center">
				  	<button type="submit" class="btn btn-primary">Atualizar</button>
				  </div>
				</form>
			</div>
		</div>
	</div>

	<!--<h1>Tabela Preços</h1>
	<form method="post" action="../controls/tabelaPrecosControl.php">
		<label>Carro: <input type="number" name="carro" step="0.01" value="<?php echo $carro; ?>"></label>
		<br>
		<label>Moto: <input type="number" name="moto" step="0.01" value="<?php echo $moto; ?>"></label>
		<br>
		<label>Outro: <input type="number" name="outro" step="0.01" value="<?php echo $outro; ?>"></label>
		<br>
		<label>Diária: <input type="number" name="diaria" step="0.01" value="<?php echo $diaria; ?>"></label>
		<br>
		<label>Per Noite: <input type="number" name="per_noite" step="0.01" value="<?php echo $per_noite; ?>"></label>
		<br>
		<input type="submit" value="Atualizar">
	</form>-->
</body>
</html>