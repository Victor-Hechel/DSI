<?php

	include_once 'DAO.php';
	include_once '../models/medicamentos.class.php';
	class medicamentosDAO extends DAO{
		
		function __construct(){
			parent::__construct();
		}

		function save($med){
			$sql = "INSERT INTO medicamentos VALUES(DEFAULT, '".$med->getNome()."', '".$med->getFabricante()."', ".$med->getControlado().", ".$med->getQuantidade().", ".$med->getPreco().");";

			pg_query($this->con, $sql);
		}

		function excluir($id){
			$sql = "DELETE FROM medicamentos WHERE id = $id";
			echo "$sql";
			pg_query($this->con, $sql);
		}

		function update($med){
			$sql = "UPDATE medicamentos SET nome = '".$med->getNome()."', fabricante = '".$med->getFabricante()."', controlado = ".$med->getControlado().", quantidade = ".$med->getQuantidade().", preco = ".$med->getPreco()." WHERE id = ".$med->getId().";";
			pg_query($sql);
		}

		function selectById($id){
			$sql = "SELECT * FROM medicamentos WHERE id = $id;";
			$res = pg_query($this->con, $sql);
			$array = pg_fetch_array($res);
			$med = new Medicamentos();
			$med->setId($array['id']);
			$med->setNome($array['nome']);
			$med->setFabricante($array['fabricante']);
			$med->setControlado(($array['controlado']) === "t");
			$med->setQuantidade($array['quantidade']);
			$med->setPreco($array['preco']);
			return $med;
		}

		function selectByName($nome){
			$sql = "SELECT * FROM medicamentos WHERE nome LIKE '%$nome%';";
			$res = pg_query($this->con, $sql);
			$retorno = array();
			while (($array = pg_fetch_array($res)) !== FALSE) {
				$med = new Medicamentos();
				$med->setId($array['id']);
				$med->setNome($array['nome']);
				$med->setFabricante($array['fabricante']);
				$med->setControlado(($array['controlado']) === "t");
				$med->setQuantidade($array['quantidade']);
				$med->setPreco($array['preco']);
				$retorno[] = $med;
			}
			return $retorno;
		}

		function selectByFabricante($nome){
			$sql = "SELECT * FROM medicamentos med WHERE fabricante = '$nome';";
			$res = pg_query($this->con, $sql);
			$retorno = array();
			while (($array = pg_fetch_array($res)) !== FALSE) {
				$med = new Medicamentos();
				$med->setId($array['id']);
				$med->setNome($array['nome']);
				$med->setFabricante($array['fabricante']);
				$med->setControlado(($array['controlado']) === "t");
				$med->setQuantidade($array['quantidade']);
				$med->setPreco($array['preco']);
				$retorno[] = $med;
			}
			return $retorno;
		}

		function selectControlados(){
			$sql = "SELECT * FROM medicamentos WHERE controlado = 't'";
			$res = pg_query($this->con, $sql);
			$retorno = array();
			while (($array = pg_fetch_array($res)) !== FALSE) {
				$med = new Medicamentos();
				$med->setId($array['id']);
				$med->setNome($array['nome']);
				$med->setFabricante($array['fabricante']);
				$med->setControlado(true);
				$med->setQuantidade($array['quantidade']);
				$med->setPreco($array['preco']);
				$retorno[] = $med;
			}
			return $retorno;
		}

		function selectFaltando(){
			$sql = "SELECT * FROM medicamentos WHERE quantidade <= 5";
			$res = pg_query($this->con, $sql);
			$retorno = array();
			while (($array = pg_fetch_array($res)) !== FALSE) {
				$med = new Medicamentos();
				$med->setId($array['id']);
				$med->setNome($array['nome']);
				$med->setFabricante($array['fabricante']);
				$med->setControlado(($array['controlado']) === "t");
				$med->setQuantidade($array['quantidade']);
				$med->setPreco($array['preco']);
				$retorno[] = $med;
			}
			return $retorno;
		}
	}
?>