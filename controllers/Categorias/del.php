<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once "../../models/CategoriaModel.php";
    $CategoriaModel = new CategoriaModel();

    $categoria = new Categoria();
    $categoria->setId($_GET['id']);

    $rs = $CategoriaModel->del($categoria);
}

header("location: ../../views/Categorias/");
