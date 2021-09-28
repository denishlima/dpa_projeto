<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Podcasts</h2>
        <form action="../../controllers/Podcasts/add.php" method="post">

            <div class="form-group">
                <label for="idPodcast">Podcast:</label>
                <div >
                    <label for="idTitulo">Título</label>
                    <input id="idTitulo" class="form-control" type="text" name="titulo" placeholder="Título" required>

                </div>
                <div>
                    <label for="idLink">Link</label>
                    <input id="idLink" class="form-control" type="url" name="link" placeholder="Link" required>
                </div>
                
                
            </div>
            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>