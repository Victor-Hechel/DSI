<?php
	session_start();
	if ($_SESSION['logado'] !=true) {
		header("Location: ../menu.php");
	}
	include_once "../DAO/medicamentosDAO.php";
	$id = $_GET['id'];

	$dao = new medicamentosDAO();
	$dao->excluir($id);

	header("Location: ../menu.php");

?>