<?php
	
	require_once '../DAO/funcionarioDAO.php';
	require_once '../DAO/gerenteDAO.php';

	if (!temCamposVazios()) {
		$result = contratarFuncionario();

		if ($result) {
			redirecionaMensagemSucesso("Funcionário contratado!");
		}else{
			redirecionaContratoErro("Ocorreu algum erro!");
		}


	}else{
		redirecionaContratoErro("Todos os campos devem estar preenchidos!");
	}


	function temCamposVazios(){
		if (isset($_POST['cpf']) && isset($_POST['nome']) && isset($_POST['data_nascimento']) &&
			isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['salario'])) {
			return false;
		}else{
			return true;
		}
	}

	function contratarFuncionario(){
		echo $_POST['senha'];

		$funcionario = new Funcionario($_POST['cpf'], trim($_POST['nome']), $_POST['data_nascimento'],
									   date("d/m/y", strtotime("now")), null, $_POST['email'], 
									   md5($_POST['senha']), $_POST['salario']);

		$funcionarioDAO = new FuncionarioDAO();

		if ($funcionarioDAO->insert($funcionario)) {
			if (isGerente()) {
				$gerenteDAO = new GerenteDAO();
				echo "SAI DESGRAÇA";
				$gerenteDAO->setGerencia($funcionario->getCpf());
			}
			return true;
		}else{
			return false;
		}
	}

	/*function redirecionaContratoErro($erro){
		header('Location: ../views/contratarFuncionario.php?erro='.urlencode($erro));
	}

	function redirecionaMensagemSucesso($sucesso){
		header('Location: ../views/menu.php?sucesso='.urlencode($sucesso));
	}*/

	function isGerente(){
		echo $_POST['gerente'];
		if ($_POST['gerente'] == "1") {
			return true;
		}else{
			return false;
		}
	}

?>