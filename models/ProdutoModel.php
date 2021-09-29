<?php
require_once "Conexao.php";
require_once "Produto.php";

class ProdutoModel
{
    private $db;
    public $tabela = "produtos";

    function __construct()
    {
        $this->db = new Conexao();
        $this->criarTabela();
    }

    public function listar()
    {
        // Cria string SQL 
        $sql = "Select * from $this->tabela";
        // Executa código SQL 
        $rs = $this->db->executeSQL($sql);
        // Converte dados em obj 
        $dados = $this->converteEmObj($rs);
        // retorna dados 
        return $dados;
    }

    public function listById($produto)
    {
        // pega dados do objeto 
        $id = $produto->getId();
        // Cria string SQL 
        $sql = "Select * from $this->tabela where id = $id";
        // Executa código SQL 
        $rs = $this->db->executeSQL($sql);
        // Converte dados em obj 
        $obj = $rs->fetch_object();
        $produto = new Produto();
        $produto->setId($obj->id);
        $produto->setProduto($obj->produto);
        $produto->setDescricao($obj->descricao);
        $produto->setValor($obj->valor);
        $produto->setQtdeEstoque($obj->qtdeEstoque);
        $produto->setCategoria($obj->categoria_id);
        // retorna dados 
        return $produto;
    }

    public function add($produto)
    {
        // pega dados do objeto 
        $nome = $produto->getProduto();
        $descricao = $produto->getDescricao();
        $valor = $produto->getValor();
        $qtdeEstoque = $produto->getQtdeEstoque();
        $categoria = $produto->getCategoria();
        // Cria string SQL 
        $sql = "insert into $this->tabela (produto, descricao, valor, qtdeEstoque, categoria_id) 
                values ('$nome', '$descricao', '$valor', '$qtdeEstoque', '$categoria')";
        // Executa SQL e retorna dados 
        return $this->db->executeSQL($sql);
    }

    public function edit($produto)
    {
        // pega dados do objeto 
        $id = $produto->getId();
        $nome = $produto->getProduto();
        $descricao = $produto->getDescricao();
        $valor = $produto->getValor();
        $qtdeEstoque = $produto->getQtdeEstoque();
        $categoria = $produto->getCategoria();
        // Cria string SQL 
        $sql = "Update $this->tabela set produto = '$nome', descricao = '$descricao', 
        valor = '$valor', qtdeEstoque = '$qtdeEstoque', categoria_id='$categoria' where id = $id";
        // Executa SQL e retorna dados 
        return $this->db->executeSQL($sql);
    }

    public function del($produto)
    {
        // pega dados do objeto 
        $id = $produto->getId();
        // Cria string SQL 
        $sql = "delete from $this->tabela where id = $id";
        // Executa SQL e retorna dados 
        return $this->db->executeSQL($sql);
    }

    public function converteEmObj($rs)
    {
        // Cria vetor 
        $lista = array();
        // Converte resposta da consulta em um objeto e armazena em uma lista 
        while ($obj = $rs->fetch_object()) {
            $produto = new Produto();
            $produto->setId($obj->id);
            $produto->setProduto($obj->produto);
            $produto->setDescricao($obj->descricao);
            $produto->setValor($obj->valor);
            $produto->setQtdeEstoque($obj->qtdeEstoque);
            $lista[] = $produto;
        }
        return $lista;
    }

    private function criarTabela() {
        // Código sql para criação da tabela
        $sql = "
            CREATE TABLE IF NOT EXISTS produtos (
            id INT NOT NULL AUTO_INCREMENT,
            produto VARCHAR(100) NULL,
            descricao TEXT NULL,
            valor DECIMAL(15,2) NULL,
            qtdeEstoque INT NULL,
            categoria_id INT(11) NULL,
            PRIMARY KEY (id),
            CONSTRAINT fk_produtos_categorias
                FOREIGN KEY (categoria_id)
                REFERENCES categorias (id)
                ON DELETE SET NULL
                ON UPDATE NO ACTION)
            ENGINE = InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
          ";
        // Executa código no banco de dados
        return $this->db->executeSQL($sql);
    }

}
