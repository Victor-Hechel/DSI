CREATE TABLE registros(placa VARCHAR(8) NOT NULL REFERENCES veiculos(placa),
		       entrada TIMESTAMP NOT NULL,
		       saida TIMESTAMP DEFAULT NULL,
		       vaga INTEGER REFERENCES vagas(id),
		       PRIMARY KEY(placa, entrada));

CREATE TABLE veiculos (placa VARCHAR(8) PRIMARY KEY,
		       veiculo TIPOS_VEICULOS NOT NULL,
		       marca VARCHAR(15) NOT NULL,
		       modelo VARCHAR(15) NOT NULL,
		       cor VARCHAR(15) NOT NULL);

CREATE TABLE vagas(id INTEGER PRIMARY KEY,
		   placa VARCHAR(8) REFERENCES veiculos(placa) DEFAULT NULL);

drop table veiculos;


CREATE TYPE tipos_veiculos AS ENUM('moto', 'carro', 'camionete');

INSERT INTO vagas VALUES(1);
INSERT INTO vagas VALUES(2);
INSERT INTO vagas VALUES(3);
INSERT INTO vagas VALUES(4);
INSERT INTO vagas VALUES(5);


SELECT * FROM vagas WHERE placa IS NULL LIMIT 1;


----------------

DELETE FROM registros WHERE placa = 'AAA-1111';
DELETE FROM veiculos WHERE placa = 'AAA-1111';

INSERT INTO vagas(placa) VALUES('AAA-1111') HAVING id = 1;

UPDATE vagas SET placa = NULL WHERE id = 2;

SELECT (EXTRACT(EPOCH FROM saida) - EXTRACT(EPOCH FROM entrada))/3600 FROM registros WHERE vaga = 5;

SELECT entrada - saida FROM registros WHERE placa = 'AAA-1111';
SELECT * FROM registros WHERE placa = 'AAA-1111' AND saida IS NULL;

SELECT EXTRACT(HOUR FROM entrada) FROM registros;

SELECT * FROM vagas;

SELECT (saida - entrada) AS diferenca FROM registros;

SELECT (EXTRACT(EPOCH FROM ('2014-02-18T20:00')) - EXTRACT(EPOCH FROM entrada))/3600 AS diferenca FROM registros;

SELECT mod.veiculos, COUNT(vag.placa) FROM vagas vag JOIN veiculos vei ON(vag.placa = vei.placa)
					    RIGHT JOIN modelos mod ON (mod.veiculos = vei.veiculo)
GROUP BY mod.veiculos;

CREATE VIEW modelos AS
	SELECT unnest(enum_range(NULL::tipos_veiculos)) AS VEICULOS;
SELECT mod.veiculos AS modelos, COUNT(vag.placa) AS quant FROM vagas vag JOIN veiculos vei ON(vag.placa = vei.placa)RIGHT JOIN modelos mod ON (mod.veiculos = vei.veiculo)GROUP BY mod.veiculos;
