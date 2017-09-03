<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="post" action="controllers/loginController.php">	
		<h1>Login</h1>
		<h2><?php if(!empty($_GET['erro'])){
			echo ($_GET['erro']);
			} ?></h2>
		<label>
			Login: <input type="text" name="login" placeholder="Digite seu login...">
		</label>
		<label>
			Senha: <input type="password" name="senha" placeholder="Digite sua senha...">
		</label>
		<input type="submit" value="Logar">
	</form>
</body>
</html>