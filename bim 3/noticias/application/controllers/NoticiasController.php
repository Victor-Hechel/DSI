<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NoticiasController extends CI_Controller {

	public function __CONSTRUCT(){
		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
        $this->load->model('Noticias');
        $this->load->model('Usuarios');
	}

	public function index(){
		$dados = array(
			'titulo' => 'Menu',
			'tela' => '',);
		$this->load->view('menu', $dados);
	}

	function isLogado(){
		if ($this->session->userdata('admin') == 't' || $this->session->userdata('admin') == NULL) {
			$this->session->set_flashdata('mensagem', "Você não tem acesso a área");
			redirect('/');
		}
	}

	function temPermissao($permissao){
		$flag = FALSE;
		foreach ($this->session->userdata('permissoes') as $key => $value) {
			if ($value->permissao == $permissao) {
				$flag = TRUE;
				break;
			}
		}
		if (!$flag) {
			$this->session->set_flashdata('mensagem', "Você não possui essa permissão");
			redirect('/listarNoticias');
		}
	}

	public function cadastrar(){

		$this->isLogado();

		$this->temPermissao("Cadastrar");

		$this->form_validation->set_rules('titulo', 'TITULO', 'trim|required|max_length[50]|is_unique[noticias.titulo]');
		$this->form_validation->set_rules('texto', 'TEXTO', 'trim|required|min_length[10]|max_length[100]');
		$this->form_validation->set_rules('data', 'DATA', 'trim|required');
		$this->form_validation->set_rules('hora', 'HORA', 'trim|required');

		if ($this->form_validation->run()==TRUE) {
			$dados = elements(array('titulo', 'texto', 'data', 'hora'), $this->input->post());
			$dados['autor'] = $this->session->userdata('id');

			$datahora = $dados['data'] . " " . $dados['hora'];
			
			$dados = array('titulo' => $dados['titulo'],
						   'texto' => $dados['texto'],
						   'autor' => $dados['autor'],
						   'datahora' => $datahora);

			$id = $this->Noticias->cadastrar($dados);


			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'jpg';
            $config['file_name'] = $id;

            $this->load->library('upload', $config);

            $this->upload->do_upload('foto');

            $this->session->set_flashdata('mensagem', "Notícia cadastrada com sucesso");

			redirect('/NoticiasController/listar');
		}

		$usersDB = $this->Usuarios->getAll();
		$autores = array();

		foreach ($usersDB as $value) {
			$autores[$value->id] = $value->nome;
		}

		$dados = array(
			'titulo' => 'CRUD &raquo; Create',
			'tela' => 'cadastrarNoticia',
			'autores' => $autores,
		);
		$this->load->view('menu',$dados);
	}

	public function excluir(){

		$this->isLogado();

		$this->temPermissao("Excluir");

		$id = $this->uri->segment(2);

		if ($id > 0) {

			$this->Noticias->excluir(array('id' => $id));
			unlink("./uploads/$id.jpg");
		}

		$this->session->set_flashdata('mensagem', "Notícia excluída com sucesso");

		redirect('/NoticiasController/listar');

	}

	public function editar(){

		$this->isLogado();

		$this->temPermissao("Editar");


		$this->form_validation->set_rules('titulo', 'TITULO', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('texto', 'TEXTO', 'trim|required|min_length[10]|max_length[100]');
		$this->form_validation->set_rules('data', 'DATA', 'trim|required');
		$this->form_validation->set_rules('hora', 'HORA', 'trim|required');

		if ($this->form_validation->run()==TRUE) {
			$dados = elements(array('titulo', 'texto', 'data', 'hora', 'id'), $this->input->post());

			$datahora = $dados['data'] . " " . $dados['hora'];

			$id = $dados['id'];

			$dados = array('titulo' => $dados['titulo'],
						   'texto' => $dados['texto'],
						   'datahora' => $datahora);

			$this->Noticias->update($dados, $id);

			$this->session->set_flashdata('mensagem', "Notícia editada com sucesso");

			redirect('/NoticiasController/listar');
		}

		$usersDB = $this->Usuarios->getAll();
		$autor = array();

		foreach ($usersDB as $value) {
			$autor[$value->id] = $value->nome;
		}

		$noticia = $this->Noticias->get($this->uri->segment(3));


		$dados = array(
			'titulo' => 'CRUD &raquo; Update',
			'tela' => 'updateNoticia',
			'autores' => $autor,
			'noticia' => $noticia,
		);
		$this->load->view('menu',$dados);

	}
	
	public function listar(){

		$this->isLogado();

		$dados = array('titulo' => 'Notícias',
					   'tela' => 'listarNoticias',
					   'noticias' => $this->Noticias->getAll());

		$this->load->view('menu', $dados);

	}

}