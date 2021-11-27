<?php
include "../../views/includes/config.php";
require_once "../../models/ProdutoModel.php";
$ProdutoModel = new ProdutoModel();
$lista = $ProdutoModel->listar();

echo json_encode($lista);
