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
        <h2>Login</h2>
        <form action="controllers/Administradores/login.php" method="post" >
            <div class="form-group">
                <div>
                    <label for="idEmail">E-mail</label>
                    <input id="idEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" type="email" name="email" placeholder="E-mail" required>
                </div>
                <div>
                    <label for="idSenha">Senha</label>
                    <input id="idSenha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="form-control" type="password" name="senha" placeholder="Senha" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres" required>
                </div>
            </div>
        <br>
        <button type="submit" class="btn btn-success">Gravar</button>
        </form>
        <a href="views/Administradores/passwordRecovery.php">Esqueceu a senha?</a>
    </div>
    <script src="views/js/bootstrap.js"></script>
</body>

</html>