<?php

require_once "Conexao.php";
require_once "Noticias.php";

class NoticiaModel
{
    private $db;
    public $tabela = "Noticias";

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

    public function listById($noticia)
    {
        // pega dados do objeto
        $id = $noticia->getId();
        // Cria string SQL
        $sql = "Select * from $this->tabela where id = '$id'";
        // Executa código SQL
        $rs = $this->db->executeSQL($sql);
        // Converte dados em obj
        $obj = $rs->fetch_object();
        $noticias = new Noticias();
        $noticias->setId($obj->id);
        $noticias->setTitulo($obj->titulo);
        $noticias->setData($obj->data);
        $noticias->setHora($obj->hora);
        $noticias->setSintese($obj->sintese);
        $noticias->setTexto($obj->texto);
        $noticias->setArquivo($obj->arquivo);
        // retorna dados
        return $noticias;
    }

    public function add($noticias)
    {
        // pega dados do objeto
        $titulo = $noticias->getTitulo();
        $sintese = $noticias->getSintese();
        // $data = $noticias->getData();
        // $hora = $noticias->getHora();
        $texto = $noticias->getTexto();

        // Cria string SQL
        $sql = "INSERT INTO $this->tabela (titulo, data, hora, sintese, texto) 
                values ('$titulo', CURDATE(), CURTIME(),  '$sintese',  '$texto');";
        // Executa SQL e retorna dados
        return $this->db->executeSQL($sql);
    }

    public function edit($noticias)
    {
        //var_dump($noticias);
        // pega dados do objeto
        $id = $noticias->getId();
        $titulo = $noticias->getTitulo();
        $sintese = $noticias->getSintese();
        $texto = $noticias->getTexto();

        // Cria string SQL
        // $sql = "Update $this->tabela set nome = '$nome' where id = $id";
        $sql = "UPDATE $this->tabela set 
                titulo = '$titulo', sintese = '$sintese', texto = '$texto' WHERE id = $id";
        // Executa SQL e retorna dados

        return $this->db->executeSQL($sql);
    }
    public function edit_file($noticias)
    {
        // pega dados do objeto 
        $id = $noticias->getId();
        $arquivo = $noticias->getArquivo();
        // Cria string SQL 
        $sql = "Update $this->tabela set arquivo = '$arquivo' where id = $id";
        // Executa SQL e retorna dados 
        return $this->db->executeSQL($sql);
    }

    public function del($noticias)
    {

        // pega dados do objeto
        $id = $noticias->getId();
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
            $noticias = new Noticias();
            $noticias->setId($obj->id);
            $noticias->setTitulo($obj->titulo);
            $noticias->setData($obj->data);
            $noticias->setHora($obj->hora);
            $noticias->setSintese($obj->sintese);

            $noticias->setTexto($obj->texto);

            $lista[] = $noticias;
        }
        return $lista;
    }

    public function insertId()
    {
        // Cria string SQL
        $sql = "select max(id) as id from $this->tabela";
        // Executa SQL e retorna dados
        $rs = $this->db->executeSQL($sql);
        // retorna último ID inserido na tabela
        // Converte dados em obj 
        $obj = $rs->fetch_object();
        $noticias = new Noticias();
        $noticias->setId($obj->id);
        return $noticias;
    }
    private function criarTabela()
    {
        $sql = array();
        $sql[] = "
        CREATE TABLE IF NOT EXISTS Noticias  (
            id int NOT NULL AUTO_INCREMENT ,
            titulo varchar(45)   NOT NULL,
            sintese TEXT NULL,
            data date NOT NULL,
            hora timestamp NOT NULL ,
            texto  TEXT NULL,
            PRIMARY KEY (id)
          ) 
        ";
        $sql[] = "ALTER TABLE $this->tabela ADD COLUMN IF NOT EXISTS arquivo VARCHAR(40) null;";
        // Executa código no banco de dados
        foreach ($sql as $consulta) {
            $this->db->executeSQL($consulta);
        }
    }
}
