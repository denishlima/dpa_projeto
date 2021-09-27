<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    require_once "../../models/NoticiaModel.php";
    $NoticiaModel = new NoticiaModel();

    $noticia = new Noticias();
    $noticia->setId($id);
    $obj = $NoticiaModel->listById($noticia);
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
        <form action="../../controllers/Noticias/edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $obj->getId(); ?>"></input>
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

            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>