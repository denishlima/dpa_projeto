<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once "../../models/AdministradorModel.php";
    $videoModel = new AdministradorModel();

    $administrador = new Administrador();
    $administrador->setId($_GET['id']);

    $rs = $videoModel->del($administrador);
}

header("location: ../../views/Administradores/");
