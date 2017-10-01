<?php

echo form_open("UsuariosController/cadastrar");

echo validation_errors('<h4>', '</h4>');

if ($this->session->flashdata("mensagem")) {
	echo $this->session->flashdata("mensagem");
}

echo form_label("Nome: ");
echo form_input(array('name' => 'nome'), set_value('nome'), 'autofocus');
echo "<br>";
echo form_label("Login: ");
echo form_input(array('name' => 'login'));
echo "<br>";
echo form_label("Senha: ");
echo form_password(array('name' => 'senha'));
echo "<br>";
echo form_label("Digite a senha novamente: ");
echo form_password(array('name' => 'senha2'));
echo "<br>";
echo "Informe as especificações: ";
echo "<br>";
echo form_label("Cadastrar");
echo form_checkbox(array('name' => 'permissao[]', 'id' => 'cadastro', 'value' => '1'));
echo "<br>";
echo form_label("Excluir");
echo form_checkbox(array('name' => 'permissao[]', 'id' => 'excluir', 'value' => '3'));
echo "<br>";
echo form_label("Editar");
echo form_checkbox(array('name' => 'permissao[]', 'id' => 'editar', 'value' => '4'));


echo "<br>";

echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
echo form_close();