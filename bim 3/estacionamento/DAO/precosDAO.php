<?php

	require_once 'dao.php';
	
	class PrecosDAO extends DAO{
		
		function __construct(){
			parent::__construct();
		}

		function getDiaria(){
			$sql = "SELECT valor FROM precos WHERE categoria = 'Diaria';";
			return pg_fetch_array(pg_query($this->con , $sql), 0)["valor"];
		}

		function getCarro(){
			$sql = "SELECT valor FROM precos WHERE categoria = 'Carro';";
			return pg_fetch_array(pg_query($this->con , $sql), 0)["valor"];
		}


		function getMoto(){
			$sql = "SELECT valor FROM precos WHERE categoria = 'Moto';";
			return pg_fetch_array(pg_query($this->con , $sql), 0)["valor"];
		}


		function getOutro(){
			$sql = "SELECT valor FROM precos WHERE categoria = 'Outro';";
			return pg_fetch_array(pg_query($this->con , $sql), 0)["valor"];
		}


		function getPerNoite(){
			$sql = "SELECT valor FROM precos WHERE categoria = 'Per Noite';";
			return pg_fetch_array(pg_query($this->con , $sql), 0)["valor"];
		}

		function setValor($categoria, $valor){
			$sql = "UPDATE precos SET valor = $valor WHERE categoria = '$categoria';";
			return pg_query($this->con, $sql);
		}

	}

?>