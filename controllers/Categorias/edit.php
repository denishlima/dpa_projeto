<?php

if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {
    require_once "../../models/CategoriaModel.php";
    $CategoriaModel = new CategoriaModel();

    $categoria = new Categoria();
    $categoria->setId($_POST['id']);
    $categoria->setNome($_POST['categoria']);

    $rs = $CategoriaModel->edit($categoria);
}

header("location: ../../views/Categorias/");
