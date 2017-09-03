<?php
	require_once 'veiculosDAO.php';

	class OutroDAO extends VeiculosDAO{
		
		function __construct(){
			parent::__construct();
		}

		function cadastrarOutro($placa, $tipo){
			$sql = "INSERT INTO motos VALUES(DEFAULT, '$placa', '$tipo');";

			return pg_query($this->con, $sql);
		}
	}

?>