<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
</head>
<body>
	<h1>Menu</h1>
	<?php

		session_start();

		if ($_SESSION['logado'] == true) {
			echo "<a href='cadastro.php'>Cadastrar Medicamento</a>";
		}
	?>
	<form method="GET" action="controllers/menuController.php">
		<input type="text" name="pesquisa" placeholder="Digite o que deseja pesquisar...">
		<br>
		<select name="tipo">
			<option value=0>Pesquisar por nome</option>
			<option value=1>Pesquisar por fabricante</option>
			<option value=2>Pesquisar medicamentos controlados</option>
			<option value=3>Pesquisar medicamentos com menos de 5 unidades</option>
		</select>
		<input type="submit" value="pesquisar">		
	</form>
	<?php
		if ($_SESSION['logado'] == true) {
			echo "<a href='logout.php'>Logout</a>";
		}
	?>

	<?php

		if (!empty($_GET['medicamentos'])) {
			include_once 'models/medicamentos';
			$medicamentos = $_GET['medicamentos'];
			foreach ($medicamentos as $med) {
				echo $med->getNome() . "<br>";
			}
		}
	?>

</body>
</html>