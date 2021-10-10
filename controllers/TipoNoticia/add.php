<?php

if (isset($_POST['tipo']) && !empty($_POST['tipo'])) {
    require_once "../../models/TipoNoticiaModel.php";
    $TipoModel = new TipoNoticiaModel();
    $tipo = new TipoNoticia();
    $tipo->setTipoNoticia($_POST['tipo']);

    $rs = $TipoModel->add($tipo);
}

header("location: ../../views/TipoNoticia/");
