<?php
	require_once 'veiculosDAO.php';

	class MotoDAO extends VeiculosDAO{
		
		function __construct(){
			parent::__construct();
		}

		function cadastrarMoto($placa){
			$sql = "INSERT INTO motos VALUES(DEFAULT, '$placa');";

			return pg_query($this->con, $sql);
		}

		function isMoto($placa){
			$sql = "SELECT COUNT(*) FROM motos WHERE placa_veiculo = '$placa';";

			$rs = pg_fetch_array(pg_query($this->con, $sql), 0);

			if ($rs["count"] != 0) {
				return true;
			}else{
				return false;
			}
		}
	}

?>