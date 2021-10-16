<?php
if (isset($_POST['email']) && !empty($_POST['email'])) {
    require_once "../../models/AdministradorModel.php";
    $administradorModel = new AdministradorModel();

    $administrador = new Administrador();
    $administrador->setEmail($_POST['email']);

    $rs = $administradorModel->recoveryCode($administrador);
}

header("location: ../../views/Administradores/changePassword.php?recoveryCode=".$rs);
