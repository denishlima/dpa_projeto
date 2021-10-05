<?php
require_once "Conexao.php";
require_once "Cliente.php";

class ClienteModel
{
    private $db;
    public $tabela = "clientes";

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

    public function listById($cliente)
    {
        // pega dados do objeto 
        $id = $cliente->getId();
        // Cria string SQL 
        $sql = "Select * from $this->tabela where id = $id";
        // Executa código SQL 
        $rs = $this->db->executeSQL($sql);
        // Converte dados em obj 
        $obj = $rs->fetch_object();
        $cliente = new Cliente();
        $cliente->setId($obj->id);
        $cliente->setNome($obj->nome);
        $cliente->setCpf($obj->cpf);
        $cliente->setEmail($obj->email);
        $cliente->setDataNascimento($obj->dataNascimento);
        $cliente->setSexo($obj->sexo);
        // retorna dados 
        return $cliente;
    }

    public function add($cliente)
    {
        // pega dados do objeto 
        $nome = $cliente->getNome();
        $cpf = $cliente->getCpf();
        $email = $cliente->getEmail();
        $dataNascimento = $cliente->getDataNascimento();
        $sexo = $cliente->getSexo();
        // Cria string SQL 
        $sql = "insert into $this->tabela (nome,cpf,email,dataNascimento,sexo) values ('$nome','$cpf','$email','$dataNascimento','$sexo')";
        // Executa SQL e retorna dados 
        return $this->db->executeSQL($sql);
    }

    public function edit($cliente)
    {
        // pega dados do objeto 
        $id = $cliente->getId();
        $nome = $cliente->getNome();
        $cpf = $cliente->getCpf();
        $email = $cliente->getEmail();
        $dataNascimento = $cliente->getDataNascimento();
        $sexo = $cliente->getSexo();
        // Cria string SQL 
        $sql = "Update $this->tabela set nome = '$nome', cpf = '$cpf', email = '$email', dataNascimento = '$dataNascimento', sexo = '$sexo' where id = $id";
        // Executa SQL e retorna dados 
        return $this->db->executeSQL($sql);
    }

    public function del($cliente)
    {
        // pega dados do objeto 
        $id = $cliente->getId();
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
            $cliente = new Cliente();
            $cliente->setId($obj->id);
            $cliente->setNome($obj->nome);
            $cliente->setCpf($obj->cpf);
            $cliente->setEmail($obj->email);
            $cliente->setDataNascimento($obj->dataNascimento);
            $cliente->setSexo($obj->sexo);
            $lista[] = $cliente;
        }
        return $lista;
    }

    private function criarTabela() {
        // Código sql para criação da tabela
        $sql = "
                CREATE TABLE IF NOT EXISTS clientes (
                id int(11) NOT NULL AUTO_INCREMENT,
                nome varchar(255) COLLATE utf8_bin NOT NULL,
                cpf varchar(255) COLLATE utf8_bin NOT NULL,
                email varchar(255) COLLATE utf8_bin NOT NULL,
                dataNascimento date NOT NULL,
                sexo tinyint(1) NOT NULL,
                PRIMARY KEY (id)
                ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
                ";
        // Executa código no banco de dados
        return $this->db->executeSQL($sql);
    }
}
