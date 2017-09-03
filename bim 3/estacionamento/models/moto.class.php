<?php
	
	include_once 'veiculo.class.php';

	class Moto extends Veiculo{
		
		private $id;

		function __construct($veiculo){
			parent::__construct($veiculo->getPlaca(), $veiculo->getMarca(), $veiculo->getModelo(), $veiculo->getCor());
		}

		function getId(){
			return $this->id;
		}

		function setId($id){
			$this->id = $id;
		}
	}
?>