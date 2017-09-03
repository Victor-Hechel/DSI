<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	function insertRegistro($placa, $entrada, $vaga){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "INSERT INTO registros(placa, entrada, vaga) VALUES('$placa', '$entrada', $vaga);";
		pg_query($con, $sql);
		pg_close($con);
	}

	function verificaEntrada($placa){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "SELECT * FROM registros WHERE placa = '$placa' AND saida IS NULL;";
		$teste = false;
		if(pg_num_rows(pg_query($con, $sql)) != 0){
			$teste = true;
		}
		pg_close($con);
		return $teste;
	}

	function diferencaDatas($placa, $saida){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "SELECT (EXTRACT(EPOCH FROM ('$saida'::timestamp)) - EXTRACT(EPOCH FROM entrada))/3600 AS diferenca FROM registros WHERE placa = '$placa' AND saida IS NULL;";
		$result = pg_fetch_array(pg_query($con, $sql), 0);
		$diferenca = $result['diferenca'];
		pg_close($con);
		return $diferenca;
	}

	function entradaUnica($placa){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "SELECT * FROM registros WHERE placa = '$placa' AND saida IS NULL;";
		$teste = false;
		if(pg_num_rows(pg_query($con, $sql)) == 1){
			$teste = true;
		}
		pg_close($con);
		return $teste;
	}

	function insertSaida($placa, $saida){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "UPDATE registros SET saida = '$saida' WHERE placa = '$placa' AND saida IS NULL;";
		pg_query($con, $sql);
		pg_close($con);
	}

	function isNight($placa, $saida){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "SELECT EXTRACT(HOUR FROM entrada) AS comeco, EXTRACT(HOUR FROM saida) AS fim FROM registros WHERE placa = '$placa' AND saida = '$saida';";
		$result = pg_fetch_array(pg_query($con, $sql), 0);
		$teste = false;
		if ($result["comeco"] >= 20 && $result["fim"] <= 8) {
			$teste = true;
		}
		pg_close($con);
		return $teste;
	}

	function select($placa){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "SELECT * FROM registros WHERE placa = '$placa';";
		$rs = pg_query($con, $sql);
		$retorno = array();
		while (($array = pg_fetch_array($rs)) !== false) {
			$retorno[] = array("entrada" => $array["entrada"], "saida" => $array["saida"],"vaga" => $array["vaga"]);
		}

		pg_close($con);
		return $retorno;
	}

	function selectOne($placa, $saida){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "SELECT * FROM registros WHERE placa = '$placa' AND saida = '$saida';";
		$result = pg_fetch_array(pg_query($con, $sql), 0);
		pg_close($con);
		return $result;
	}

?>