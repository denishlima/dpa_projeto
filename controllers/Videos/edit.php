<?php

if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
    require_once "../../models/VideoModel.php";
    $videoModel = new VideoModel();

    $video = new Video();
    $video->setId($_POST['id']);
    $video->setTitulo($_POST['titulo']);
    $video->setCodigo($_POST['codigo']);

    $rs = $videoModel->edit($video);
}

header("location: ../../views/Videos/");
