<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once "../../models/ClienteModel.php";
    $ClienteModel = new ClienteModel();

    $Cliente = new Cliente();
    $Cliente->setId($_GET['id']);

    $rs = $ClienteModel->del($Cliente);
}

header("location: ../../views/Clientes/");
