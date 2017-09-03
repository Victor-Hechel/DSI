<?php
	class Medicamentos{
		
		private $id;
		private $nome;
		private $fabricante;
		private $controlado;
		private $quantidade;
		private $preco;

		function __construct(){}

		function setId($id){
			$this->id = $id;
		}

		function getId(){
			return $this->id;
		}

		function setNome($nome){
			$this->nome = $nome;
		}

		function getNome(){
			return $this->nome;
		}

		function setFabricante($fabricante){
			$this->fabricante = $fabricante;
		}

		function getFabricante(){
			return $this->fabricante;
		}

		function setControlado($controlado){
			$this->controlado = $controlado;
		}

		function getControlado(){
			return $this->controlado;
		}

		function setQuantidade($quantidade){
			$this->quantidade = $quantidade;
		}

		function getQuantidade(){
			return $this->quantidade;
		}

		function setPreco($preco){
			$this->preco = $preco;
		}

		function getPreco(){
			return $this->preco;
		}
	}
?>