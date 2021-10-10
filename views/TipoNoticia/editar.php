<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    require_once "../../models/TipoNoticiaModel.php";
    $TipoNoticiaModel = new TipoNoticiaModel();

    $tipo = new TipoNoticia();
    $tipo->setId($id);
    $obj = $TipoNoticiaModel->listById($tipo);
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
        <form action="../../controllers/TipoNoticia/edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $obj->getId(); ?>"></input>
            <div class="form-group">
                <label for="idTipo">Tipo de Notícia</label>
                <input id="idTipo" class="form-control" name="tipo" rows="" value="<?php echo $obj->getTipoNoticia(); ?>" required></input>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>