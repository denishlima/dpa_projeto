<?php

if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    require_once "../../models/AdministradorModel.php";
    $administradorModel = new AdministradorModel();

    $administrador = new Administrador();
    $administrador->setNome($_POST['nome']);
    $administrador->setEmail($_POST['email']);
    $administrador->setSenha($_POST['senha']);

    $rs = $administradorModel->add($administrador);
}

header("location: ../../views/Administradores/");
