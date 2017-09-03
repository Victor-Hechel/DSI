<?php
	if (empty($_POST['login']) || empty($_POST['senha'])) {
		header("Location: ../index.php?erro=". urlencode("Você precisa digitar todos os campos!"));
	}else{
		include_once '../DAO/adminDAO.php';
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$dao = new adminDAO();
		if ($dao->existeAdmin($login, $senha)) {
			session_start();
			$_SESSION['logado'] = true;
			header("Location: ../menu.php");
		}else{
			header("Location: ../index.php?erro=". urlencode("Login ou senha incorretos!"));
		}
	}
?>