<?php

if (isset($_POST['produto']) && !empty($_POST['produto'])) {
    require_once "../../models/ProdutoModel.php";
    $ProdutoModel = new ProdutoModel();
    $produto = new Produto();
    $produto->setProduto($_POST['produto']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setValor($_POST['valor']);
    $produto->setQtdeEstoque($_POST['qtdeEstoque']);
    $produto->setCategoria($_POST['categoria']);
    $rs = $ProdutoModel->add($produto);

    if (!empty($_FILES['arquivo'])) {
        // Somente no adicionar, necessitamos do $id dos dados adicionados anteriormente.
        $produto = $ProdutoModel->insertId();
    
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
        $Upload->setUploadDir('../../uploads/Produtos/');
        /*chamamos a função que faz o upload do arquivo, se o upload ocorreu 
        corretamente a variável $arquivo recebe o nome do arquivo que foi movido para a pasta */
        $arquivo = $Upload->uploadFile($_FILES['arquivo']);
        $produto->setArquivo($arquivo);
    
        if ($arquivo != "") {
            $ProdutoModel->edit_file($produto);
        }
    }


}

header("location: ../../views/Produtos/");