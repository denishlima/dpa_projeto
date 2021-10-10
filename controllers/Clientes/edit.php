<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../login.php");
    exit;
}


if (isset($_POST['nome']) && !empty($_POST['nome'])) {
    require_once "../../models/ClienteModel.php";
    $ClienteModel = new ClienteModel();

    $Cliente = new Cliente();
    $Cliente->setId($_POST['id']);
    $Cliente->setNome($_POST['nome']);
    $Cliente->setCpf($_POST['cpf']);
    $Cliente->setEmail($_POST['email']);
    $Cliente->setDataNascimento($_POST['dataNascimento']);
    $Cliente->setSexo($_POST['sexo']);

    $rs = $ClienteModel->edit($Cliente);

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
        $Upload->setUploadDir('../../uploads/Clientes/');
        /*chamamos a função que faz o upload do arquivo, se o upload ocorreu 
        corretamente a variável $arquivo recebe o nome do arquivo que foi movido para a pasta */
        $arquivo = $Upload->uploadFile($_FILES['arquivo']);
        $Cliente->setArquivo($arquivo);

        if ($arquivo != "") {
            $ClienteModel->edit_file($Cliente);
        }
    }
}
header("location: ../../views/Clientes/");
