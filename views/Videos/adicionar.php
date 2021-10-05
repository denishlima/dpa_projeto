<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Videos</h2>
        <form action="../../controllers/Videos/add.php" method="post">
            <div class="form-group">
                <label for="idPodcast">Video:</label>
                <div >
                    <label for="idTitulo">Título</label>
                    <input id="idTitulo" class="form-control" type="text" name="titulo" placeholder="Título" required>

                </div>
                <div>
                    <label for="idCodigo">Código</label>
                    <input id="idCodigo" class="form-control" type="text" name="codigo" placeholder="Código" required>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>