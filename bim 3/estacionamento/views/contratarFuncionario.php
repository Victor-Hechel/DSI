<?php
	require_once '../certificacao.php';

	if (!Certificacao::isGerente()) {
		header("Location: menu.php?erro=" . urlencode("Você não é gerente!"));
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Contratar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Contratar</h1>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form method="post" action='../controls/contratarFuncionarioControl.php'>
				  <div class="form-group">
				    <label for="cpf">CPF: </label>
				    <input type="number" class="form-control" id="cpf" name="cpf" placeholder="Digite o cpf...">
				  </div>
				  <div class="form-group">
				    <label for="nome">Nome: </label>
				    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome...">
				  </div>
				  <div class="form-group">
				    <label for="data_nascimento">Data de Nascimento: </label>
				    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
				  </div>
				  <div class="form-group">
				    <label for="email">Email: </label>
				    <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email...">
				  </div>
				  <div class="form-group">
				    <label for="senha">Senha: </label>
				    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha...">
				  </div>
				  <div class="form-group">
				    <label for="salario">Salário: </label>
				    <input type="number" class="form-control" id="salario" name="salario" step="0.01">
				  </div>
				  <div class="form-group">
				    <span>Gerente: </span>
				    <br>
				    <label class="radio-inline">
	      				<input type="radio" value="1" name="gerente">Sim
	    			</label>
	    			<label class="radio-inline">
	      				<input type="radio" value="0" name="gerente" checked>Não
	    			</label>
				  </div>
				  <div class="text-center">
				  	<button type="submit" class="btn btn-primary">Contratar</button>
				  </div>
				</form>
			</div>
		</div>
	</div>

	<!--
	<h1>Contratar</h1>
	<form method="post" action='../controls/contratarFuncionarioControl.php'>
		<label>CPF: <input type="number" name="cpf"></label>
		<br>
		<label>Nome: <input type="text" name="nome"></label>
		<br>
		<label>Data de Nascimento: <input type="date" name="data_nascimento"></label>
		<br>
		<label>Email: <input type="email" name="email"></label>
		<br>
		<label>Senha: <input type="password" name="senha"></label>
		<br>
		<label>Salário: <input type="number" name="salario" step='0.01' min="0"></label>
		<br>
		<span>Gerente: </span>
		<label>Sim <input type="radio" name="gerente" value=true></label>
		<label>Não <input type="radio" name="gerente" value=false checked></label>
		<br>
		<input type="submit" value="Contratar">
	</form>
	-->
</body>
</html>