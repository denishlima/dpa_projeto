<?php
include "../includes/config.php";
require_once "../../models/VideoModel.php";
$videoModel = new VideoModel();
$lista = $videoModel->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Videos</h2>
        <table class="table">
            <tr>
                <th width="20%">ID</th>
                <th width="50%">Titulo</th>
                <th width="50%">Link</th>
                <th width="50%">Youtube</th>
                <th width="30%">Opções</th>
            </tr>
            <?php foreach ($lista as $video) { ?>
                <tr>
                    
                    <td><?php echo $video->getId(); ?></td>
                    <td><?php echo $video->getTitulo(); ?></td>
                    <td><a href="<?php echo $video->getLink(); ?>"><?php echo $video->getLink(); ?></a></td>
                    <td><iframe width="640" height="480" src="<?php echo $video->getLink(true) ?>" title="<?php $video->getTitulo(); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="editar.php?id=<?php echo $video->getId(); ?>">Editar</a>
                        <a class="btn btn-danger btn-sm" href="#" onclick="excluir(<?php echo $video->getId(); ?>)">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="adicionar.php" class="btn btn-success">Adicionar novo video</a>
    </div>
    <script>
        function excluir(id) {
            if (confirm("Tem certeza que deseja excluir?")) {
                window.location.href = "../../controllers/Videos/del.php?id=" + id;
            }
        }
    </script>
    <?php include "../includes/js.php"; ?>
</body>

</html>