<?php
require_once "models/AdministradorModel.php";
$administradorModel = new AdministradorModel();
$lista = $administradorModel->listar();
if(isset($_GET['result']) && $_GET['result'] == 0) {

}
if (sizeof($lista) == 0) {

    $administrador = new Administrador();
    $administrador->setNome("admin");
    $administrador->setEmail("admin@email.com");
    $administrador->setSenha("Admin123");

    $rs = $administradorModel->add($administrador);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System XYZ</title>
    <link rel="stylesheet" href="views/css/bootstrap.css">
    <link rel="stylesheet" href="views/css/style.css">

</head>

<body class="login-body">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" style="margin-left: 60px; margin-right: 20px;" href="#">XYZ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<div class="login-container">
    <div class="login-box">
        <h2 class="ln-title">Login</h2>
        <?php if (isset($_GET['result'])) {
            if (!$_GET['result']) echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> E-mail ou senha incorreta.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            else echo '
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Sua sessão foi finalizada.</strong>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            unset($_GET['result']);
        }
        ?>
        <form action="controllers/Administradores/login.php" method="post">
            <div class="form-group">
                <div>
                    <label for="idEmail" style="font-weight: 400;">E-mail</label>
                    <input id="idEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control ln-field"
                           type="email" name="email" placeholder="E-mail" required>
                </div>
                <div>
                    <label for="idSenha" style="font-weight: 400;">Senha</label>
                    <input id="idSenha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control ln-field"
                           type="password" name="senha" placeholder="Senha"
                           title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres"
                           required>
                </div>
            </div>
            <br>
            <a href="views/Administradores/passwordRecovery.php">Esqueceu a senha?</a>
            <br>
            <button type="submit" class="btn login-btn btn-success">Acessar sistema</button>
        </form>
    </div>
</div>
<script src="views/js/bootstrap.js"></script>
</body>

</html>