<?php
if (isset($_POST['recoveryCode']) && !empty($_POST['recoveryCode'])) {
    require_once "../../models/AdministradorModel.php";
    $administradorModel = new AdministradorModel();

    $administrador = new Administrador();
    $administrador->setRecoveryCode($_POST['recoveryCode']);
    $administrador->setSenha($_POST['senha']);

    $rs = $administradorModel->newPass($administrador);
}

header("location: ../../views/Administradores/");
