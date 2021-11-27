<?php
include "../../views/includes/config.php";

require_once "../../models/NoticiaModel.php";
$NoticiaModel = new NoticiaModel();
$lista = $NoticiaModel->listar();
require_once "../../models/TipoNoticiaModel.php";
echo json_encode($lista);
