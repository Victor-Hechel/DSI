<?php
	
	require_once 'dao.php';
	include '../models/funcionario.class.php';

	class FuncionarioDAO extends DAO{
		
		function __construct(){
			parent::__construct();
		}

		function login($login, $senha){
			$sql = "SELECT cpf FROM funcionarios WHERE (cpf = $login) AND (senha = MD5('$senha')) ;";


			return pg_fetch_array(pg_query($this->con, $sql), 0)['cpf'];
		}

		function insert($func){
			echo $func->getSenha();
			$sql = sprintf("INSERT INTO funcionarios VALUES(%d, '%s', '%s', '%s', DEFAULT, '%s', %f, '%s');",
						   $func->getCpf(), $func->getNome(), $func->getDataNascimento(),
						   $func->getDataContratacao(), $func->getEmail(), $func->getSalario(),
						   $func->getSenha());

			return pg_query($this->con, $sql);
		}

	}
?>