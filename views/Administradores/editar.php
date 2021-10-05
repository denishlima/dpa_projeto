<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    require_once "../../models/AdministradorModel.php";
    $administradorModel = new AdministradorModel();

    $administrador = new Administrador();
    $administrador->setId($id);

    $obj = $administradorModel->listById($administrador);
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
        <h2>Administradores - Editar</h2>
        <form action="../../controllers/Administradores/edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $obj->getId(); ?>">
            <div class="form-group">
                <div>
                    <label for="idNome">Nome</label>
                    <input id="idNome" class="form-control" type="text" name="nome" placeholder="Nome" value="<?php echo $obj->getNome(); ?>" required>
                </div>
                <div>
                    <label for="idEmail">E-mail</label>
                    <input id="idEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" type="email" name="email" placeholder="E-mail" value="<?php echo $obj->getEmail(); ?>" required>
                </div>
                <div>
                    <label for="idSenha">Senha</label>
                    <input id="idSenha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" type="password" name="senha" placeholder="Senha" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres" required>
                </div>
                <button type="submit" class="btn btn-success">Gravar</button>
            </div>
            <br>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>