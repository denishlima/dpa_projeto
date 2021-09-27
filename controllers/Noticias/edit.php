<?php

if (isset($_POST['noticia']) && !empty($_POST['noticia'])) {
    require_once "../../models/NoticiaModel.php";
    $NoticiaModel = new NoticiaModel();
    $Noticias = new Noticias();
    $Noticias->setId($_POST['id']);
    $Noticias->setTitulo($_POST['titulo']);
    $Noticias->setSintese($_POST['sintese']);
    $Noticias->setTexto($_POST['noticia']);
    $rs = $NoticiaModel->edit($Noticias);
}

header("location: ../../views/Noticias/");
