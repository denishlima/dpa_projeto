<?php

require_once "Conexao.php";
require_once "Administrador.php";

class AdministradorModel
{
    protected $db;
    protected $tabela = "administradores";
    protected $logTable = "log_acesso";

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
        
        $sql = "SELECT * FROM $this->tabela WHERE email = '$email' AND senha = '$senha'";
        $rs = $this->db->executeSQL($sql);
        $dados = $this->converteEmObj($rs);
        if(!empty($dados)) {
            $id = $dados[0]->getId();
            $ip = $_SERVER['REMOTE_ADDR'] == '::1' ? 'localhost' : $_SERVER['REMOTE_ADDR'];
            $date = date('Y-m-d');
            $hora = (new DateTime('now', new DateTimeZone('America/Sao_Paulo')))->format('H:i:s');
            $sql = "INSERT INTO $this->logTable (admin_id, data, hora, ip) VALUES('$id', '$date', '$hora', '$ip')";
            $this->db->executeSQL($sql);
        }
        return $dados;
    }
    
    // Altera senha com base no codigo de recuperação
    public function newPass($administrador){
        $recoveryCode = $administrador->getRecoveryCode();
        $senha = md5($administrador->getSenha());

        $sql = "UPDATE $this->tabela SET senha = '$senha' WHERE recoveryCode = '$recoveryCode'";
        return $this->db->executeSQL($sql);
    }

    //Gera o codigo de recureparação quando solicitado com base no endereço de email
    public function recoveryCode($administrador){
        $email = $administrador->getEmail();
        $bytes = random_bytes(20);
        $recoveryCode = bin2hex($bytes);

        $sql = "UPDATE $this->tabela SET recoveryCode = '$recoveryCode' WHERE email = '$email'";
        $this->db->executeSQL($sql);
        return $recoveryCode;
    }

    /**
     * @var $administrador Administrador
     * */
    public function listById($administrador)
    {
        $id = $administrador->getId();
        $sql = "SELECT * FROM $this->tabela WHERE id = $id";
        $rs = $this->db->executeSQL($sql);
        $rs && $obj = $rs->fetch_object();
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
        while ($rs && $obj = $rs->fetch_object()) {
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
        $sql = array();
        // Executa código no banco de dados
        $sql[] = "
                CREATE TABLE IF NOT EXISTS $this->tabela (
                id int(11) NOT NULL AUTO_INCREMENT,
                nome varchar(100) COLLATE utf8_bin NOT NULL,
                email varchar(255) COLLATE utf8_bin NOT NULL,
                senha TEXT COLLATE utf8_bin NOT NULL,
                PRIMARY KEY (id)
                ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
                ";
        $sql[] = "ALTER TABLE $this->tabela ADD COLUMN IF NOT EXISTS recoveryCode TEXT null;";

        $sql[] = "CREATE TABLE IF NOT EXISTS $this->logTable(
          id INT NOT NULL AUTO_INCREMENT,
          admin_id INT(11) NOT NULL,
          data DATE NOT NULL,
          hora TIME NOT NULL,
          ip TEXT NOT NULL,
          PRIMARY KEY (id),
          INDEX fk_log_admin_idx (admin_id ASC),
          CONSTRAINT fk_log_admin
            FOREIGN KEY (admin_id)
            REFERENCES $this->tabela(id)
            ON DELETE CASCADE
            ON UPDATE CASCADE)
        ENGINE = InnoDB";

        foreach($sql as $consulta) {
            $this->db->executeSQL($consulta);
        }
    }

}
