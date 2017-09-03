<!DOCTYPE html>
<html>
<head>
	<title>Fim</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

	<?php
		require_once '../certificacao.php';

		if (!Certificacao::isFuncionario()) {
			header("Location: login.php?erro=" . urlencode("Você não é funcionário!"));
		}
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<table class="table">
					<tr>
						<td>Custo: </td>
						<td> R$ <?php echo $_GET['custo'] ?></td>
					</tr>

					<tr>
						<td>Placa:</td>
						<td> <?php echo $_GET['placa'];?></td>
					</tr>

					<tr>
						<td>Entrada: </td>
						<td> <?php echo (new DateTime($_GET['entrada']))->format('d/m/Y H:i');?></td>
					</tr>

					<tr>
						<td>Saída: </td>
						<td> <?php echo (new DateTime($_GET['saida']))->format('d/m/Y H:i');?></td>
					</tr>

					<tr>
						<td>Vaga: </td>
						<td> <?php echo $_GET['vaga'];?></td>
					</tr>
				</table>
				<a href="menu.php" class="btn btn-default">Voltar ao menu</a>
			</div>
		</div>

	</div>

<!--	<table>
		<tr>
			<td>Custo: </td>
			<td> R$ <?php echo $_GET['custo'] ?></td>
		</tr>

		<tr>
			<td>Placa:</td>
			<td> <?php echo $_GET['placa'];?></td>
		</tr>

		<tr>
			<td>Entrada: </td>
			<td> <?php echo (new DateTime($_GET['entrada']))->format('d/m/Y H:i');?></td>
		</tr>

		<tr>
			<td>Saída: </td>
			<td> <?php echo (new DateTime($_GET['saida']))->format('d/m/Y H:i');?></td>
		</tr>

		<tr>
			<td>Vaga: </td>
			<td> <?php echo $_GET['vaga'];?></td>
		</tr>
	</table>

	-->
</body>
</html>