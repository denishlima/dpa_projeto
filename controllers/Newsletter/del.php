<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once "../../models/NewsletterModel.php";
    $Newsletter = new Newsletter();
    $NewsletterModel = new NewsletterModel();
    $Newsletter->setId($_GET['id']);
    $rs = $NewsletterModel->del($Newsletter);
}

header("location: ../../views/Newsletter/");
