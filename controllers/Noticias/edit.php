<?php

if (isset($_POST['noticia']) && !empty($_POST['noticia'])) {
    require_once "../../models/NoticiaModel.php";
    $NoticiaModel = new NoticiaModel();
    $Noticias = new Noticias();
    $Noticias->setId($_POST['id']);
    $Noticias->setTitulo($_POST['titulo']);
    $Noticias->setSintese($_POST['sintese']);
    $Noticias->setTexto($_POST['noticia']);
    $Noticias->setTipoNoticia(($_POST['tipo']));
    $rs = $NoticiaModel->edit($Noticias);

    if (!empty($_FILES['arquivo'])) {

        // Faz a requisição da classe de Upload
        require_once "../../models/Upload.php";
        // Cria uma instância da classe de Upload
        $Upload = new Upload();

        //define as extensões permitidas para upload
        $Upload->setAllowedExtensions(array('png', 'jpg', 'jpeg'));
        //falamos aqui para a classe dar um nome aleatório para o nosso novo arquivo enviado (TRUE ou FALSE)
        $Upload->setRandomName(TRUE);
        //definimos o tamanho máximo que o arquivo pode ser enviado. Aqui definimos 5mb
        $Upload->setMaxSize(5);
        /*definimos aqui a pasta onde os arquivos enviados ficarão ou serão enviados, caso as pastas não existam, você tem que criar */
        $Upload->setUploadDir('../../uploads/Noticias');
        /*chamamos a função que faz o upload do arquivo, se o upload ocorreu 
        corretamente a variável $arquivo recebe o nome do arquivo que foi movido para a pasta */
        $arquivo = $Upload->uploadFile($_FILES['arquivo']);
        $Noticias->setArquivo($arquivo);

        if ($arquivo != "") {
            $NoticiaModel->edit_file($Noticias);
        }
    }
}

header("location: ../../views/Noticias/");
