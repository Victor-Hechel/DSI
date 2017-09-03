<?php
	
	require 'dao.php';

	class VeiculosDAO extends DAO{
		
		function __construct(){
			parent::__construct();
		}
	

		function existeVeiculo($placa){
			$sql = "SELECT placa FROM veiculos WHERE placa = '$placa';";
			if (pg_num_rows(pg_query($this->con, $sql)) != 0) {
				return true;
			}
			return false;
		}

		function cadastrar($veiculo){
			$sql = sprintf("INSERT INTO veiculos VALUES('%s', '%s', '%s', '%s');", $veiculo->getPlaca(),
						    $veiculo->getMarca(), $veiculo->getModelo(), $veiculo->getCor());
			return pg_query($this->con, $sql);
		}

		function getTipo($placa){
			$con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
			$sql = "SELECT veiculo FROM veiculos WHERE placa = '$placa';";

			$result = pg_fetch_array(pg_query($con, $sql), 0);
			$tipo = $result["veiculo"];
			pg_close($con);
			return $tipo;
		}
	}
?>