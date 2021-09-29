<?php

if (isset($_POST['produto']) && !empty($_POST['produto'])) {
    require_once "../../models/ProdutoModel.php";
    $ProdutoModel = new ProdutoModel();
    $Produto = new Produto();
    $Produto->setProduto($_POST['produto']);
    $Produto->setDescricao($_POST['descricao']);
    $Produto->setValor($_POST['valor']);
    $Produto->setQtdeEstoque($_POST['qtdeEstoque']);
    $Produto->setCategoria($_POST['categoria']);
    $rs = $ProdutoModel->add($Produto);
}

header("location: ../../views/Produtos/");