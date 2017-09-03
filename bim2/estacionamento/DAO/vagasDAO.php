<?php


	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	function temVaga(){
		$sql = "SELECT id FROM vagas WHERE placa IS NULL LIMIT 1";
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$vaga = null;
		$rs = pg_query($con, $sql);
		while (($array = pg_fetch_array($rs)) !== false) {
			$vaga = $array["id"];
		}
		pg_close($con);
		return $vaga;
	}

	function insertVaga($vaga, $placa){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "UPDATE vagas SET placa = '$placa' WHERE id = $vaga;";
		pg_query($con, $sql);
		pg_close($con);
	}

	function limpaVaga($placa){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "UPDATE vagas SET placa = NULL WHERE placa = '$placa';";
		pg_query($con, $sql);
		pg_close($con);
	}

	function situacao(){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "SELECT mod.veiculos AS modelos, COUNT(vag.placa) AS quant FROM vagas vag JOIN veiculos vei ON(vag.placa = vei.placa)RIGHT JOIN modelos mod ON (mod.veiculos = vei.veiculo)GROUP BY mod.veiculos;";

		$rs = pg_query($con, $sql);

		$final = array();
		while(($array = pg_fetch_array($rs)) !== false){
			$a = $array["modelos"];
			$final["$a"] = $array["quant"];
		}

		pg_close($con);
		return $final;
	}

	/*unction max(){
		$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		$sql = "SELECT COUNT(*) AS quant FROM vagas;";

		$result = pg_fetch_array(pg_query($con, $sql), 0);

		$final = $result["quant"];

		pg_close($con);

		return $final;
	}*/
?>