<?php

$this->load->view('includes/header');

echo form_open('UsuariosController/login');

if ($this->session->flashdata('mensagem')) {
	echo "<h4>" . $this->session->flashdata('mensagem') . "</h4>";
}

echo form_label('Login: ');
echo form_input(array('name' => 'login'), set_value(''), 'autofocus');

echo "<br>";

echo form_label('Senha: ');
echo form_password(array('name' => 'senha'));

echo "<br>";

echo form_submit(array('name' => 'cadastrar'), 'Logar');

form_close();