<?php

	function cadastrarAluno($nome, $email, $telefone){
		$arquivo = fopen("alunos.csv", "a+");
		$num_alunos = numAlunos();
		fwrite($arquivo, "$num_alunos;$nome;$email;$telefone\n");
		fclose($arquivo);
	}

	function numAlunos(){
		return count(file("alunos.csv"))+1;
	}

	function listaAlunos(){
		$arquivo = fopen("alunos.csv", "r");
		$vetor = array();
		while (($linha = fgets($arquivo)) !== false) {
			$dados = explode(";", $linha);
			$vetor[$dados[0]] = $dados[1];
		}
		asort($vetor);
		fclose($arquivo);
		return $vetor;
	}

	function getAluno($aluno){
		$arquivo = fopen("alunos.csv", "r");
		while(($linha = fgets($arquivo)) != false){
			$dados = explode(";", $linha);
			if ($dados[0] == $aluno) {
				fclose($arquivo);
				return $dados;
			}
		}
		return false;
	}

?>