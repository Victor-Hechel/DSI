<?php

$this->load->view('includes/header');
$this->load->view('includes/userBody');
if ($tela != '') {
	$this->load->view('telas/'.$tela);
}