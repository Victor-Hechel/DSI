<!DOCTYPE html>
<html>
<head>
	<title>Feito!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php

		require "DAO/veiculosDAO.php";
		require "DAO/vagasDAO.php";
		require "DAO/registrosDAO.php";

		$placa = $_POST['placa'];
		$horario = $_POST['horario'];
		$veiculo = $_POST['veiculo'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		$cor = $_POST['cor'];

		insertVeiculo($placa, $veiculo, $modelo, $marca, $cor);

		$vaga = temVaga();
		if($vaga != null){
			insertRegistro($placa, $horario, $vaga);
			insertVaga($vaga, $placa);
			echo "<h1>Operacao concluida!<br>Veiculo de placa $placa estacionou em $horario na vaga $vaga<br><button><a href='index.html'>Voltar ao menu principal</a></button></h1>";
		}else{
			echo "<h1>Não há mais vagas!<br><button><a href='index.html'>Voltar ao menu principal</a></button></h1>";
		}

	?>
</body>
</html>

