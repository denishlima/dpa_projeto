<?php
if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    require_once "../../models/NewsletterModel.php";
    $Newsletter = new Newsletter();
    $NewsletterModel = new NewsletterModel();
    $Newsletter->setId($_POST['id']);
    $Newsletter->setNome($_POST['nome']);
    $Newsletter->setEmail($_POST['email']);
    $rs = $NewsletterModel->edit($Newsletter);
}

header("location: ../../views/Newsletter/");
