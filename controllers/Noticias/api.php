<?php
require_once "../../models/NoticiaModel.php";
$NoticiaModel = new NoticiaModel();
$lista = $NoticiaModel->listar();
require_once "../../models/TipoNoticiaModel.php";
header("Content-type: application/json; charset=utf-8");
return json_encode($lista);
