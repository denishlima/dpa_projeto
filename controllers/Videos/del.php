<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once "../../models/VideoModel.php";
    $videoModel = new VideoModel();

    $video = new Video();
    $video->setId($_GET['id']);

    $rs = $videoModel->del($video);
}

header("location: ../../views/Videos/");
