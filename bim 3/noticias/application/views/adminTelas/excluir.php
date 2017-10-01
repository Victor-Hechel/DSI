<?php 

$iduser = $this->uri->segment(3);
if ($iduser == NULL) {
	//redirect('crud/read');
}

echo form_open("UsuariosController/excluir");
echo form_hidden('idusuario', $iduser);
echo form_close();