CREATE TABLE admins (id SERIAL PRIMARY KEY,
				     login VARCHAR(10) NOT NULL,
				     senha VARCHAR(32) NOT NULL);

INSERT INTO admins VALUES(DEFAULT, 'admin', md5('12345'));

CREATE TABLE autores (id SERIAL PRIMARY KEY,
				      nome VARCHAR(30) NOT NULL,
				      login VARCHAR(20) NOT NULL,
				      senha VARCHAR(32) NOT NULL);

CREATE TABLE noticias (id SERIAL PRIMARY KEY,
				       titulo VARCHAR(20) NOT NULL,
				       datahora TIMESTAMP NOT NULL,
				       texto VARCHAR(100) NOT NULL,
				       autor INTEGER REFERENCES autores(id) ON DELETE CASCADE);

CREATE TABLE permissoes (id SERIAL PRIMARY KEY,
			 permissao VARCHAR(20));

INSERT INTO permissoes VALUES(DEFAULT, 'Cadastrar');
INSERT INTO permissoes VALUES(DEFAULT, 'Ler');
INSERT INTO permissoes VALUES(DEFAULT, 'Excluir');
INSERT INTO permissoes VALUES(DEFAULT, 'Editar');

CREATE TABLE autor_permissao (id_permissao INTEGER REFERENCES permissoes(id),
			      			  id_usuario INTEGER REFERENCES autores(id) ON DELETE CASCADE);
