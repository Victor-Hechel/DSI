<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<?php
		require_once '../certificacao.php';

		if (!Certificacao::isFuncionario()) {
			header("Location: ../index.php?erro=" . urlencode("Você não é funcionário!"));
		}
	?>

	<div class="container-fluid">
		
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Estacionamento</h1>
			</div>
		</div>

		<?php if(isset($_GET['sucesso'])){ 

		?>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="success alert-success"><?php echo $_GET['sucesso'];?></div>
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
				<form method="post" action="../controls/registrar.php">
				  <div class="form-group">
				    <label for="placa">Placa: </label>
				    <input type="text" class="form-control" id="placa" name="placa" placeholder="Digite a placa...">
				  </div>
				  <div class="form-group">
				    <label for="horario">Horário: </label>
				    <input type="datetime-local" class="form-control" id="horario" name="horario">
				  </div>
				  <div class="form-group">
					    <span>Gerente: </span>
					    <br>
					    <label class="radio-inline">
							<input type="radio" name="registro" value = 0>Entrada
						</label>
						<label class="radio-inline">
							<input type="radio" name="registro" value = 1>Saída
						</label>
					</div>
				  <div class="text-center">
				  	<button type="submit" class="btn btn-primary">Registrar</button>
				  </div>
				</form>
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<a href="estacionamento.php" class="btn btn-default">Situação do estacionamento</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<a href="adicionarVaga.php" class="btn btn-default">Adicionar Vaga</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<a href="contratarFuncionario.php" class="btn btn-default">Contratar Funcionário</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<a href="tabelaPrecos.php" class="btn btn-default">Tabela preços</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<a href="../controls/deslogar.php" class="btn btn-default">Deslogar</a>
			</div>
		</div>

		<!--<div class="form-group">
		    <label class="radio-inline">
				<input type="radio" name="registro" value = 0>Entrada
			</label>
			<label class="radio-inline">
				<input type="radio" name="registro" value = 1>Saída
			</label>
		</div>



		<table>
			<tr>
				<td><label for="placa">Placa:</label></td>
				<td><input type="text" name="placa" id="placa" required></td>
			</tr>
			<tr>
				<td><label for="horario">Horário:</label></td>
				<td><input type="datetime-local" name="horario" id="horario" required></td>
			</tr>
			<tr>
				<td><input type="radio" name="registro" value=0 checked>Entrada</td>
				<td><input type="radio" name="registro" value=1>Saída</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Registrar"></td>
			</tr>
			<tr>
				<td colspan="2">
					<button><a href="estado.php">Verificar situação do estacionamento</a></button>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<button><a href="registrosVeiculos.html">Verificar registros de um veiculo</a></button>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<a href="adicionarVaga.php">Adicionar Vaga</a>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<a href="contratarFuncionario.php">Contratar Funcionario</a>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<a href="../controls/deslogar.php">Deslogar</a>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<a href="tabelaPrecos.php">Tabela preços</a>
				</td>
			</tr>
		</table>-->
	</div>
</body>
</html>
<!--

if(isset($_GET['erro'])){ 
				echo "<h3>" . $_GET['erro'] . "</h3>";
			}elseif (isset($_GET['sucesso'])) {
				echo "<h3>" . $_GET['sucesso'] . "</h3>";
			}

-->