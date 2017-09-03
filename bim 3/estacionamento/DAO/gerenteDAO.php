<?php
	
	require_once 'funcionarioDAO.php';	
	include_once '../models/gerente.class.php';

	class GerenteDAO extends FuncionarioDAO{

		function __construct(){
			parent::__construct();
		}

		function isGerente($cpf){
			$sql = "SELECT cpf FROM gerentes WHERE cpf = $cpf;";

			$rs = pg_query($this->con, $sql);

			echo pg_num_rows($rs);

			if (pg_num_rows($rs) != 0)
				return true;
			else
				return false;
		}

		function setGerencia($cpf){
			$sql = "INSERT INTO gerentes VALUES(DEFAULT, $cpf);";

			return pg_query($this->con, $sql);
		}
	}

?>