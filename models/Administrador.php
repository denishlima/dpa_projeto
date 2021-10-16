<?php

class Administrador {
    // Como admnistrador do sistema necessito armazenar o nome, e-mail, senha (criptografada com MD5)
    // e data de nascimento dos colaboradores que irão trabalhar em meu sistema.
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $recoveryCode;

    /**
     * @return mixed
     */
    public function getRecoveryCode()
    {
        return $this->recoveryCode;
    }

    /**
     * @param mixed $id
     */
    public function setRecoveryCode($recoveryCode)
    {
        $this->recoveryCode = $recoveryCode;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

}