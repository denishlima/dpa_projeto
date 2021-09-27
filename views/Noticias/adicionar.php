<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Notícias</h2>
        <form action="../../controllers/Noticias/add.php" method="post">
            <div class="form-group">
                <label for="idTitulo">Título</label>
                <input id="idTitulo" class="form-control" name="titulo" rows="" required></input>
            </div>
            <div class="form-group">
                <label for="idSintese">Síntese</label>
                <input id="idSintese" class="form-control" name="sintese" rows="" required></input>
            </div>

            <div class="form-group">
                <label for="idTexto">Texto</label>
                <textarea id="idTexto" class="form-control" type="text" name="noticia" required></textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>