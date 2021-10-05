<?php

require_once "Conexao.php";
require_once "Video.php";

class VideoModel
{
    protected $db;
    protected $tabela = "videos";

    public function __construct()
    {
        $this->db = new Conexao();
        $this->criarTabela();
    }

    public function listar()
    {
        $sql = "Select * FROM $this->tabela";
        $rs = $this->db->executeSQL($sql);
        $dados = $this->converteEmObj($rs);
        return $dados;
    }

    /**
     * @var $video Video
     * */
    public function listById($video)
    {
        $id = $video->getId();
        $sql = "SELECT * FROM $this->tabela WHERE id = $id";
        $rs = $this->db->executeSQL($sql);
        $obj = $rs->fetch_object();
        $result = new Video();
        $result->setId($obj->id);
        $result->setTitulo($obj->titulo);
        $result->setCodigo($obj->codigo);
        return $result;
    }

    public function del($model) {
        $id = $model->getId();
        $sql = "DELETE FROM $this->tabela WHERE id = $id";
        return $this->db->executeSQL($sql);
    }

    /**
     * @var $video Video
     * */
    public function add($video)
    {
        $titulo = $video->getTitulo();
        $codigo = $video->getCodigo();
        $sql = "INSERT INTO $this->tabela (titulo,codigo) VALUES ('$titulo','$codigo')";
        return $this->db->executeSQL($sql);
    }

    /**
     * @var $video Video
     * */
    public function edit($video)
    {
        $id = $video->getId();
        $titulo = $video->getTitulo();
        $codigo = $video->getCodigo();
        $sql = "UPDATE $this->tabela SET titulo = '$titulo', codigo = '$codigo' WHERE id = $id";
        return $this->db->executeSQL($sql);
    }

    public function converteEmObj($rs)
    {
        $lista = [];
        while ($obj = $rs->fetch_object()) {
            $video = new Video();
            $video->setId($obj->id);
            $video->setTitulo($obj->titulo);
            $video->setCodigo($obj->codigo);
            $lista[] = $video;
        }
        return $lista;
    }

    public function criarTabela() {
        $sql = "
                CREATE TABLE IF NOT EXISTS videos (
                id int(11) NOT NULL AUTO_INCREMENT,
                titulo varchar(100) COLLATE utf8_bin NOT NULL,
                codigo varchar(255) COLLATE utf8_bin NOT NULL,
                PRIMARY KEY (id)
                ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
                ";
        return $this->db->executeSQL($sql);
    }

}
