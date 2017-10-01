<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Model{


	public function cadastrar($dados){
		if ($dados != null) {
			$this->db->insert('noticias', $dados);
			return $this->db->insert_id();
		}
	}

	public function getAll(){
		$this->db->select("noticias.id, noticias.titulo, autores.nome, noticias.datahora");
		$this->db->join('autores', 'autores.id = noticias.autor');
		$this->db->order_by("datahora", "desc");
		$this->db->from("noticias");
		$query = $this->db->get(); 
		return $query->result();
	}

	public function excluir($id){
		if ($id != NULL) {
			$this->db->delete('noticias', $id);
			return true;
		}
		return false;
	}

	public function get($id){
		$this->db->where('id', $id);
		return $this->db->get('noticias')->row();
	}

	public function update($dados, $id){
		$this->db->where('id', $id);
		$this->db->update('noticias', $dados);
	}
}