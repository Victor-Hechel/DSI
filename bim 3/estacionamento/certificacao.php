<?php

	class Certificacao{

		public static function isFuncionario(){
			session_start();

			if (isset($_SESSION['funcionario'])) {
				return true;
			}else{
				return false;
			}
		}

		public static function isGerente(){
			session_start();
			
			if (isset($_SESSION['gerente'])) {
				return true;
			}else{
				return false;
			}
		}
	}
		
?>