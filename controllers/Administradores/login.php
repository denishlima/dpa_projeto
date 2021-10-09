<?php
session_start();
if (isset($_POST['email']) && !empty($_POST['email'])) {
    require_once "../../models/AdministradorModel.php";
    $administradorModel = new AdministradorModel();

    $administrador = new Administrador();
    $administrador->setEmail($_POST['email']);
    $administrador->setSenha($_POST['senha']);
    $rs = $administradorModel->login($administrador);
    if (empty($rs)) {
        header("location: ../../login.php?result=0");
    } else {
        session_start();
        $_SESSION["administrador"] = serialize($rs[0]);
        header("location: ../../views/home/index.php?result=1");
    }
}
