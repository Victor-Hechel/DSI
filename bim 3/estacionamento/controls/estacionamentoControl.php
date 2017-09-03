<?php
	
	require '../DAO/vagasDAO.php';

	$vagasDAO = new vagasDAO();

	$array = $vagasDAO->getAllVagas();

	$final = [];
	foreach ($array as $value) {
		$final[$value] = $vagasDAO->estaOcupada($value);
	}

?>