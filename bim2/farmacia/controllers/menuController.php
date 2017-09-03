<?php

	include_once '../DAO/medicamentosDAO.php';
	$tipo = $_GET['tipo'];
	$pesquisa = $_GET['pesquisa'];
	$dao = new medicamentosDAO();
	$medicamentos = array();
	switch ($tipo) {
		case 0:
			$medicamentos = $dao->selectByName($pesquisa);
			break;
		case 1:
			$medicamentos = $dao->selectByFabricante($pesquisa);
			break;
		case 2:
			$medicamentos = $dao->selectControlados();
			break;
		case 3:
			$medicamentos = $dao->selectFaltando();
			break;
		default:
			# code...
			break;
	}
	echo "<table><tr><th>Nome</th><th>Fabricante</th><th>Controlado</th><th>Quantidade</th><th>Preço</th>";

	session_start();

	if ($_SESSION['logado'] == true) {
		echo "<th>Editar</th><th>Excluir</th></tr>";
	}else{
		echo "</tr>";
	}
	
	foreach ($medicamentos as $med) {
		echo "<tr><td>".$med->getNome()."</td><td>".$med->getFabricante()."</td><td>";
		if ($med->getControlado()) {
			echo "Sim";
		}else{
			echo "Não";
		}
		echo "</td><td>".$med->getQuantidade()."</td><td>".$med->getPreco()."</td>";
		if($_SESSION['logado'] == true){
			echo "<td><a href='../editar.php?id=".$med->getId()."'>Editar</a></td><td><a href = 'excluirController.php?id=".$med->getId()."'>Excluir</a></td></tr>";
		}else{
			echo "</tr>";
		}
	}
	echo "</table>";
	
?>