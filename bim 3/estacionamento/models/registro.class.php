<?php

	class Registro{
		
		private $id_vaga;
		private $id_veiculo;
		private $entrada;
		private $saida;
		private $cpf_funcionario;

		function __construct($id_vaga, $id_veiculo, $entrada, $saida, $cpf_funcionario){
			$this->id_vaga = $id_vaga;
			$this->id_veiculo = $id_veiculo;
			$this->entrada = $entrada;
			$this->saida = $saida;
			$this->cpf_funcionario = $cpf_funcionario;
		}

		function getIdVaga(){
			return $this->id_vaga;
		}

		function getIdVeiculo(){
			return $this->id_veiculo;
		}

		function getEntrada(){
			return $this->entrada;
		}

		function getSaida(){
			return $this->saida;
		}

		function getCpfFuncionario(){
			return $this->cpf_funcionario;
		}
	}

?>