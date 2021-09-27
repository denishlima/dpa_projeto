<?php

require_once "Conexao.php";
require_once "Newsletter.php";

class NewsletterModel
{
    private $db;
    public $tabela = "Newsletter";

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

    public function listById($newsletter)
    {
        // pega dados do objeto
        $id = $newsletter->getId();
        // Cria string SQL
        $sql = "Select * from $this->tabela where id = $id";
        // Executa código SQL
        $rs = $this->db->executeSQL($sql);
        // Converte dados em obj
        $obj = $rs->fetch_object();
        $newsletter = new Newsletter();
        $newsletter->setId($obj->id);
        $newsletter->setNome($obj->nome);
        $newsletter->setEmail($obj->email);

        // retorna dados
        return $newsletter;
    }

    public function add($newsletter)
    {
        // pega dados do objeto
        $email = $newsletter->getEmail();
        $nome = $newsletter->getNome();
        $sql = "INSERT INTO $this->tabela (nome, email) VALUES('$email', '$nome')";
        // Cria string SQL
        // Executa SQL e retorna dados
        return $this->db->executeSQL($sql);
    }

    public function edit($newsletter)
    {
        // pega dados do objeto
        $id = $newsletter->getId();
        $email = $newsletter->getEmail();
        $nome = $newsletter->getNome();
        // Cria string SQL
        // $sql = "Update $this->tabela set nome = '$nome' where id = $id";
        // Executa SQL e retorna dados
        $sql = "UPDATE  Newsletter set nome = '$nome', email = '$email' WHERE id = '$id'";
        return $this->db->executeSQL($sql);
    }

    public function del($newsletter)
    {
        // pega dados do objeto
        $id = $newsletter->getId();
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
            $newsletter = new Newsletter();
            $newsletter->setId($obj->id);
            $newsletter->setNome($obj->nome);
            $newsletter->setEmail($obj->email);

            $lista[] = $newsletter;
        }


        return $lista;
    }

    private function criarTabela()
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS Newsletter (
            id int(11) NOT NULL  AUTO_INCREMENT,
            nome varchar(45) NOT NULL,
            email varchar(45)  NOT NULL,
            PRIMARY KEY (id)
          )
        ";
        return $this->db->executeSQL($sql);
    }
}
