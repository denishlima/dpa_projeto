<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once "../../models/PodcastModel.php";
    $PodcastModel = new PodcastModel();

    $Podcast = new Podcast();
    $Podcast->setId($_GET['id']);

    $rs = $PodcastModel->del($Podcast);
}

header("location: ../../views/Podcasts/");
