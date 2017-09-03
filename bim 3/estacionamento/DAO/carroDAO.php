<?php
	require_once 'veiculosDAO.php';

	class CarroDAO extends VeiculosDAO{
		
		function __construct(){
			parent::__construct();
		}

		function cadastrarCarro($placa){
			$sql = "INSERT INTO carros VALUES(DEFAULT, '$placa');";

			return pg_query($this->con, $sql);
		}

		function isCarro($placa){
			$sql = "SELECT COUNT(*) FROM carros WHERE placa_veiculo = '$placa';";

			$rs = pg_fetch_array(pg_query($this->con, $sql), 0);

			if ($rs["count"] != 0) {
				return true;
			}else{
				return false;
			}
		}
	}

?>