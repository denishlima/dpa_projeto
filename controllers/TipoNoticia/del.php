<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once "../../models/TipoNoticiaModel.php";
    $TipoModel = new TipoNoticiaModel();
    $tipo = new TipoNoticia();
    $tipo->setId($_GET['id']);

    $rs = $TipoModel->del($tipo);
}

header("location: ../../views/TipoNoticia/");
