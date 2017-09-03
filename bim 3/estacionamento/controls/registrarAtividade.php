<?php
	
	require_once '../DAO/registrosDAO.php';
	require_once '../models/registro.class.php';
	require_once '../DAO/vagasDAO.php';
	require_once '../DAO/precosDAO.php';

	if (entrando()) {
		$placa = strtoupper($_GET['placa']);
		if (!estaNoEstacionamento($placa)) {
			entrarNoEstacionamento($placa);
		}else{
			redirecionarMenuErro("Veículo já está no estacionamento");
		}
	}else{
		$placa = strtoupper($_GET['placa']);
		if (estaNoEstacionamento($placa)) {
			sairDoEstacionamento($placa);
		}else{
			redirecionarMenuErro("Veículo não está no estacionamento");
		}
	}

	function entrando(){
		if ($_GET['registro'] == "0") {
			return true;
		}else{
			return false;
		}
	}

	function estaNoEstacionamento($placa){
		$registroDAO = new RegistrosDAO();

		return $registroDAO->estaNoEstacionamento($placa);
	}

	function redirecionarMenuErro($erro){
		header("Location: ../views/menu.php?erro=" . urlencode($erro));
	}

	function redirecionaMenuSucesso($sucesso){
		header("Location: ../views/menu.php?sucesso=".urlencode($sucesso));
	}

	function entrarNoEstacionamento($placa){

		$vaga = getVaga($_GET['tipo']);

		if ($vaga != null) {
			session_start();

			$registro = new Registro($vaga, strtoupper($placa), $_GET['horario'], null, $_SESSION['funcionario']);

			$registroDAO = new RegistrosDAO();

			if ($registroDAO->registrarEntrada($registro)) {
				redirecionaMenuSucesso("Veículo entrou no estacionamento na vaga $vaga!");
			}else{
				redirecionarMenuErro("Ocorreu um erro, tente novamente!");
			}
		}else{
			redirecionarMenuErro("Não há vagas!");
		}

	}

	function getVaga($tipo){
		$vagaDAO = new VagasDAO();

		return $vagaDAO->temVagaTipo($tipo);
	}

	function sairDoEstacionamento($placa){

		$horario = $_GET['horario'];

		$diferencaHorarios = diferencaHorarios($placa, $horario);

		if (verificaHorarioSaida($diferencaHorarios)) {
			$registrosDAO = new RegistrosDAO();
			$registrosDAO->sairDoEstacionamento($placa, $horario);

			$registro = $registrosDAO->getRegistro($placa, $horario);

			calcularValor($registro, $diferencaHorarios);
		}else{
			redirecionarMenuErro("Horário inválido");
		}

		
	}


	function diferencaHorarios($placa, $horario){
		$registrosDAO = new RegistrosDAO();

		return $registrosDAO->diferencaDatas($placa, $horario);

	}

	function verificaHorarioSaida($diferenca){
		if ($diferenca > 0) {
			return true;
		}else{
			return false;
		}
	}

	function calcularValor($registro, $diferencaHorarios){
		$precosDAO = new PrecosDAO();

		$custo = 0;

		if ($diferencaHorarios > 12) {
			$precoDiaria = $precosDAO->getDiaria();
			$custo = ceil($diferencaHorarios/24) * $precoDiaria;	
		}else{
			$registrosDAO = new RegistrosDAO();
			if ($registrosDAO->isNight($registro->getIdVeiculo(), $registro->getSaida())) {
				$custo = $precosDAO()->getPerNoite();
			}else{
				$tipo = $_GET['tipo'];

				switch ($tipo) {
					case 'C':
						$precoCarro = $precosDAO->getCarro();
						$custo = ceil($diferencaHorarios) * $precoCarro;
						break;
					case 'M':
						$precoMoto = $precosDAO->getMoto();
						$custo = ceil($diferencaHorarios) * $precoMoto;
						break;
					case 'O':
						$precoOutro = $precosDAO->getOutro();
						$custo = ceil($diferencaHorarios) * $precoOutro;
						break;
				}
			}
		}

		redirecionarDadosFinais($registro, $custo);
	}

	function redirecionarDadosFinais($registro, $custo){
		header("Location: ../views/dadosFinais.php?custo=$custo&placa=" . $registro->getIdVeiculo() . "&vaga=" . $registro->getIdVaga() . "&entrada=" . $registro->getEntrada() . "&saida=" . $registro->getSaida());
	}
?>