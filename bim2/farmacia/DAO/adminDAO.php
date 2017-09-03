<?php
	include_once 'DAO.php';

	class adminDAO extends DAO{
		
		function __construct(){
			parent::__construct();
		}

		function existeAdmin($login, $senha){
			$sql = "SELECT id FROM admins WHERE login = '$login' AND senha = '$senha';";
			$res = pg_query($this->con, $sql);
			if (pg_num_rows($res) > 0) {
				return true;
			}else{
				return false;
			}
		}
	}
?>