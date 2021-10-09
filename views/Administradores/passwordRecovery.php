<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
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
        <form action="../controllers/Administradores/Recovery.php" method="post">
            <div class="form-group">
            <div>
                    <label for="idEmail">E-mail</label>
                    <input id="idEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" type="email" name="email" placeholder="E-mail" required>
                </div>
                <div>
                    <label for="idConfirm">Confirme seu E-mail</label>
                    <input id="idConfirm" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" type="email" name="email" placeholder="E-mail" required>
                </div>
            </div>
        <br>
        <button type="submit" class="btn btn-success" onclick="alert('Foi enviado um email para a recuperação de senha!')">Continuar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>