<?php
	include_once 'funcionario.class.php';

	class Gerente extends Funcionario{
		
		private $id;

		function __construct($cpf, $nome, $data_nascimento, $data_contratacao, $data_desligamento,
							 $email, $senha, $salario){

			parent::__construct($cpf, $nome, $data_nascimento, $data_contratacao, $data_desligamento,
							 	$email, $senha, $salario);
			
		}

		function getId(){
			return $this->id;
		}

		function setId($id){
			$this->id = $id;
		}
	}

?>