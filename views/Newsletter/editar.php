<?php
include "../includes/config.php";
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    require_once "../../models/NewsletterModel.php";
    $NewsletterModel = new NewsletterModel();

    $Newsletter = new Newsletter();
    $Newsletter->setId($id);

    $obj = $NewsletterModel->listById($Newsletter);
} else {
    header("location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Lista - Editar</h2>
        <form action="../../controllers/Newsletter/edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $obj->getId(); ?>">
            <div class="form-group">
                <label for="idNome">Nome:</label>
                <input id="idNome" class="form-control" type="text" name="nome" required value="<?php echo $obj->getNome(); ?>">
            </div>
            <div class="form-group">
                <label for="idEmail">Email:</label>
                <textarea id="idEmail" class="form-control" name="email" rows="" required><?php echo $obj->getEmail(); ?></textarea>
            </div>

            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>