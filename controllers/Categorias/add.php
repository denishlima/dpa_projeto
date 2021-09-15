<?php

if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {
    require_once "../../models/CategoriaModel.php";
    $CategoriaModel = new CategoriaModel();

    $categoria = new Categoria();
    $categoria->setNome($_POST['categoria']);

    $rs = $CategoriaModel->add($categoria);
}

header("location: ../../views/Categorias/");
