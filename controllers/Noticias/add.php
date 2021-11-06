<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_POST['noticia']) && !empty($_POST['noticia'] && !empty($_POST['categories']))) {
    require_once "../../models/NoticiaModel.php";
    $NoticiaModel = new NoticiaModel();
    $Noticias = new Noticias();
    $Noticias->setTitulo($_POST['titulo']);
    $Noticias->setSintese($_POST['sintese']);
    $Noticias->setTexto($_POST['noticia']);
    $Noticias->setTipoNoticia($_POST['categories']);
    $rs = $NoticiaModel->add($Noticias);

    if (!empty($_FILES['arquivo'])) {
        // Somente no adicionar, necessitamos do $id dos dados adicionados anteriormente.
        $not = $NoticiaModel->insertId();

        // Faz a requisição da classe de Upload
        require_once "../../models/Upload.php";
        // Cria uma instância da classe de Upload
        $Upload = new Upload();

        //define as extensões permitidas para upload
        $Upload->setAllowedExtensions(['png', 'jpg', 'jpeg']);
        //falamos aqui para a classe dar um nome aleatório para o nosso novo arquivo enviado (TRUE ou FALSE)
        $Upload->setRandomName(TRUE);
        //definimos o tamanho máximo que o arquivo pode ser enviado. Aqui definimos 5mb
        $Upload->setMaxSize(5);
        /*definimos aqui a pasta onde os arquivos enviados ficarão ou serão enviados, caso as pastas não existam, você tem que criar */
        $Upload->setUploadDir('../../uploads/Noticias/');
        /*chamamos a função que faz o upload do arquivo, se o upload ocorreu 
        corretamente a variável $arquivo recebe o nome do arquivo que foi movido para a pasta */
        $arquivo = $Upload->uploadFile($_FILES['arquivo']);
        $not->setArquivo($arquivo);

        if ($arquivo != "") {
            $NoticiaModel->edit_file($not);
        }
    }
}

header("location: ../../views/Noticias/");
