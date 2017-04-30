<html>
<head>
	<title>Matricular-se</title>

	<link rel="stylesheet" href="stylo.css">
	<meta charset="utf-8">


</head>
<body>

	<form method="POST" action="/trabalho/matricular.php">

		<div id="caixa">

			<h1>Matricular</h1>

			<?php
				ini_set('display_erros',1);
				error_reporting(E_ALL);

				include "matricularDAO.php";

				$aluno = null;
				$disciplina = null;

				if (!empty($_POST["alunos"])) {
					$aluno = $_POST["alunos"];
				}

				if (!empty($_POST["disciplinas"])) {
					$disciplina = $_POST["disciplinas"];
				}
				if ($aluno != null && $disciplina != null) {
					matricular($aluno, $disciplina);
				}

			?>

			<label>Aluno:</label>

			<select name="alunos">

				<?php

					$alunos = listaAlunos();

					foreach ($alunos as $key => $value) {
						echo "<option value=$key>$value</option>";
					}
				?>

			</select>

			<label>Disciplina:</label>

			<select name="disciplinas">

				<?php

					$disciplinas = listaDisciplinas();

					foreach ($disciplinas as $key => $value) {
						echo "<option value=$key>$value</option>";
					}
				?>

			</select>

			<input type="submit" value="Cadastrar">
		</div>
	</form>

</body>
</html>