<?php

echo "<h2>Lista de Notícias</h2>";

if($this->session->flashdata('mensagem')){
	echo "<p>" . $this->session->flashdata('mensagem') . '</p>';
}

$this->table->set_heading('Imagem','Título', 'Data/Hora', 'Autor', 'Operações');
foreach ($noticias as $linha) {

	$this->table->add_row("<img width='200' height='200' src='../uploads/" . $linha->id . ".jpg'>", $linha->titulo, $linha->datahora, $linha->nome,
						  anchor("excluirNoticia/$linha->id", "Excluir"),
						  anchor("NoticiasController/editar/$linha->id", "Editar"));
}
echo $this->table->generate();