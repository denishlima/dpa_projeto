<?php

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    require_once "../../models/ClienteModel.php";
    $ClienteModel = new ClienteModel();

    $cliente = new Cliente();
    $cliente->setNome($_POST['nome']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setEmail($_POST['email']);
    $cliente->setDataNascimento($_POST['dataNascimento']);
    $cliente->setSexo($_POST['sexo']);
    
    $rs = $ClienteModel->add($cliente);
}

header("location: ../../views/Clientes/");
