<!DOCTYPE html>
<html>
<head>
	<title>Veículo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<h1>Cadastrar Veículo</h1>
	<?php
		require_once '../certificacao.php';

		if (!Certificacao::isFuncionario()) {
			header("Location: login.php?erro=" . urlencode("Você não é funcionário!"));
		}
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Cadastrar Veículo</h1>
			</div>
		</div>

		<?php if(isset($_GET['msg'])){ 

		?>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="alert alert-danger"><?php echo $_GET['msg'];?></div>
				</div>
			</div>

		<?php }elseif (isset($_GET['erro'])) {?>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="alert alert-danger"><?php echo $_GET['erro'];?></div>
				</div>
			</div>
		<?php } ?>


		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form method="post" action="../controls/cadastrarVeiculoControl.php">
				  <div class="form-group">
				    <label for="marca">Marca: </label>
				    <input type="text" class="form-control" id="marca" name="marca" placeholder="Digite a marca...">
				  </div>
				  <div class="form-group">
				    <label for="modelo">Modelo: </label>
				    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Digite o modelo...">
				  </div>
				  <div class="form-group">
				    <label for="cor">Cor: </label>
				    <input type="text" class="form-control" id="cor" name="cor" placeholder="Digite a cor...">
				  </div>
				  <div class="form-group">
				      <label for="tipo">Selecione o tipo de veículo:</label>
				      <select class="form-control" id="tipo" name="tipo">
				        <option value="C">Carro</option>
				        <option value="M">Moto</option>
				        <option value="O">Outro</option>
				      </select>
				   </div>
				  <input type="hidden" name="placa" value="<?php echo $_GET['placa']; ?>">
				  <input type="hidden" name="horario" value="<?php echo $_GET['horario']; ?>">
				  <div class="text-center">
				  	<button type="submit" class="btn btn-primary">Cadastrar</button>
				  </div>
				</form>
			</div>
		</div>
	</div>

	<!--
	<?php
		echo "<h3>";
		if (isset($_GET['msg'])) {
			echo $_GET['msg'];
		}elseif (isset($_GET['erro'])) {
			echo $_GET['erro'];
		}
		echo "</h3>";
	?>

	<form method="post" action="../controls/cadastrarVeiculoControl.php">
		<label>Marca: <input type="text" name="marca"></label>
		<br>
		<label>Modelo: <input type="text" name="modelo"></label>
		<br>
		<label>Cor: <input type="text" name="cor"></label>
		<input type="hidden" name="placa" value="<?php echo $_GET['placa']; ?>">
		<input type="hidden" name="horario" value="<?php echo $_GET['horario']; ?>">
		<br>
		<select name="tipo">
			<option value="C">Carro</option>
			<option value="M">Moto</option>
			<option value="O">Outro</option>
		</select>
		<input type="submit" value="Cadastrar">
	</form>
	-->
</body>
</html>