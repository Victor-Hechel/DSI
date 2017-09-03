<!DOCTYPE html>
<html>
<head>
	<title>Estacionamento</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<?php
		require '../controls/estacionamentoControl.php';
	?>

	<?php
		require_once '../certificacao.php';

		if (!Certificacao::isFuncionario()) {
			header("Location: login.php?erro=" . urlencode("Você não é funcionário!"));
		}
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Estacionamento</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<table class="table">
					<tr>
						<th>Vaga</th>
						<th>Placa</th>
					</tr>
					<?php 
						foreach ($final as $key => $value) {		
					?>
						<tr>
							<td><?php echo $key; ?></td>
							<td><?php 
								if ($value == null) {
									echo "-";
								}else{
									echo "$value";
								}
							?>
							</td>
						</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</div>


	<!--

	<h1>Estacionamento</h1>
	<table border="1">
		<tr>
			<th>Vaga</th>
			<th>Placa</th>
		</tr>
		<?php 
			foreach ($final as $key => $value) {		
		?>
			<tr>
				<td><?php echo $key; ?></td>
				<td><?php 
					if ($value == null) {
						echo "-";
					}else{
						echo "$value";
					}
				?>
				</td>
			</tr>
		<?php
			}
		?>
	</table>
	
	-->

</body>
</html>