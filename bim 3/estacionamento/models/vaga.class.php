<?php

	class Vaga{
		
		private $codigo;
		private $tipo;
		private $andar;
		private $numero;

		function __construct($tipo, $andar, $numero){
			$this->tipo = $tipo;
			$this->andar = $andar;
			$this->numero = $numero;
			$this->codigo = $tipo . $andar . $numero;
		}

		function getCodigo(){
			return $this->codigo;
		}

		function setCodigo($codigo){
			$this->codigo = $codigo;
		}

		function getTipo(){
			return $this->tipo;
		}

		function getAndar(){
			return $this->andar;
		}

		function getNumero(){
			return $this->numero;
		}
	}
?>