<?php

	require_once 'dao.php';
	require_once '../models/vaga.class.php';


	class VagasDAO extends DAO{
		
		function __construct(){
			parent::__construct();
		}
	

		function inserir($vaga){
			$sql = sprintf("INSERT INTO vagas VALUES('%s', '%s', %d, %d);", $vaga->getCodigo(), $vaga->getTipo(), $vaga->getAndar(), $vaga->getNumero());

			return pg_query($this->con, $sql);

		}

		function temVagaTipo($tipo){
			$sql = "SELECT vag.codigo FROM vagas vag LEFT JOIN registros reg ON (vag.codigo = reg.id_vaga) WHERE vag.tipo = '$tipo' AND vag.codigo NOT IN(SELECT vag.codigo FROM vagas vag JOIN registros reg ON (vag.codigo = reg.id_vaga) WHERE reg.saida IS NULL AND vag.tipo = '$tipo') LIMIT 1;";
			$vaga = null;
			$rs = pg_query($this->con, $sql);
			while (($array = pg_fetch_array($rs)) !== false) {
				$vaga = $array["codigo"];
			}
			return $vaga;
		}

		function getAllVagas(){
			$sql = "SELECT codigo FROM vagas";

			$rs = pg_query($this->con, $sql);

			$vagas = [];

			while (($array = pg_fetch_array($rs)) !== false) {
				$vagas[] = $array['codigo'];
			}

			return $vagas;
		}

		function estaOcupada($codigo){
			$sql = "SELECT reg.id_veiculo AS placa FROM vagas vag JOIN registros reg ON (vag.codigo = reg.id_vaga) WHERE reg.saida IS NULL AND vag.codigo = '$codigo';";

			$rs = pg_query($this->con, $sql);
			if (pg_num_rows($rs) > 0) {
				return pg_fetch_array($rs, 0)["placa"];
			}
			return null;
		}
	}
?>