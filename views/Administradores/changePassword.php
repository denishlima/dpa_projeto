

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>System XYZ</title>
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/style.css">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" style="margin-left: 60px; margin-right: 20px;" href="#">XYZ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
    <div class="container">
        <h2>Recuperar senha</h2>
        <form action="../../controllers/Administradores/newPass.php" method="post">
            <div class="form-group">
                <input type="hidden" id="idCode" name="recoveryCode" value="<?php if(isset($_GET['recoveryCode'])){ echo !$_GET['recoveryCode'] ? "": $_GET['recoveryCode'];}?>">
                <div>
                    <label for="idSenha">Senha</label>
                    <input id="idSenha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" type="password" name="senha" placeholder="Senha" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres" required>
                </div>
            </div>
        <br>
        <button type="submit" class="btn btn-success">Continuar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>