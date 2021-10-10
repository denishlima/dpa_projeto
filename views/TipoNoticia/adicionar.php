<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Notícias</h2>
        <form action="../../controllers/TipoNoticia/add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="idTipo">Tipo de Notícia</label>
                <input id="idTipo" class="form-control" name="tipo" rows="" required></input>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>