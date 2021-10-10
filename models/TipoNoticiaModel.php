<?php

require_once "Conexao.php";
require_once "TipoNoticia.php";

class TipoNoticiaModel
{
    private $db;
    public $tabela = "tipoNoticia";

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

    public function listById($tipoNoticia)
    {
        // pega dados do objeto
        $id = $tipoNoticia->getId();
        // Cria string SQL
        $sql = "Select * from $this->tabela where id = '$id'";
        // Executa código SQL
        $rs = $this->db->executeSQL($sql);
        // Converte dados em obj
        $obj = $rs->fetch_object();
        $tipoNoticia = new TipoNoticia();
        $tipoNoticia->setId($obj->id);
        $tipoNoticia->setTipoNoticia($obj->tipo);

        // retorna dados
        return $tipoNoticia;
    }

    public function add($tipoNoticia)
    {
        // pega dados do objeto
        $tipo = $tipoNoticia->getTipoNoticia();
        // Cria string SQL
        $sql = "INSERT INTO $this->tabela (tipo) values ('$tipo');";
        // Executa SQL e retorna dados
        return $this->db->executeSQL($sql);
    }

    public function edit($tipoNoticia)
    {
        $id = $tipoNoticia->getId();
        $tipo = $tipoNoticia->getTipoNoticia();

        // Cria string SQL
        $sql = "UPDATE $this->tabela set tipo = '$tipo' WHERE id = $id";
        // Executa SQL e retorna dados

        return $this->db->executeSQL($sql);
    }


    public function del($tipoNoticia)
    {

        // pega dados do objeto
        $id = $tipoNoticia->getId();
        // Cria string SQL

        $sql = "DELETE from $this->tabela where id = $id";
        // Executa SQL e retorna dados
        // return $this->db->executeSQL($sql);
        return $this->db->executeSQL($sql);
    }

    public function converteEmObj($rs)
    {
        // Cria vetor
        $lista = array();
        // Converte resposta da consulta em um objeto e armazena em uma lista
        while ($obj = $rs->fetch_object()) {
            $tipoNoticia = new TipoNoticia();
            $tipoNoticia->setId($obj->id);
            $tipoNoticia->setTipoNoticia($obj->tipo);


            $lista[] = $tipoNoticia;
        }
        return $lista;
    }


    private function criarTabela()
    {
        $sql = "
        CREATE TABLE IF NOT EXISTS tipoNoticia (
            id int(11) NOT NULL AUTO_INCREMENT, 
            tipo VARCHAR(45), 
            PRIMARY KEY (id)
        )
        ";
        $this->db->executeSQL($sql);
    }
}
