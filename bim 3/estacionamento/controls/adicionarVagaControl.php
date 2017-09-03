<?php

	require_once '../DAO/vagasDAO.php';


	if (camposEstaoPreenchidos()) {

		$result = inserirVaga();

		verificaOperacao($result);
		
	}else{
		redirecionaCadastroErro("Todos os campos devem estar preenchidos");
	}



	function camposEstaoPreenchidos(){
		if (!empty(trim($_POST['tipo'])) && !empty(trim($_POST['andar'])) && !empty(trim($_POST['numero']))) {
			return true;
		}else{
			return false;
		}
	}

	function inserirVaga(){
		$vaga = new Vaga($_POST['tipo'], $_POST['andar'], $_POST['numero']);

		$vagasDAO = new VagasDAO();

		return $vagasDAO->inserir($vaga);

	}

	function verificaOperacao($result){
		if ($result) {
			redirecionarMenuSucesso("Vaga inserida com sucesso!");
		}else{
			redirecionaCadastroErro("Vaga já existe!");
		}
	}

	function redirecionarMenuSucesso($mensagem){
		header('Location: ../views/menu.php?sucesso='.urlencode($mensagem));
	}

	function redirecionaCadastroErro($erro){
		header('Location: ../views/adicionarVaga.php?erro='.urlencode($erro));
	}


?>