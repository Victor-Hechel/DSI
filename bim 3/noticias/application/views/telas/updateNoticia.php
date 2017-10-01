<?php

echo form_open("NoticiasController/editar");

echo validation_errors('<p>', '</p>');

if ($this->session->flashdata("mensagem")) {
	echo $this->session->flashdata("mensagem");
}

echo form_label("Título da Matéria: ");
echo form_input(array('name' => 'titulo'), set_value('titulo', $noticia->titulo), 'autofocus');
echo "<br>";
echo form_label("Descrição: ");
echo form_textarea(array('name' => 'texto'), set_value('texto', $noticia->texto));
echo "<br>";

$datahora = explode(" ", $noticia->datahora);

echo form_label("Data: ");
echo form_input(array('name'=> 'data'), set_value('data', date('d/m/y', strtotime($datahora[0]))));
echo "<br>";
echo form_label("Hora: ");
echo form_input(array('name' => 'hora'), set_value('hora', date('H:i', strtotime($datahora[1]))));
echo "<br>";
echo form_hidden('id',$noticia->id);
echo form_submit(array('name'=>'cadastrar'), 'Cadastrar');
echo "<br>";
echo form_close();