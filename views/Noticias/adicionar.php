<?php
include "../includes/config.php";

require_once "../../models/TipoNoticiaModel.php";
$TipoNoticiaModel = new TipoNoticiaModel();
$lista = $TipoNoticiaModel->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include "../includes/head.php"; ?>
</head>
<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Notícias</h2>
        <form action="../../controllers/Noticias/add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="example-post">Categoria:</label><br>
                <p id="categories" class="form-control"></p>
            </div>
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
            <div class="form-group">
                <label for="idArquivo">Imagem: </label><br>
                <input id="idArquivo" class="form-control-file" type="file" name="arquivo" required>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
    <script>
        const categories = <?php echo $TipoNoticiaModel->toJsonSelect($lista); ?>;
        VirtualSelect.init({
            ele: '#categories',
            options: categories,
            name: 'categories',
            search: true,
            multiple: true,
        });
    </script>
</body>

</html>