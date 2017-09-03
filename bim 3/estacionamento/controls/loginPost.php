<?php
	
	include_once '../DAO/funcionarioDAO.php';
	include_once '../DAO/gerenteDAO.php';
	include_once '../models/funcionario.class.php';


	if (camposEstaoPreenchidos()) {
		$id_funcionario = encontraFuncionario();
		if($id_funcionario != null){

			logar($id_funcionario);

		}else{
			redirecionaTelaLoginErro("Login ou senha estão incorretos");
		}

	}else{
		redirecionaTelaLoginErro("Todos os campos devem ser preenchidos");
	}




	function logar($id_funcionario){
		session_start();

		$_SESSION['funcionario'] = $id_funcionario;

		if (verificaGerencia($id_funcionario)) {
			$_SESSION['gerente'] = 't';
		}

		redirecionaMenu();

	}

	function camposEstaoPreenchidos(){
		if (!empty(trim($_POST['login'])) && !empty(trim($_POST['senha']))) {
			return true;
		}else{
			return false;
		}
	}

	function redirecionaTelaLoginErro($erro){
		header('Location: ../index.php?erro='.urlencode($erro));
	}

	function encontraFuncionario(){
		$funcionarioDao = new FuncionarioDAO();

		return $funcionarioDao->login(trim($_POST['login']), trim($_POST['senha']));
	}


	function verificaGerencia($id_funcionario){
		$gerenteDao = new GerenteDAO();

		if ($gerenteDao->isGerente($id_funcionario)) {
			return true;
		}else{
			return false;
		}
	}

	function redirecionaMenu(){
		header('Location: ../views/menu.php');
	}

?>