<!DOCTYPE html>
<html>
<head>
	<title>Registros Veiculos</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php  

		require "DAO/registrosDAO.php";
		require "DAO/veiculosDAO.php";


		error_reporting(E_ALL);
		ini_set('display_errors', 'On');


		if ((!preg_match("/[A-Z]{3}-[0-9]{4}/u", strtoupper(trim($_GET['placa'])))) || (strlen($_GET['placa']) != 8)) {
				echo "<h1>Placa Inválida! Deve conter o padrão AAA-1111!<br><button><a href='registro.html'>Voltar ao menu principal</a></button></h1>";
		}else{
			$placa = strtoupper(trim($_GET['placa']));
			if(!existeVeiculo($placa)){
				echo "<h1>Veiculo não cadastrado!<br><button><a href='registro.html'>Voltar ao menu principal</a></button></h1>";
			}else{
				$placa = strtoupper(trim($_GET['placa']));
				$array = select($placa);

				echo "<h1>Registros do veiculo de placa: $placa</h1><table border='1'><tr><th>Vaga</th><th>Entrada</th><th>Saída</th></tr>";
				$i = 0;
				while($i < count($array)){
					$entrada = $array[$i]['entrada'];
					$saida = $array[$i]['saida'];
					$vaga = $array[$i]['vaga'];
					echo "<tr><td>$vaga</td><td>$entrada</td><td>$saida</td></tr>";
					$i = $i + 1;
				}

				echo "<tr><td colspan='3'><button><a href='registro.html'>Voltar ao menu principal</a></button></td></tr></table>";
			}
		}

	?>

</body>
</html>
