<?php

	require_once 'dao.php';
	require_once '../models/registro.class.php';

	class RegistrosDAO extends DAO{
		
		function __construct(){
			parent::__construct();
		}

		function registrarEntrada($registro){
			$sql = sprintf("INSERT INTO registros VALUES(DEFAULT, '%s', '%s', '%s', null, %d);", 
					$registro->getIdVaga(), $registro->getIdVeiculo(), $registro->getEntrada(),
					$registro->getCpfFuncionario());

			return pg_query($this->con, $sql);
		}
		

		function estaNoEstacionamento($placa){
			$sql = "SELECT * FROM registros WHERE id_veiculo = '$placa' AND saida IS NULL;";
			if(pg_num_rows(pg_query($this->con, $sql)) != 0){
				return true;
			}
			return false;
		}

		function diferencaDatas($placa, $saida){
			$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
			$sql = "SELECT (EXTRACT(EPOCH FROM ('$saida'::timestamp)) - EXTRACT(EPOCH FROM entrada))/3600 AS diferenca FROM registros WHERE id_veiculo = '$placa' AND saida IS NULL;";
			$result = pg_fetch_array(pg_query($con, $sql), 0);
			$diferenca = $result['diferenca'];
			pg_close($con);
			return $diferenca;
		}


		function sairDoEstacionamento($placa, $saida){
			$sql = "UPDATE registros SET saida = '$saida' WHERE id_veiculo = '$placa' AND saida IS NULL;";
			return pg_query($this->con, $sql);
		}

		function isNight($placa, $saida){
			$sql = "SELECT EXTRACT(HOUR FROM entrada) AS comeco, EXTRACT(HOUR FROM saida) AS fim FROM registros WHERE id_veiculo = '$placa' AND saida = '$saida';";
			$result = pg_fetch_array(pg_query($this->con, $sql), 0);
			$teste = false;
			if ($result["comeco"] >= 20 && $result["fim"] <= 8) {
				$teste = true;
			}
			return $teste;
		}

		function select($placa){
			$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
			$sql = "SELECT * FROM registros WHERE id_veiculo = '$placa';";
			$rs = pg_query($this->con, $sql);
			$retorno = array();
			while (($array = pg_fetch_array($rs)) !== false) {
				$retorno[] = array("entrada" => $array["entrada"], "saida" => $array["saida"],"vaga" => $array["vaga"]);
			}

			pg_close($con);
			return $retorno;
		}

		function getRegistro($placa, $saida){
			$sql = "SELECT * FROM registros WHERE id_veiculo = '$placa' AND saida = '$saida';";
			$rs = pg_fetch_array(pg_query($this->con, $sql), 0);

			$registro = new Registro($rs['id_vaga'], $rs['id_veiculo'], $rs['entrada'], $saida, 
									 $rs['cpf_funcionario']);

			return $registro;
		}

	}

?>