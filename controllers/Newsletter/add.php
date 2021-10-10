<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    require_once "../../models/NewsletterModel.php";
    $Newsletter = new Newsletter();
    $NewsletterModel = new NewsletterModel();
    $Newsletter->setNome($_POST['nome']);
    $Newsletter->setEmail($_POST['email']);
    $rs = $NewsletterModel->add($Newsletter);
}

header("location: ../../views/Newsletter/");
