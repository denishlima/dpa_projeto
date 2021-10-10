<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_POST['tipo']) && !empty($_POST['tipo'])) {
    require_once "../../models/TipoNoticiaModel.php";
    $TipoModel = new TipoNoticiaModel();
    $tipo = new TipoNoticia();
    $tipo->setTipoNoticia($_POST['tipo']);
    $tipo->setId($_POST['id']);

    $rs = $TipoModel->edit($tipo);
}

header("location: ../../views/TipoNoticia/");
