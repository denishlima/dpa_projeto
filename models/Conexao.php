<?php

class Conexao
{
    private $servidor;
    private $user;
    private $pass;
    private $nomeBanco;
    /*** @var mysqli */
    private $banco;

    function __construct($servidor = "localhost", $user = "root", $pass = "", $nomeBanco = "webservice")
    {
        $this->setServidor($servidor);
        $this->setUser($user);
        $this->setPass($pass);
        $this->setNomeBanco($nomeBanco);
    }

    public function conetar()
    {
        $this->banco = new mysqli(
            $this->getServidor(),
            $this->getUser(),
            $this->getPass(),
            $this->getNomeBanco()
        );
        if ($this->banco->connect_error) {
            die("Erro de conexão: " . $this->banco->connect_errno . " - " . $this->banco->connect_error);
        }
        return $this->banco;
    }

    public function desconectar()
    {
        $this->banco->close();
    }

    public function executeSQL($sql, $get_last_id = false)
    {
        // Inicia conexão com banco de dados
        $this->conetar();
        // Executa String SQL e armazena resposta na variável $rs
        $rs = $this->banco->query($sql);
        $rowId = mysqli_insert_id($this->banco);
        // Desconeta do banco de dados
        $this->desconectar();
        // Retorna a responta da consulta para o controlador
        return $get_last_id ? [
            "id" => $rowId,
            "result" => $rs
        ] : $rs;
    }

    /**
     * Get the value of servidor
     */
    public function getServidor()
    {
        return $this->servidor;
    }

    /**
     * Set the value of servidor
     *
     * @return  self
     */
    public function setServidor($servidor)
    {
        $this->servidor = $servidor;

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of pass
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get the value of nomeBanco
     */
    public function getNomeBanco()
    {
        return $this->nomeBanco;
    }

    /**
     * Set the value of nomeBanco
     *
     * @return  self
     */
    public function setNomeBanco($nomeBanco)
    {
        $this->nomeBanco = $nomeBanco;

        return $this;
    }

    /**
     * Get the value of banco
     */
    public function getBanco()
    {
        return $this->banco;
    }

    /**
     * Set the value of banco
     *
     * @return  self
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;

        return $this;
    }
}
