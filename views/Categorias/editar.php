<?php
include "../includes/config.php";
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    require_once "../../models/CategoriaModel.php";
    $CategoriaModel = new CategoriaModel();

    $categoria = new Categoria();
    $categoria->setId($id);

    $obj = $CategoriaModel->listById($categoria);
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
        <h2>Categorias - Editar</h2>
        <form action="../../controllers/Categorias/edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $obj->getId(); ?>">
            <div class="form-group">
                <label for="idCategoria">Categoria:</label>
                <input id="idCategoria" class="form-control" type="text" name="categoria" required value="<?php echo $obj->getNome(); ?>">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>