<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="views/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>Login</h1>
			</div>
		</div>

		<?php if(isset($_GET['erro'])){ 

		?>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="alert alert-danger"><?php echo $_GET['erro'];?></div>
			</div>
		</div>
		<?php
		}
		?>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form method="post" action="controls/loginPost.php">
				  <div class="form-group">
				    <label for="login">Login: </label>
				    <input type="text" class="form-control" id="login" name="login" placeholder="Digite o login...">
				  </div>
				  <div class="form-group">
				    <label for="senha">Senha: </label>
				    <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha...">
				  </div>
				  <div class="text-center">
				  	<button type="submit" class="btn btn-primary">Logar</button>
				  </div>
				</form>
			</div>
		</div>
	</div>
	
	<!--<form method="post" action="controls/loginPost.php">
		<?php if(isset($_GET['erro'])){ 
				echo "<h3>" . $_GET['erro'] . "</h3>";
			  }
		?>
		<label>Login: <input type="text" name="login"></label>
		<br>
		<label>Senha: <input type="password" name="senha"></label>
		<br>
		<input type="submit" value="Logar">
	</form>
	-->
</body>
</html>