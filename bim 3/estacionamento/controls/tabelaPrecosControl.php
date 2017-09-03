<?php
	
	require '../DAO/precosDAO.php';

	$precosDAO = new precosDAO();

	$precosDAO->setValor('Carro', $_POST['carro']);
	$precosDAO->setValor('Moto', $_POST['moto']);
	$precosDAO->setValor('Outro', $_POST['outro']);
	$precosDAO->setValor('Per Noite', $_POST['per_noite']);
	$precosDAO->setValor('Diaria', $_POST['diaria']);

	header("Location: ../views/menu.php");
?>