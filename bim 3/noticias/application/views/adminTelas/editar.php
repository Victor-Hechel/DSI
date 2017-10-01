<?php

echo form_open("UsuariosController/editar");

echo validation_errors('<p>', '</p>');

if ($this->session->flashdata("mensagem")) {
	echo $this->session->flashdata("mensagem");
}

$cadastrar = false;
$excluir = false;
$editar = false;

foreach ($permissoes as $value) {
	if ($value->permissao == "Cadastrar") {
		$cadastrar = true;
	}elseif ($value->permissao == "Editar") {
		$editar = true;
	}elseif ($value->permissao == "Excluir") {
		$excluir = true;
	}
}


echo form_label("Nome: ");
echo form_input(array('name' => 'nome'), set_value('nome', $autor->nome), 'autofocus');
echo "<br>";
echo form_label("Login: ");
echo form_input(array('name' => 'login'), set_value('login', $autor->login));
echo "<br>";

echo "Informe as especificações: ";
echo "<br>";
echo form_label("Cadastrar");
if ($cadastrar) {
	echo form_checkbox(array('name' => 'permissao[]', 'id' => 'cadastro', 'value' => '1', 'checked' => TRUE));
}else{
	echo form_checkbox(array('name' => 'permissao[]', 'id' => 'cadastro', 'value' => '1'));
}

echo "<br>";
echo form_label("Excluir");
if ($excluir) {
	echo form_checkbox(array('name' => 'permissao[]', 'id' => 'excluir', 'value' => '3', 'checked' => TRUE));
}else{
	echo form_checkbox(array('name' => 'permissao[]', 'id' => 'excluir', 'value' => '3'));
}

echo "<br>";
echo form_label("Editar");

if ($editar) {
	echo form_checkbox(array('name' => 'permissao[]', 'id' => 'editar', 'value' => '4', 'checked' => TRUE));
}else{
	echo form_checkbox(array('name' => 'permissao[]', 'id' => 'editar', 'value' => '4'));
}

echo form_hidden('id',$autor->id);
echo form_submit(array('name'=>'editar'), 'Editar');
echo form_close();