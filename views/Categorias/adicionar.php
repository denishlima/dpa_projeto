<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Categorias</h2>
        <form action="../../controllers/Categorias/add.php" method="post">

            <div class="form-group">
                <label for="idCategoria">Categoria:</label>
                <input id="idCategoria" class="form-control" type="text" name="categoria" required>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>