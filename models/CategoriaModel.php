<?php

require_once "Conexao.php";
require_once "Categoria.php";

class CategoriaModel
{
    private $db;
    public $tabela = "categorias";

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

    public function listById($categoria)
    {
        // pega dados do objeto
        $id = $categoria->getId();
        // Cria string SQL
        $sql = "Select * from $this->tabela where id = $id";
        // Executa código SQL
        $rs = $this->db->executeSQL($sql);
        // Converte dados em obj
        $rs && $obj = $rs->fetch_object();
        $categoria = new Categoria();
        $categoria->setId($obj->id);
        $categoria->setNome($obj->nome);
        // retorna dados
        return $categoria;
    }

    public function add($categoria)
    {
        // pega dados do objeto
        $nome = $categoria->getNome();
        // Cria string SQL
        $sql = "insert into $this->tabela (nome) values ('$nome')";
        // Executa SQL e retorna dados
        return $this->db->executeSQL($sql);
    }

    public function edit($categoria)
    {
        // pega dados do objeto
        $id = $categoria->getId();
        $nome = $categoria->getNome();
        // Cria string SQL
        $sql = "Update $this->tabela set nome = '$nome' where id = $id";
        // Executa SQL e retorna dados
        return $this->db->executeSQL($sql);
    }

    public function del($categoria)
    {
        // pega dados do objeto
        $id = $categoria->getId();
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
        while ($rs && $obj = $rs->fetch_object()) {
            $categoria = new Categoria();
            $categoria->setId($obj->id);
            $categoria->setNome($obj->nome);
            $lista[] = $categoria;
        }
        return $lista;
    }

    private function criarTabela() {
        // Código sql para criação da tabela
        $sql = "
                CREATE TABLE IF NOT EXISTS categorias (
                id int(11) NOT NULL AUTO_INCREMENT,
                nome varchar(100) COLLATE utf8_bin NOT NULL,
                PRIMARY KEY (id)
                ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
                ";
        // Executa código no banco de dados
        return $this->db->executeSQL($sql);
    }
}
