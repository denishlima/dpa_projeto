<?php
require_once "../../models/ProdutoModel.php";
$ProdutoModel = new ProdutoModel();
$lista = $ProdutoModel->listar();

header("Content-type: application/json; charset=utf-8");

return json_encode($lista);
