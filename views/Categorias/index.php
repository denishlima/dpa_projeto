<?php
include "../includes/config.php";
require_once "../../models/CategoriaModel.php";
$CategoriaModel = new CategoriaModel();
$lista = $CategoriaModel->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Categorias</h2>
        <table class="table">
            <tr>
                <th width="20%">ID</th>
                <th width="50%">Categoria</th>
                <th width="30%">Opções</th>
            </tr>
            <?php foreach ($lista as $cat) { ?>
                <tr>
                    <td><?php echo $cat->getId(); ?></td>
                    <td><?php echo $cat->getNome(); ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="editar.php?id=<?php echo $cat->getId(); ?>">Editar</a>
                        <a class="btn btn-danger btn-sm" href="#" onclick="excluir(<?php echo $cat->getId(); ?>)">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="adicionar.php" class="btn btn-success">Adicionar nova categoria</a>
    </div>
    <script>
        function excluir(id) {
            if (confirm("Tem certeza que deseja excluir?")) {
                window.location.href = "../../controllers/Categorias/del.php?id=" + id;
            }
        }
    </script>
    <?php include "../includes/js.php"; ?>
</body>

</html>