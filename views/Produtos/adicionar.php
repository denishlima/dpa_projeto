<?php 
# Requisita a classe
require_once "../../models/CategoriaModel.php";
# Gera instância da classe
$CategoriaModel = new CategoriaModel();
# Buscar todas as categorias
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
        <h2>Produtos</h2>
        <form action="../../controllers/Produtos/add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="idCategoria">Categoria:</label>
                <select id="idCategoria" class="form-control" name="categoria" required>
                    <option value="">Selecione</option>
                    <?php foreach ($lista as $cat) { ?>
                        <option value="<?php echo $cat->getId(); ?>"><?php echo $cat->getNome(); ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="idProduto">Produto:</label>
                <input id="idProduto" class="form-control" type="text" name="produto" required>
            </div>
            <div class="form-group">
                <label for="idDescricao">Descrição:</label>
                <textarea id="idDescricao" class="form-control" name="descricao" rows="" required></textarea>
            </div>
            <div class="form-group">
                <label for="idValor">Valor:</label>
                <input id="idValor" class="form-control" type="number" name="valor" required>
            </div>
            <div class="form-group">
                <label for="idQtdeEstoque">Quantidade em estoque:</label>
                <input id="idQtdeEstoque" class="form-control" type="number" name="qtdeEstoque" required>
            </div>
            <div class="form-group">
                <label for="idArquivo">Imagem: </label><br>
                <input id="idArquivo" class="form-control-file" type="file" name="arquivo">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>