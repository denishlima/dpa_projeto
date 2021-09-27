<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Produtos</h2>
        <form action="../../controllers/Noticias/add.php" method="post">
            <div class="form-group">
                <label for="idTitulo">Titulo</label>
                <input id="idTitulo" class="form-control" name="titulo" rows="" required></input>
            </div>
            <div class="form-group">
                <label for="idSintese">sintese</label>
                <input id="idSintese" class="form-control" name="sintese" rows="" required></input>
            </div>
            <div class="form-group">
                <label for="idTitulo">Data</label>
                <input id="idTitulo" class="form-control" name="hora" rows="" required></input>
            </div>
            <div class="form-group">
                <label for="idHora">Hora</label>
                <input id="idHora" class="form-control" name="hora" rows="" required></input>
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