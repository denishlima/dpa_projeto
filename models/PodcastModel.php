<?php
require_once "Conexao.php";
require_once "Podcast.php";

class PodcastModel
{
    private $db;
    public $tabela = "Podcasts";

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

    public function listById($podcast)
    {
        // pega dados do objeto 
        $id = $podcast->getId();
        // Cria string SQL 
        $sql = "Select * from $this->tabela where id = $id";
        // Executa código SQL 
        $rs = $this->db->executeSQL($sql);
        // Converte dados em obj 
        $obj = $rs->fetch_object();
        $podcast = new podcast();
        $podcast->setId($obj->id);
        $podcast->setTitulo($obj->titulo);
        $podcast->setLink($obj->link);
        // retorna dados 
        return $podcast;
    }

    public function add($podcast)
    {
        // pega dados do objeto 
        $titulo = $podcast->getTitulo();
        $link = $podcast->getLink();
        // Cria string SQL 
        $sql = "insert into $this->tabela (titulo,link) values ('$titulo','$link')";
        // Executa SQL e retorna dados 
        return $this->db->executeSQL($sql);
    }

    public function edit($podcast)
    {
        // pega dados do objeto 
        $id = $podcast->getId();
        $titulo = $podcast->getTitulo();
        $link = $podcast->getLink();
        // Cria string SQL 
        $sql = "Update $this->tabela set titulo = '$titulo', link = '$link' where id = $id";
        // Executa SQL e retorna dados 
        return $this->db->executeSQL($sql);
    }

    public function del($podcast)
    {
        // pega dados do objeto 
        $id = $podcast->getId();
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
            $podcast = new podcast();
            $podcast->setId($obj->id);
            $podcast->setTitulo($obj->titulo);
            $podcast->setLink($obj->link);
            $lista[] = $podcast;
        }
        return $lista;
    }

    private function criarTabela() {
        // Código sql para criação da tabela
        $sql = "
                CREATE TABLE IF NOT EXISTS podcasts (
                id int(11) NOT NULL AUTO_INCREMENT,
                titulo varchar(100) COLLATE utf8_bin NOT NULL,
                link varchar(255) COLLATE utf8_bin NOT NULL,
                PRIMARY KEY (id)
                ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
                ";
        // Executa código no banco de dados
        return $this->db->executeSQL($sql);
    }

}
