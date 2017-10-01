<?php

echo form_open_multipart("NoticiasController/cadastrar");

echo validation_errors('<p>', '</p>');

if ($this->session->flashdata("mensagem")) {
	echo $this->session->flashdata("mensagem");
}

echo form_label("Título da Matéria: ");
echo form_input(array('name' => 'titulo'), set_value('titulo'), 'autofocus');
echo "<br>";
echo form_label("Descrição: ");
echo form_textarea(array('name' => 'texto'));
echo "<br>";
echo form_label("Data: ");
echo form_input(array('name'=> 'data'));
echo "<br>";
echo form_label("Hora: ");
echo form_input(array('name' => 'hora'));
echo "<br>";
echo "<input type='file' name='foto'>";
echo "<br>";
echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
echo "<br>";
echo form_close();