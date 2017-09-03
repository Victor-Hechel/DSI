<!DOCTYPE html>
<html>
<head>
	<title>Adicionar Vaga</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<?php
		require_once '../certificacao.php';

		if (!Certificacao::isGerente()) {
			header("Location: menu.php?erro=" . urlencode("Você não é gerente!"));
		}
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Adicionar Vaga</h1>
			</div>
		</div>

		<?php if(isset($_GET['erro'])){ 

		?>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="alert alert-danger"><?php echo $_GET['erro'];?></div>
			</div>
		</div>
		<?php
		}
		?>


		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form method="post" action="../controls/adicionarVagaControl.php">
				  <div class="form-group">
				      <label for="tipo">Selecione o tipo de vaga:</label>
				      <select class="form-control" id="tipo" name="tipo">
				        <option value="C">Carro</option>
				        <option value="M">Moto</option>
				        <option value="O">Outro</option>
				      </select>
				  </div>
				  <div class="form-group">
				    <label for="andar">Andar: </label>
				    <input type="number" class="form-control" id="andar" name="andar">
				  </div>
				  <div class="form-group">
				    <label for="numero">Número de Vaga: </label>
				    <input type="text" class="form-control" id="numero" name="numero">
				  </div>
				  <div class="text-center">
				  	<button type="submit" class="btn btn-primary">Registrar</button>
				  </div>
				</form>
			</div>
		</div>
	</div>

<!--
	<h1>Adicionar Vaga</h1>
	<form method="post" action="../controls/adicionarVagaControl.php">
		<?php if(isset($_GET['erro'])){ 
				echo "<h3>" . $_GET['erro'] . "</h3>";
			  }
		?>

		<label>
			<span>Tipo de vaga: </span>
			<select name="tipo">
				<option value="C">Carro</option>
				<option value="M">Moto</option>
				<option value="O">Outro</option>
			</select>
		</label>
		<br>
		<label>
			<span>Andar: </span>
			<input type="number" name="andar">
		</label>
		<br>
		<label>
			<span>Número da Vaga: </span>
			<input type="number" name="numero">
		</label>
		<br>
		<input type="submit" value="Registrar">
	</form>
	-->
</body>
</html>