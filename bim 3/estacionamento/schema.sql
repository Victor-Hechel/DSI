CREATE DATABASE "estacionamento";

CREATE TABLE funcionarios (cpf INTEGER PRIMARY KEY,
						   nome VARCHAR(50) NOT NULL,
						   data_nascimento DATE NOT NULL,
						   data_contratacao DATE NOT NULL,
						   data_desligamento DATE DEFAULT NULL,
						   email VARCHAR(50) NOT NULL,
						   senha VARCHAR(32) NOT NULL,
						   salario FLOAT NOT NULL);

CREATE TABLE gerentes (id SERIAL PRIMARY KEY,
		      cpf INTEGER REFERENCES funcionarios(cpf));


CREATE TABLE veiculos (placa VARCHAR(8) PRIMARY KEY,
				       marca VARCHAR(15) NOT NULL,
				       modelo VARCHAR(15) NOT NULL,
				       cor VARCHAR(15) NOT NULL);
		       
CREATE TABLE carros (id SERIAL PRIMARY KEY,
				     placa_veiculo VARCHAR(8) REFERENCES veiculos(placa));

CREATE TABLE motos (id SERIAL PRIMARY KEY,
				    placa_veiculo VARCHAR(8) REFERENCES veiculos(placa));


CREATE TABLE outros (id SERIAL PRIMARY KEY,
				     veiculo VARCHAR(20) NOT NULL,
				     placa_veiculo VARCHAR(8) REFERENCES veiculos(placa));


CREATE TABLE vagas (codigo VARCHAR(10) PRIMARY KEY,
				    tipo CHAR NOT NULL,
				    andar INTEGER NOT NULL,
				    numero INTEGER NOT NULL);


CREATE TABLE registros (id SERIAL PRIMARY KEY,
						id_vaga VARCHAR(10) REFERENCES vagas(codigo),
						id_veiculo VARCHAR(8) REFERENCES veiculos(placa),
						entrada TIMESTAMP NOT NULL,
						saida TIMESTAMP DEFAULT NULL,
						cpf_funcionario INTEGER REFERENCES funcionarios(cpf));


INSERT INTO funcionarios VALUES(12345, 'Victor', '05/02/1999', '22/03/2017', NULL, 'victor.hechel@gmail.com', 5000, md5('12345'));
INSERT INTO gerentes VALUES(DEFAULT, 12345);

CREATE TABLE precos (id SERIAL PRIMARY KEY,
		     categoria VARCHAR(20) NOT NULL,
		     valor FLOAT NOT NULL);

INSERT INTO precos VALUES(DEFAULT, 'Carro', 5);

INSERT INTO precos VALUES(DEFAULT, 'Moto', 4);

INSERT INTO precos VALUES(DEFAULT, 'Outro', 7);

INSERT INTO precos VALUES(DEFAULT, 'Per Noite', 18);

INSERT INTO precos VALUES(DEFAULT, 'Diaria', 25);