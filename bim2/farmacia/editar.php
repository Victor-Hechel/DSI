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
		include 'models/medicamentos.class.php';
		include_once 'DAO/medicamentosDAO.php';

		$id = $_GET['id'];

		$dao = new medicamentosDAO();
		$med = $dao->selectById($id);
	?>

	<h1>Cadastro</h1>
	<form method="POST" action="controllers/editarController.php">
		<label>
			Nome: <input type="text" name="nome" placeholder="Digite o nome..." value=<?php echo ($med->getNome()); ?>>
		</label>
		<br>
		<label>
			Fabricante: <input type="text" name="fabricante" placeholder="Digite o nome do fabricante..." value=<?php echo ($med->getFabricante()); ?>>
		</label>
		<br>
		Controlado:
		<br>
		<label>
			Sim: <input type="radio" name="controlado" value="true" id="true">
		</label>
		<label>
			Não: <input type="radio" name="controlado" value="false" id="false">
		</label>
		<br>	
		<label>
			Quantidade: <input type="number" name="quantidade" placeholder="Digite a quantidade..." value=<?php echo ($med->getQuantidade()); ?>>
		</label>
		<br>
		<label>
			Preço: <input type="number" name="preco" placeholder="Digite o preço..." value=<?php echo ($med->getPreco()); ?>>
		</label>
		<input type="hidden" id="controlado" name="controlado" value="<?php echo ($med->getControlado()); ?>">
		<input type="hidden" name="id" value=<?php echo $id; ?>>
		<br>
		<input type="submit" value="Cadastrar">
	</form>
	<script type="text/javascript">
		var controlado = document.getElementById("controlado").value;
		if (controlado == 1) {
			controlado = "true";
		}else{
			controlado = "false";
		}
		document.getElementById(controlado).checked = true;
	</script>
</body>
</html>