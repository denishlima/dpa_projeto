<?php
require_once "../../models/NoticiaModel.php";
$NoticiaModel = new NoticiaModel();
$lista = $NoticiaModel->listar();


require_once "../../models/TipoNoticiaModel.php";
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
        <table class="table">
            <tr>
                <th width="5%">ID</th>
                <th width="10%">Titulo</th>
                <th width="10%">Tipo Notícia</th>
                <th width="10%">Sintese</th>
                <th width="10%">Data</th>
                <th width="10%">Hora</th>
                <th width="10%">Texto</th>
                <th width="10%">Opções</th>

            </tr>
            <?php foreach ($lista as $cat) { ?>
                <tr>
                    <td><?php echo $cat->getId(); ?></td>
                    <td><?php echo $cat->getTitulo(); ?></td>
                    <td><?php echo $cat->getTipoNoticia() ?></td>
                    <td><?php echo $cat->getSintese(); ?></td>
                    <td><?php echo $cat->getData(); ?></td>
                    <td><?php echo $cat->getHora(); ?></td>
                    <td><?php echo $cat->getTexto(); ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="editar.php?id=<?php echo $cat->getId(); ?>">Editar</a>
                        <a class="btn btn-danger btn-sm" href="#" onclick="excluir(<?php echo $cat->getId(); ?>)">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="adicionar.php" class="btn btn-success">Adicionar</a>
    </div>
    <script>
        function excluir(id) {
            if (confirm("Tem certeza que deseja excluir?")) {
                window.location.href = "../../controllers/Noticias/del.php?id=" + id;
            }
        }
    </script>
    <?php include "../includes/js.php"; ?>
</body>

</html>