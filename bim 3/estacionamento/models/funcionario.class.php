<?php
	class Funcionario{

		private $cpf;
		private $nome;
		private $data_nascimento;
		private $data_contratacao;
		private $data_desligamento;
		private $email;
		private $senha;
		private $salario;
		
		function __construct($cpf, $nome, $data_nascimento, $data_contratacao, $data_desligamento,
							 $email, $senha, $salario){
			$this->cpf = $cpf;
			$this->nome = $nome;
			$this->data_nascimento = $data_nascimento;
			$this->data_contratacao = $data_contratacao;
			$this->data_desligamento = $data_desligamento;
			$this->email = $email;
			$this->senha = $senha;
			$this->salario = $salario;
		}

		function getCpf(){
			return $this->cpf;
		}

		function getNome(){
			return $this->nome;
		}

		function getDataNascimento(){
			return $this->data_nascimento;
		}

		function getDataContratacao(){
			return $this->data_contratacao;
		}

		function getDataDesligamento(){
			return $this->data_desligamento;
		}

		function getEmail(){
			return $this->email;
		}

		function getSenha(){
			return $this->senha;
		}

		function getSalario(){
			return $this->salario;
		}

		function setDataDesligamento($data){
			$this->data_desligamento = $data;
		}
	}

?>