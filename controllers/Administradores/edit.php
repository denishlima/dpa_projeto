<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    require_once "../../models/AdministradorModel.php";
    $administradorModel = new AdministradorModel();

    $administrador = new Administrador();
    $administrador->setId($_POST['id']);
    $administrador->setNome($_POST['nome']);
    $administrador->setEmail($_POST['email']);
    $administrador->setSenha($_POST['senha']);

    $rs = $administradorModel->edit($administrador);
}

header("location: ../../views/Administradores/");
