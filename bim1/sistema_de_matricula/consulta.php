<!DOCTYPE html>
<html>
<head>
	<title>Consulta</title>

	<link rel="stylesheet" href="stylo.css">
	<meta charset="utf-8">


</head>
<body>

	<div id="caixa">
		<?php

			include "matricularDAO.php";
			$aluno = null;

			if (!empty($_POST["aluno"])) {
				$aluno = $_POST["aluno"];
				$array = consultar($aluno);
				if ($array == false) {
					die("Usuário não encontrado!");
				}
				echo "<h1>Dados</h1><h3>Dados Pessoais</h3><label>Nome: ".$array[0][1]."</label><br><label>Email: ".$array[0][2]."</label><br><label>Telefone: ".$array[0][3]."</label><h3>Cursos</h3>";

				if (count($array[1]) == 0) {
					echo "<h2>Não possui cursos</h2><br>";
				}else{
					foreach ($array[1] as $value) {
						echo "<label>$value</label><br>";
					}
				}
				echo "</table>";

			}else{
				echo "<h1>Consulta</h1><form method='POST' action='/trabalho/consulta.php'><label for='aluno'>Digite a matricula do aluno:</label><br><input type='number' name='aluno' id='aluno' id='aluno' required><br><input type='submit' value='Submitar'></form>";
			}

		?>
	</div>
	
</body>
</html>