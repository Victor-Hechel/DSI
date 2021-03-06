<!DOCTYPE html>
<html>
<head>
	<title>Um titulo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php  

	require "DAO/vagasDAO.php";
	require "DAO/registrosDAO.php";
	require "DAO/veiculosDAO.php";


	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	if ((!preg_match("/[A-Z]{3}-[0-9]{4}/u", strtoupper(trim($_POST['placa'])))) || (strlen($_POST['placa']) != 8)) {
		echo "<h1>Placa Inválida! Deve conter o padrão AAA-1111!<br><button><a href='index.html'>Voltar ao menu principal</a></button></h1>";
	}else{
		$placa = strtoupper(trim($_POST['placa']));
		if(!existeVeiculo($placa)){
			$horario = $_POST['horario'];

			echo	"<h1>Cadastro de veiculo</h1>
					<h3>O veiculo não<br>está cadastrado</h3>
					<form method='post' action='registrar_veiculo.php'>
					<input type='hidden' name='placa' id='placa' value='$placa' required>
					<input type='hidden' name='horario' id='horario' value='$horario' required>
					<table><tr><td><label for='veiculo'>Veiculo: </label></td><td>
					<select name='veiculo' id='veiculo'><option value='carro'>Carro</option>
					<option value='moto'>Moto</option><option value='camionete'>Camionete</option>
					</select></td></tr><tr><td><label for='marca'>Marca: </label></td>
					<td><input type='text' name='marca' id='marca' required></td></tr><tr>
					<td><label for='modelo'>Modelo: </label></td>
					<td><input type='text' name='modelo' id='modelo' required></td></tr><tr>
					<td><label for='cor'>Cor: </label></td><td><input type='text' name='cor' required></td>
					</tr><tr><td colspan='2'><input type='submit' value='Registrar'></td>
					</tr></table></form>";
		}else{
			$horario = $_POST['horario'];
			if ($_POST['registro'] == "entrada") {
				if (entradaUnica($placa)) {
					echo "<h1>Veiculo já está no estacionamento!<br><button><a href='index.html'>Voltar ao menu principal</a></button></h1>";
				}else{
					$vaga = temVaga();
					if($vaga != null){
						insertRegistro($placa, $horario, $vaga);
						insertVaga($vaga, $placa);
						echo "<h1>Operacao concluida!<br>Veiculo de placa $placa estacionou em $horario na vaga $vaga<br><button><a href='index.html'>Voltar ao menu principal</a></button></h1>";
					}else{
						echo "<h1>Não há mais vagas!<br><button><a href='index.html'>Voltar ao menu principal</a></button></h1>";
					}
				}
			}else{
				if (!entradaUnica($placa)) {
					echo "<h1>Veiculo não se encontra no estacionamento!<br><button><a href='index.html'>Voltar ao menu principal</a></button></h1>";
				}else{
					$diferenca = diferencaDatas($placa, $horario);
					if ($diferenca > 0) {
						insertSaida($placa, $horario);
						limpaVaga($placa);
						$custo = 0;
						if ($diferenca > 12) {
							$custo = ceil($diferenca/24) * 25;
						}else{
							if (isNight($placa, $horario)) {
								$custo = 18;
							}else{
								$tipo = getTipo($placa);
								if ($tipo == "carro") {
									$custo = ceil($diferenca) * 5;
								}elseif ($tipo == "moto") {
									$custo = ceil($diferença) * 4;
								}else{
									$custo = ceil($diferença) * 7;
								}
							}
						}
						$dados = selectOne($placa, $horario);
						$vaga = $dados["vaga"];
						$entrada = $dados["entrada"];
						$horario = $dados["saida"];
						echo "<h1>Veículo de placa $placa retirado com sucesso!<br>Entrada: $entrada<br>Saída: $horario<br> Vaga: $vaga<br> O custo é: R$: $custo,00<br><button><a href='index.html'>Voltar ao menu principal</a></button></h1>";
					}else{
						echo "<h1>Impossivel completar a ação! Verifique o horário e a placa!<br><button><a href='index.html'>Voltar ao menu principal</a></button></h1>";
					}
				}
			}
		}
	}

?>

</body>
</html>