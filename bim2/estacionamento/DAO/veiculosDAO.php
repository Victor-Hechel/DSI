<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	function existeVeiculo($placa){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "SELECT placa FROM veiculos WHERE placa = '$placa';";
		$teste = false;
		if (pg_num_rows(pg_query($con, $sql)) != 0) {
			$teste = true;
		}
		pg_close($con);
		return $teste;
	}

	function insertVeiculo($placa, $veiculo, $modelo, $marca, $cor){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "INSERT INTO veiculos VALUES('$placa', '$veiculo', '$marca', '$modelo', '$cor');";
		pg_query($con, $sql);
		pg_close($con);
	}

	function getTipo($placa){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "SELECT veiculo FROM veiculos WHERE placa = '$placa';";

		$result = pg_fetch_array(pg_query($con, $sql), 0);
		$tipo = $result["veiculo"];
		pg_close($con);
		return $tipo;
	}

?>