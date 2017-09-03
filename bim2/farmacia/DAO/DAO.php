<?php	
	class DAO{
		protected $con;
		function __construct(){
			$this->con = pg_connect("host = localhost user = postgres password = postgres dbname = farmacia");
		}

		function getConnection(){
			return $this->con;
		}
	}
?>