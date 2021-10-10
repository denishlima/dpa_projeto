<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {
    require_once "../../models/CategoriaModel.php";
    $CategoriaModel = new CategoriaModel();

    $categoria = new Categoria();
    $categoria->setNome($_POST['categoria']);

    $rs = $CategoriaModel->add($categoria);
}

header("location: ../../views/Categorias/");
