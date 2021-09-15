<?php
if (isset($_POST['produto']) && !empty($_POST['produto'])) {
    require_once "../../models/ProdutoModel.php";
    $ProdutoModel = new ProdutoModel();
    $produto = new Produto();
    $produto->setId($_POST['id']);
    $produto->setProduto($_POST['produto']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setValor($_POST['valor']);
    $produto->setQtdeEstoque($_POST['qtdeEstoque']);
    $rs = $ProdutoModel->edit($produto);
}
header("location: ../../views/Produtos/");
