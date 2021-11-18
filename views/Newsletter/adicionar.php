<?php
include "../includes/config.php";
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
        <form action="../../controllers/Newsletter/add.php" method="post">

            <div class="form-group">
                <label for="idNewsletter">Nome</label>
                <input id="idNewsletter" class="form-control" type="text" name="nome" required>
            </div>
            <div class="form-group">
                <label for="idEmail">E-mail:</label>
                <input id="idEmail" class="form-control" name="email" rows="" required></input>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>