<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosController extends CI_Controller {

	public function __CONSTRUCT(){

		parent::__CONSTRUCT();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('table');
        $this->load->model('Usuarios');
	}

	public function index(){
		$dados = array(
			'titulo' => 'Login');
		$this->load->view('telas/login', $dados);
	}

	function isLogado(){
		if ($this->session->userdata('admin') == 'f' || $this->session->userdata('admin') == NULL) {
			$this->session->set_flashdata('mensagem', "Você não tem acesso a área");
			redirect('/');
		}
	}


	public function login(){

		$this->form_validation->set_rules('login', 'LOGIN', 'required');
		$this->form_validation->set_rules('senha', 'SENHA', 'required');

		if ($this->form_validation->run() == TRUE) {
			$dados = elements(array('login', 'senha'), $this->input->post());

			$info = array('login' => $dados['login']);

			$id = $this->Usuarios->verificaLoginAdmin($dados);

			if($id != NULL){
				$this->session->set_userdata(array('id' => $id,
												   'admin' => 't'));
				redirect('UsuariosController/listar');
			}else{
				$id = $this->Usuarios->verificaLoginComum($dados);
				if ($id != NULL) {
					$this->session->set_userdata(array('id' =>  $id,
												       'admin' => 'f',
												       'permissoes' => $this->Usuarios->getPermissoes($id)));
					redirect('NoticiasController/listar');
				}
			}
		}

		$this->index();

	}

	public function listar(){

		$this->isLogado();

		$dados = array('titulo' => 'Listar Usuarios',
					   'tela' => 'listar',
					   'usuarios' => $this->Usuarios->getAll(),
					   );

		$this->load->view('telaAdmin', $dados);
	}

	public function cadastrar(){

		$this->isLogado();

		$this->form_validation->set_rules('nome', 'NOME', 'required');
		$this->form_validation->set_rules('login', 'LOGIN', 'required');
		$this->form_validation->set_rules('senha', 'SENHA', 'required');
		$this->form_validation->set_rules('senha2', 'SENHA2', 'required');

		if ($this->form_validation->run()==TRUE) {
			$dados = elements(array('nome', 'login', 'senha'), $this->input->post());

			$permissoes  = $this->input->post('permissao');

			$dados['senha'] = md5($dados['senha']);

			$id = $this->Usuarios->cadastrar($dados);

			$this->Usuarios->cadastrarPermissoes($permissoes, $id);

			$this->session->set_flashdata('mensagem', "Autor cadastrado com sucesso");

			redirect('/listarAutores');
		}

		$dados = array('titulo' => 'Cadastrar Usuários',
					   'tela' => 'cadastrar');

		$this->load->view('telaAdmin', $dados);

	}

	public function excluir(){

		$this->isLogado();

		$id = $this->uri->segment(3);

		if ($id > 0) {
			$this->Usuarios->excluir(array('id' => $id));
		}

		$this->session->set_flashdata('mensagem', "Autor excluído com sucesso");

		redirect('/UsuariosController/listar');
	}

	public function editar(){

		$this->isLogado();

		$this->form_validation->set_rules('nome', 'NOME', 'required');
		$this->form_validation->set_rules('login', 'LOGIN', 'required');

		$id = $this->input->post('id');


		if ($this->form_validation->run()==TRUE) {
			$dados = elements(array('nome', 'login'), $this->input->post());
			$permissoes = $this->input->post('permissao');
			$this->Usuarios->editar($dados, $id, $permissoes);

			$this->session->set_flashdata('mensagem', "Autor editado com sucesso");

			redirect('/listarAutores');
		}

		if($id == NULL){
			$id = $this->uri->segment(2);	
		}

		$autor = $this->Usuarios->get($id);

		$permissoes = $this->Usuarios->getPermissoes($id);

		$dados = array('titulo' => 'Editar Usuários',
					   'tela' => 'editar',
					   'autor' => $autor,
					   'permissoes' => $permissoes);

		$this->load->view('telaAdmin', $dados);

	}

	public function deslogar(){
		$this->session->sess_destroy();

		$this->session->set_flashdata('mensagem', 'Deslogado com sucesso');

		redirect("/");

	}

}