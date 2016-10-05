DELIMITER $
CREATE PROCEDURE cadastrarCliente(cpf bigint, nome varchar(50), sexo char, apelido varchar(10), telefone numeric, dataNasc date, 
							 	  estado_civil char, email varchar(30), senha varchar(20))
BEGIN

INSERT INTO tb_cliente VALUES (DEFAULT, cpf, nome, sexo, apelido, telefone, dataNasc, estado_civil, email, senha);    
    
END $

DELIMITER $
CREATE PROCEDURE cadastrarEnderecoCliente(id_cliente mediumInt, logradouro varchar(25), logradouro_numero numeric,
                                  complemento varchar (20), bairro varchar(25), id_uf int, id_cidade int, CEP numeric)
BEGIN

INSERT INTO tb_cliente VALUES (DEFAULT, id_cliente, logradouro, logradouro_numero, complemento, bairro, id_cidade, CEP);    
    
END $

DELIMITER $$
CREATE PROCEDURE cadastrarListaDeCompra(idCliente mediumInt, idProduto mediumInt, quantidade int)
BEGIN

INSERT INTO tb_lista_compra_cliente VALUES (idCliente, idProduto, quantidade);    
    
END $$


CREATE FUNCTION getListaDeCompra(idCliente mediumInt) RETURNS CHAR(50) DETERMINISTIC
BEGIN

Declare cliente = @idCliente;

Declare listaCliente LIST = SELECT descricao, quantidade FROM tb_lista_compra_cliente INNER JOIN tb_produto ON tb_lista_compra_cliente.id_cliente = tb_produto.id_produto
	WHERE id_cliente = @id_cliente;
    
RETURN listaCliente;
    
END 


CREATE FUNCTION getProduto(nmProduto VARCHAR(50)) RETURNS CHAR(50) DETERMINISTIC
BEGIN
Declare produto varchar(50) = nmProduto;

Declare listaProduto LIST = SELECT descricao FROM tb_produto WHERE descricao ILIKE @produto;
    
RETURN listaProduto;
    
END;


CREATE FUNCTION getSupermercados()
BEGIN

Declare @supermercados LIST = SELECT * FROM tb_supermercados;
    
RETURN @supermercados;

END;

CREATE FUNCTION getPrecos(idCliente mediumInt) RETURNS CHAR(50) DETERMINISTIC
BEGIN

Declare @supermercados = exec getSupermercados();
Declare @resultados ;
Declare vMax int = @supermercados.length();
Declare contador int = 0;

START TRANSACTION; 

	WHILE contador < vMax DO
		@resultados = @resultados + SELECT * FROM tb_produto 
					WHERE id_produto IN (SELECT id_produto FROM tb_produto WHERE id_cliente = idCliente);

		SET contador = contador+1; 
	END WHILE; 

COMMIT; 

END;