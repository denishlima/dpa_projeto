<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    require_once "../../models/VideoModel.php";
    $videoModel = new VideoModel();

    $video = new Video();
    $video->setId($id);

    $obj = $videoModel->listById($video);
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
        <h2>Videos - Editar</h2>
        <form action="../../controllers/Videos/edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $obj->getId(); ?>">
            <div class="form-group">
                <label for="idPodcast">Video:</label>
                <div >
                    <label for="idTitulo">Título</label>
                    <input id="idTitulo" class="form-control" type="text" name="titulo" placeholder="Título" required value="<?php echo $obj->getTitulo(); ?>">
                </div>
                <div>
                    <label for="idLink">Link</label>
                    <input id="idLink" class="form-control" type="text" name="codigo" placeholder="Código do video" required value="<?php echo $obj->getCodigo(); ?>">
                </div>
    
            </div>
            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>