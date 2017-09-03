<?php
	
	require '../DAO/precosDAO.php';

	$precosDAO =  new precosDAO();

	$carro = $precosDAO->getCarro();

	$moto = $precosDAO->getMoto();

	$outro = $precosDAO->getOutro();

	$diaria = $precosDAO->getDiaria();

	$per_noite = $precosDAO->getPerNoite();

?>