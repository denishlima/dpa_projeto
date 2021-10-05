<?php



if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    require_once "../../models/ClienteModel.php";
    $ClienteModel = new ClienteModel();

    $Cliente = new Cliente();
    $Cliente->setId($_POST['id']);
    $Cliente->setNome($_POST['nome']);
    $Cliente->setCpf($_POST['cpf']);
    $Cliente->setEmail($_POST['email']);
    $Cliente->setDataNascimento($_POST['dataNascimento']);
    $Cliente->setSexo($_POST['sexo']);

    $rs = $ClienteModel->edit($Cliente);
}

header("location: ../../views/Clientes/");
