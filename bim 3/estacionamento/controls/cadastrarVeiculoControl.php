<?php
	require_once '../models/veiculo.class.php';
	require_once '../models/carro.class.php';
	require_once '../models/moto.class.php';
	require_once '../models/outro.class.php';
	require_once '../DAO/veiculosDAO.php';
	require_once '../DAO/carroDAO.php';
	require_once '../DAO/motoDAO.php';
	require_once '../DAO/outroDAO.php';

	if (camposEstaoPreenchidos()) {
		cadastrarVeiculo();
	}else{
		redirecionaCadastrarErro("Todos os campos devem estar preenchidos!");
	}

	function camposEstaoPreenchidos(){
		if (empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['cor']) || empty($_POST['placa'])) {
			return false;
		}else{
			return true;
		}
	}

	function redirecionaCadastrarErro($erro){
		header("Location: ../views/cadastrarVeiculo.php?erro=".urlencode($erro)."&placa=".$_POST['placa']."&horario=" . $_POST['horario']);
	}

	function cadastrarVeiculo(){
		$veiculoDAO = new VeiculosDAO();

		$veiculo = new Veiculo(trim($_POST['placa']), trim($_POST['marca']), trim($_POST['modelo']), 
							   trim($_POST['cor']));

		if ($veiculoDAO->cadastrar($veiculo)) {
			
			switch ($_POST['tipo']) {
				case 'C':
					(new CarroDAO())->cadastrarCarro($veiculo->getPlaca());
					break;

				case 'M':
					(new MotoDAO())->cadastrarMoto($veiculo->getPlaca());
					break;

				case 'C':
					(new OutroDAO())->cadastrarOutro($veiculo->getPlaca(), $_POST['tipo']);
					break;
			}

			registraAtividade();


		}else{
			redirecionaCadastrarErro("Houve um erro! Tente novamente!");
		}
	}

	function registraAtividade(){
		header("Location: registrarAtividade.php?registro=" . urlencode("0") . "&placa=" . urlencode($_POST['placa']) . "&tipo=" . $_POST['tipo'] . "&horario=" . $_POST['horario']);
	}
?>