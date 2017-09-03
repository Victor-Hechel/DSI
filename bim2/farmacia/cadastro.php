<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de remédio</title>
</head>
<body>
<?php
	session_start();
	if ($_SESSION['logado'] !=true) {
		header("Location: menu.php");
	}
?>
	<h1>Cadastro</h1>
	<form method="POST" action="controllers/cadastroController.php">
		<label>
			Nome: <input type="text" name="nome" placeholder="Digite o nome...">
		</label>
		<br>
		<label>
			Fabricante: <input type="text" name="fabricante" placeholder="Digite o nome do fabricante...">
		</label>
		<br>
		Controlado:
		<br>
		<label>
			Sim: <input type="radio" name="controlado" value="true">
		</label>
		<label>
			Não: <input type="radio" name="controlado" value="false">
		</label>
		<br>	
		<label>
			Quantidade: <input type="number" name="quantidade" placeholder="Digite a quantidade...">
		</label>
		<br>
		<label>
			Preço: <input type="number" name="preco" placeholder="Digite o preço...">
		</label>
		<br>
		<input type="submit" value="Cadastrar">
	</form>
	
</body>
</html>