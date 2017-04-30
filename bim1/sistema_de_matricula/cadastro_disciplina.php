<html>

<head>
	<title>Cadastro Disciplina</title>

	<link rel="stylesheet" href="stylo.css">
	<meta charset="utf-8">

</head>

<body>
	<form method="POST" action="cadastro_disciplina.php">
		<div id="caixa">
			<h1>Cadastro Disciplina</h1>

			<?php
		
				include "disciplinaDAO.php";

				$nome = null;
				$num_max = null;

				if(!(empty($_POST["nome"]) && empty($_POST["num_max"]))){
					$nome = $_POST["nome"];
					$num_max = $_POST["num_max"];
					cadastrarDisciplina($nome , $num_max);
				}
			?>

			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" required>
			<br>
			<label for="num_max">Número máximo de alunos:</label>
			<input type="number" name="num_max" id="num_max" required>
			<br>
			<input type="submit" value="Cadastrar">
		</div>
	</form>

</body>

</html>