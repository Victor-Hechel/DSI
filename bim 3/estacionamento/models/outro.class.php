<?php
	
	include_once 'veiculo.class.php';

	class Outro extends Veiculo{
		
		private $id;
		private $veiculo;

		function __construct($veiculo, $tipo_veiculo){
			parent::__construct($veiculo->getPlaca(), $veiculo->getMarca(), $veiculo->getModelo(), $veiculo->getCor());
			$this->veiculo = $tipo_veiculo;
		}

		function getId(){
			return $this->id;
		}

		function setId($id){
			$this->id = $id;
		}

		function getVeiculo(){
			return $veiculo;
		}
	}

?>