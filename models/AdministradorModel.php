<?php

require_once "Conexao.php";
require_once "Administrador.php";

class AdministradorModel
{
    protected $db;
    protected $tabela = "administradores";

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

    public function login($administrador){
        $email = $administrador->getEmail();
        $senha = md5($administrador->getSenha());
        
        $sql = "SELECT * FROM $this->tabela WHERE email = 
        '$email' AND senha = '$senha'";
        $rs = $this->db->executeSQL($sql);
        $dados = $this->converteEmObj($rs);
        return $dados;
    }

    /**
     * @var $administrador Administrador
     * */
    public function listById($administrador)
    {
        $id = $administrador->getId();
        $sql = "SELECT * FROM $this->tabela WHERE id = $id";
        $rs = $this->db->executeSQL($sql);
        $obj = $rs->fetch_object();
        $result = new Administrador();
        $result->setId($obj->id);
        $result->setNome($obj->nome);
        $result->setEmail($obj->email);
        $result->setSenha($obj->senha);
        return $result;
    }

    public function del($model) {
        $id = $model->getId();
        $sql = "DELETE FROM $this->tabela WHERE id = $id";
        return $this->db->executeSQL($sql);
    }

    /**
     * @var $administrador Administrador
     * */
    public function add($administrador)
    {
        $nome = $administrador->getNome();
        $email = $administrador->getEmail();
        $senha = md5($administrador->getSenha());
        $sql = "INSERT INTO $this->tabela (nome,email, senha) VALUES ('$nome','$email','$senha')";
        return $this->db->executeSQL($sql);
    }

    /**
     * @var $administrador Administrador
     * */
    public function edit($administrador)
    {
        $id = $administrador->getId();
        $nome = $administrador->getNome();
        $email = $administrador->getEmail();
        $senha = md5($administrador->getSenha());
        $sql = "UPDATE $this->tabela SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = $id";
        return $this->db->executeSQL($sql);
    }

    public function converteEmObj($rs)
    {
        $lista = [];
        if($rs == false) return $lista;
        while ($obj = $rs->fetch_object()) {
            $administrador = new Administrador();
            $administrador->setId($obj->id);
            $administrador->setNome($obj->nome);
            $administrador->setEmail($obj->email);
            $administrador->setSenha($obj->senha);
            $lista[] = $administrador;
        }
        return $lista;
    }

    public function criarTabela() {
        $sql = "
                CREATE TABLE IF NOT EXISTS $this->tabela (
                id int(11) NOT NULL AUTO_INCREMENT,
                nome varchar(100) COLLATE utf8_bin NOT NULL,
                email varchar(255) COLLATE utf8_bin NOT NULL,
                senha TEXT COLLATE utf8_bin NOT NULL,
                PRIMARY KEY (id)
                ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
                ";
        return $this->db->executeSQL($sql);
    }

}
