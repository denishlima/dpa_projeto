<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>Clientes</h2>
        <form action="../../controllers/Clientes/add.php" method="post" >

            <div class="form-group">
                <div>
                    <label for="idNome">Nome</label>
                    <input id="idNome" class="form-control" type="text" name="nome" placeholder="Nome" required>

                </div>
                <div>
                    <label for="idcpf">Cpf</label>
                    <input id="idcpf" pattern="(\d{3}\.?\d{3}\.?\d{3}-?\d{2})|(\d{2}\.?\d{3}\.?\d{3}/?\d{4}-?\d{2})" class="form-control" type="text" name="cpf" placeholder="Cpf" required>
                </div>
                <div>
                    <label for="idemail">Email</label>
                    <input id="idemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" type="email" name="email" placeholder="Email" required>
                </div>
                <div>
                    <label for="iddataNascimento">Data De Nascimento</label>
                    <input id="iddataNascimento" class="form-control" type="date" name="dataNascimento" placeholder="Data De Nascimento" required>
                </div>
                <div>
                    <label for="idsexo">Sexo</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="Masculino" value="1" checked>
                        <label class="form-check-label" for="Masculino">
                            Masculino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="Feminino" value="0">
                        <label class="form-check-label" for="Feminino">
                            Feminino
                        </label>
                    </div>
                </div>


            </div>
            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>