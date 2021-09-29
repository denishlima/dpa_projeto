<?php
require_once "../../models/ProdutoModel.php";
$ProdutoModel = new ProdutoModel();
$lista = $ProdutoModel->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Produtos</h2>
        <table class="table">
            <tr>
                <th width="10%">ID</th>
                <th width="40%">Produto</th>
                <th width="20%">Categoria</th>
                <th width="10%">Valor</th>
                <th width="10%">QtdEstoque</th>
                <th width="10%">Opções</th>
            </tr>
            <?php foreach ($lista as $cat) { ?>
                <tr>
                <td><?php echo $cat->getId(); ?></td>
                    <td><?php echo $cat->getProduto(); ?></td>
                    <td><?php echo $cat->getCategoria(); ?></td>
                    <td><?php echo $cat->getValor(); ?></td>
                    <td><?php echo $cat->getQtdeEstoque(); ?></td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="editar.php?id=<?php echo $cat->getId(); ?>">Editar</a>
                        <a class="btn btn-danger btn-sm" href="#" onclick="excluir(<?php echo $cat->getId(); ?>)">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="adicionar.php" class="btn btn-success">Adicionar novo produto</a>
    </div>
    <script>
        function excluir(id) {
            if (confirm("Tem certeza que deseja excluir?")) {
                window.location.href = "../../controllers/Produtos/del.php?id=" + id;
            }
        }
    </script>
    <?php include "../includes/js.php"; ?>
</body>

</html>