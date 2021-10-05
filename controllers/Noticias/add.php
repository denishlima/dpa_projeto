<?php

if (isset($_POST['noticia']) && !empty($_POST['noticia'])) {
    require_once "../../models/NoticiaModel.php";
    $NoticiaModel = new NoticiaModel();
    $Noticias = new Noticias();
    $Noticias->setTitulo($_POST['titulo']);
    $Noticias->setSintese($_POST['sintese']);
    $Noticias->setData($_POST['data']);
    $Noticias->setHora($_POST['hora']);
    $Noticias->setTexto($_POST['noticia']);
    $rs = $NoticiaModel->add($Noticias);
}

header("location: ../../views/Noticias/");
