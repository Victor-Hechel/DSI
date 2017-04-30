<?php

	include "alunoDAO.php";
	include "disciplinaDAO.php";

	function matricular($aluno, $disciplina){
		if (verifica($aluno, $disciplina)) {
			$arq = fopen("matriculas.csv", "a+");
			fwrite($arq, "$aluno;$disciplina;\n");
			fclose($arq);
		}
	}

	function verifica($aluno, $disciplina){

		$num_vagas = getNumVaga($disciplina);

		$arquivo = null;

		if (file_exists("matriculas.csv")) {
			$arquivo = fopen("matriculas.csv", "r");
		}else{
			return true;
		}
		while (($linha = fgets($arquivo)) != false && $num_vagas > 0) {
			$dados = explode(";", $linha);
			if ($dados[1] == $disciplina){
				$num_vagas--;
			}

			if ($dados[0] == $aluno && $dados[1] == $disciplina) {
				return false;
			}
		}

		fclose($arquivo);

		if ($num_vagas > 0) {
			return true;
		}
		return false;
	}

	function consultar($aluno){
		$dados_aluno = getAluno($aluno);
		if ($dados_aluno === false) {
			die("Usuário não encontrado");
		}
		$dados_disciplinas = array();

		$arq = fopen("matriculas.csv", "r");

		while (($linha = fgets($arq)) != false) {
			$dados = explode(";", $linha);
			if ($dados[0] == $aluno){
				$dados_disciplinas[] = getDisciplina($dados[1]);
			}
		}

		return array($dados_aluno, $dados_disciplinas);

	}

?>