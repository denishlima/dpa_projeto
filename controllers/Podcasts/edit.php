<?php

if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
    require_once "../../models/PodcastModel.php";
    $PodcastModel = new PodcastModel();

    $Podcast = new Podcast();
    $Podcast->setId($_POST['id']);
    $Podcast->setTitulo($_POST['titulo']);
    $Podcast->setLink($_POST['link']);

    $rs = $PodcastModel->edit($Podcast);
}

header("location: ../../views/Podcasts/");
