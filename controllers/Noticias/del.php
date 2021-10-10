<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once "../../models/NoticiaModel.php";
    $NoticiaModel = new NoticiaModel();
    $Noticias = new Noticias();

    $Noticias->setId($_GET['id']);

    $rs = $NoticiaModel->del($Noticias);
}

header("location: ../../views/Noticias/");
