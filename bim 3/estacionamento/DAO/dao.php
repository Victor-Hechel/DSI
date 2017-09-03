<?php

	class Dao{
		
		protected $con;

		function __construct(){
			$this->con = pg_connect("host=localhost port=5432 dbname=estacionamento user=postgres password=postgres");
		}


	}
?>