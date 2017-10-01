<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Model{
	public function verificaLoginAdmin($dados){
		if ($dados != null) {
			$this->db->where('login', $dados['login']);
			$this->db->where('senha', md5($dados['senha']));
			$this->db->limit(1);
			if(count($this->db->get('admins')->result()) > 0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}

	public function verificaLoginComum($dados){
		if ($dados != null) {
			$this->db->where('login', $dados['login']);
			$this->db->where('senha', md5($dados['senha']));
			$this->db->limit(1);
			$this->db->select("id");
			$id = $this->db->get('autores')->row()->id;
			echo $id;
			return $id;		
		}
	}

	public function getAll(){
		return $this->db->get('autores')->result();
	}

	public function cadastrar($dados){
		if ($dados != null) {
			$this->db->insert('autores', $dados);
			return $this->db->insert_id();
		}
		return false;
	}

	public function excluir($id){
		if ($id != NULL) {
			$this->db->delete('autores', $id);
			return true;
		}
		return false;
	}

	public function get($id){
		if ($id != NULL) {
			$this->db->where('id', $id);
			return $this->db->get("autores")->row();
		}
	}

	public function editar($dados, $id, $permissoes){
		if ($id != NULL) {
			$this->db->where('id', $id);
			$this->db->update('autores', $dados);
			$this->db->delete('autor_permissao', $id);

			$this->deletePermissoes($id);

			$this->cadastrarPermissoes($permissoes, $id);
		}
	}

	public function deletePermissoes($id){
		$this->db->where('id_usuario', $id);
		$this->db->delete('autor_permissao');
	}

	public function cadastrarPermissoes($permissoes, $id){
		foreach ($permissoes as $value) {
			$this->db->insert('autor_permissao', array('id_permissao' => $value, 'id_usuario' => $id));
		}
	}

	public function getPermissoes($id){
		$this->db->from('permissoes');
		$this->db->select('permissao');
		$this->db->join('autor_permissao', 'id = id_permissao');
		$this->db->where('id_usuario', $id);
		return $this->db->get()->result();
	}
}