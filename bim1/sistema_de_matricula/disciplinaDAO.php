<?php

	function cadastrarDisciplina($nome, $num_max){
		$arquivo = fopen("disciplinas.csv", "a+");
		$num_materias = numMaterias();
		fwrite($arquivo, "$num_materias;$nome;$num_max\n");
		fclose($arquivo);
	}

	function numMaterias(){
		return count(file("disciplinas.csv"))+1;
	}

	function listaDisciplinas(){
		$arquivo = fopen("disciplinas.csv", "r");
		$vetor = array();
		while (($linha = fgets($arquivo)) !== false) {
			$dados = explode(";", $linha);
			$vetor[$dados[0]] = $dados[1];
		}
		asort($vetor);
		fclose($arquivo);
		return $vetor;
	}

	function getNumVaga($disciplina){
		$arquivo = fopen("disciplinas.csv", "r");
		while(($linha = fgets($arquivo)) !== false){
			$dados = explode(";", $linha);
			if ($dados[0] == $disciplina) {
				return $dados[2];
			}
		}
		fclose($arquivo);
	}

	function getDisciplina($disciplina){
		$arquivo = fopen("disciplinas.csv", "r");
		while(($linha = fgets($arquivo)) != false){
			$dados = explode(";", $linha);
			if ($dados[0] == $disciplina) {
				fclose($arquivo);
				return $dados[1];
			}
		}
	}

?>