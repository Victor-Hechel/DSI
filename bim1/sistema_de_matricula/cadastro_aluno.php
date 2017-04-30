<html>

<head>
	<title>Cadastro Aluno</title>

	<link rel="stylesheet" href="stylo.css">
	<meta charset="utf-8">

	
</head>	

<body>

	<form method="POST" action="cadastro_aluno.php">
		
		<div id="caixa">
			
			<h1>Cadastro Aluno</h1>

			<?php
		
				include "alunoDAO.php";

				$nome = null;
				$email = null;
				$telefone = null;

				if(!(empty($_POST["nome"]) && empty($_POST["email"]) && empty($_POST["telefone"]))){
					$nome = $_POST["nome"];
					$email = $_POST["email"];
					$telefone = $_POST["telefone"];

					if (!preg_match("/[A-Za-z]{3,}/", $nome)){ 
					echo "<h3>Nome Inválido</h3>";
				}
					elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
					echo "<h3>Email Inválido</h3>";
				}
					elseif (!preg_match('\([0-9]{2}\)9[0-9]{8}', $telefone)){ 
					echo "<h3>Telefone deve ter o formato (xx)9xxxxxxxx</h3>";
				}
					else
					cadastrarAluno($nome, $email, $telefone);
				}
			?>
			
			<label for="nome">Nome:</label>
			<input type="text" name="nome" id="nome" required>
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" required>
			<label for="telefone">Telefone:</label>
			<input type="text" name="telefone" id="telefone" required>
			<input type="submit" value="Cadastrar">

		</div>

	</form>

</body>

</html>