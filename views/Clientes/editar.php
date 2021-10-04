<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    require_once "../../models/ClienteModel.php";
    $ClienteModel = new ClienteModel();

    $cliente = new Cliente();
    $cliente->setId($id);

    $obj = $ClienteModel->listById($cliente);
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
        <h2>Clientes - Editar</h2>
        <form action="../../controllers/Clientes/edit.php" method="post"  enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $obj->getId(); ?>">
            <div class="form-group">
                <div>
                    <label for="idNome">Nome</label>
                    <input id="idNome" class="form-control" type="text" name="nome" placeholder="Nome" required value="<?php echo $obj->getNome(); ?>">

                </div>
                <div>
                    <label for="idcpf">Cpf</label>
                    <input id="idcpf" class="form-control" type="text" name="cpf" placeholder="Cpf" required value="<?php echo $obj->getCpf(); ?>">
                </div>
                <div>
                    <label for="idemail">Email</label>
                    <input id="idemail" class="form-control" type="email" name="email" placeholder="Email" required value="<?php echo $obj->getEmail(); ?>">
                </div>
                <div>
                    <label for="iddataNascimento">Data De Nascimento</label>
                    <input id="iddataNascimento" class="form-control" type="date" name="dataNascimento" placeholder="Data De Nascimento" required value="<?php echo $obj->getDataNascimento(); ?>">
                </div>
                <div>
                    <label for="idsexo">Sexo</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="Masculino" value="1" <?php echo $obj->getSexo()? "checked": ""; ?>>
                        <label class="form-check-label" for="Masculino">
                        Masculino
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sexo" id="Feminino" value="0" <?php echo $obj->getSexo()? "": "checked"; ?>>
                        <label class="form-check-label" for="Feminino">
                        Feminino
                        </label>
                    </div>
                </div>
                <div class="form-group">
                <label for="idArquivo">Foto atual: </label><br>
                <img src="../../uploads/Clientes/<?php echo $obj->getArquivo(); ?>" alt="" width="150px">
                </div>
                <div class="form-group">
                <label for="idArquivo">Foto: </label><br>
                <input id="idArquivo" class="form-control-file" type="file" name="arquivo">
                </div>
            <br>
            <button type="submit" class="btn btn-success">Gravar</button>
        </form>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>