<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
    require_once "../../models/VideoModel.php";
    $videoModel = new VideoModel();

    $video = new Video();
    $video->setTitulo($_POST['titulo']);
    $video->setCodigo($_POST['codigo']);

    $rs = $videoModel->add($video);
}

header("location: ../../views/Videos/");
