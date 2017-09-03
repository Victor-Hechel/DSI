<?php

	class Veiculo{
		
		private $placa;
		private $marca;
		private $modelo;
		private $cor;

		function __construct($placa, $marca, $modelo, $cor){
			$this->placa = $placa;
			$this->marca = $marca;
			$this->modelo = $modelo;
			$this->cor = $cor;
		}

		function getPlaca(){
			return $this->placa;
		}

		function getMarca(){
			return $this->marca;
		}

		function getModelo(){
			return $this->modelo;
		}

		function getCor(){
			return $this->cor;
		}

	}

?>