<?php
echo "<h2>Lista de Usuários</h2>";

if($this->session->flashdata('mensagem')){
	echo "<p>" . $this->session->flashdata('mensagem') . '</p>';
}
$this->table->set_heading('Id', 'Nome', 'Login', 'Operações', 'Permissões');
foreach ($usuarios as $linha) {

	$allPermissoes = $this->Usuarios->getPermissoes($linha->id);

	$permissoes = "";

	foreach ($allPermissoes as $value) {
		$permissoes .= $value->permissao . " ";
	}

	$this->table->add_row($linha->id, $linha->nome, $linha->login,
						  anchor("UsuariosController/excluir/$linha->id", "Excluir") . " - ". 
						  anchor("editarUsuario/$linha->id", "Editar"),
						  $permissoes);
}
echo $this->table->generate();