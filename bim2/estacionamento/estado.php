<!DOCTYPE html>
<html>
<head>
	<title>Estado</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1>Estacionamento</h1>

<?php

	require "DAO/vagasDAO.php";

	$array = situacao();
	$max = 5;
	$num = 0;

	foreach ($array as $value) {
		$max = $max - $value;
		$num = $num + $value;
	}

?>
<table border="1">
	<tr>
		<th>Número de veiculos</th>
		<th>Vagas disponíveis</th>
	</tr>
	<tr>
		<td><?php echo "$num"; ?></td>
		<td><?php echo "$max"; ?></td>
	</tr>
	<tr>
		<th colspan="2">Tipos de veiculo</th>
	</tr>
	<tr>
		<td>Carros</td>
		<td><?php echo "$array[carro]"; ?></td>
	</tr>
	<tr>
		<td>Motos</td>
		<td><?php echo "$array[moto]"; ?></td>
	</tr>

	<tr>
		<td>Camionete</td>
		<td><?php echo "$array[camionete]"; ?></td>
	</tr>
	<tr>
		<td colspan="2">
			<button><a href='registro.html'>Voltar ao menu principal</a></button>
		</td>
	</tr>

</table>

</body>
</html>