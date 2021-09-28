<?php
require_once "../../models/PodcastModel.php";
$PodcastModel = new PodcastModel();
$lista = $PodcastModel->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Podcasts</h2>
        <table class="table">
            <tr>
                <th width="20%">ID</th>
                <th width="50%">Titulo</th>
                <th width="50%">Link</th>
                <th width="50%">Spotify</th>
                <th width="30%">Opções</th>
            </tr>
            <?php foreach ($lista as $cat) { ?>
                <tr>
                    
                    <td><?php echo $cat->getId(); ?></td>
                    <td><?php echo $cat->getTitulo(); ?></td>
                    <td><a href="<?php echo $cat->getLink(); ?>"><?php echo $cat->getLink(); ?></a></td>
                    <td><iframe src="https://open.spotify.com/embed/<?php echo parse_url($cat->getLink(), PHP_URL_PATH) ; ?>" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="editar.php?id=<?php echo $cat->getId(); ?>">Editar</a>
                        <a class="btn btn-danger btn-sm" href="#" onclick="excluir(<?php echo $cat->getId(); ?>)">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="adicionar.php" class="btn btn-success">Adicionar nova Podcast</a>
    </div>
    <script>
        function excluir(id) {
            if (confirm("Tem certeza que deseja excluir?")) {
                window.location.href = "../../controllers/Podcasts/del.php?id=" + id;
            }
        }
    </script>
    <?php include "../includes/js.php"; ?>
</body>

</html>