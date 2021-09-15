<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once "../../models/ProdutoModel.php";
    $ProdutoModel = new ProdutoModel();
    $produto = new Produto();
    $produto->setId($_GET['id']);
    $rs = $ProdutoModel->del($produto);
}

header("location: ../../views/Produtos/");