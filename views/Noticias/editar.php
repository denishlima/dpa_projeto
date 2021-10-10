<?php
session_start();

if (!isset($_SESSION['administrador'])) {
    header("location: ../../login.php");
    exit;
}
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    require_once "../../models/NoticiaModel.php";
    $NoticiaModel = new NoticiaModel();

    $noticia = new Noticias();
    $noticia->setId($id);
    $obj = $NoticiaModel->listById($noticia);

    require_once "../../models/TipoNoticiaModel.php";
    $TipoNoticiaModel = new TipoNoticiaModel();
    $lista = $TipoNoticiaModel->listar();
} else {
    header("location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Lista - Editar</h2>
        <form action="../../controllers/Noticias/edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $obj->getId(); ?>"></input>
            <div class="form-group">
                <label for="idTipo">Tipo de Notícia:</label>
                <select id="idTipo" class="form-control" name="tipo" required>
                    <option value="">Selecione</option>
                    <?php foreach ($lista as $t) { ?>
                        <option value="<?php echo $t->getId(); ?>" <?php if ($t->getId() == $obj->getTipoNoticia()) echo "selected"; ?>> <?php echo $t->getTipoNoticia(); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="idTitulo">Titulo</label>
                <input id="idTitulo" class="form-control" name="titulo" rows="" value="<?php echo $obj->getTitulo(); ?>" required></input>
            </div>
            <div class=" form-group">
                <label for="idSintese">sintese</label>
                <input id="idSintese" class="form-control" name="sintese" rows="" value="<?php echo $obj->getSintese(); ?>" required></input>
            </div>

            <div class="form-group">
                <label for="idTexto">Texto</label>
                <input id="idTexto" class="form-control" type="text" name="noticia" value="<?php echo $obj->getTexto(); ?>" rrequired></input>
            </div>
            <div class="form-group">
                <label for="idArquivo">Imagem atual: </label><br>
                <img src="../../uploads/Noticias/<?php echo $obj->getArquivo(); ?>" alt="" width="150px">
            </div>
            <div class="form-group">
                <label for="idArquivo">Imagem: </label><br>
                <input id="idArquivo" class="form-control-file" type="file" name="arquivo">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>