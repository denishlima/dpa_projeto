<?php
require_once "../../models/ClienteModel.php";
$ClienteModel = new ClienteModel();
$lista = $ClienteModel->listar();
header("Content-type: application/json; charset=utf-8");
return json_encode($lista);
