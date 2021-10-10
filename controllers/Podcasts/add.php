<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
    require_once "../../models/PodcastModel.php";
    $PodcastModel = new PodcastModel();

    $podcast = new Podcast();
    $podcast->setTitulo($_POST['titulo']);
    $podcast->setLink($_POST['link']);

    $rs = $PodcastModel->add($podcast);
}

header("location: ../../views/Podcasts/");
