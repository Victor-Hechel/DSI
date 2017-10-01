<?php

$this->load->view('includes/header');
$this->load->view('includes/body');
if ($tela != '') {
	$this->load->view('adminTelas/'.$tela);
}
$this->load->view('includes/footer');