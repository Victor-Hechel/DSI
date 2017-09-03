<?php


	session_start();
	if ($_SESSION['logado'] !=true) {
		header("Location: ../menu.php");
	}

	if (empty($_POST['nome']) || empty($_POST['fabricante']) || empty($_POST['controlado']) || empty($_POST['quantidade']) || empty($_POST['preco'])) {
		header("Location ../cadastro.php?erro=".urlencode("Você deve preencher todos os campos"));
	}else{
		include_once '../DAO/medicamentosDAO.php';
		include_once "../models/medicamentos.class.php";

		$med = new Medicamentos();

		$med->setNome($_POST['nome']);
		$med->setFabricante($_POST['fabricante']);
		$med->setControlado($_POST['controlado']);
		$med->setQuantidade($_POST['quantidade']);
		$med->setPreco($_POST['preco']);

		$dao = new medicamentosDAO();

		$dao->save($med);
		header("Location: ../menu.php");
	}

?>