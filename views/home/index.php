<?php
session_start();
require_once "../../models/AdministradorModel.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <?php include "../includes/menu.php"; ?>
    <div class="container">
        <h2>System XYZ - Bem vindo</h2>
        <?php if ($_GET['result']) { ?>
            <p>Olá <?php echo unserialize($_SESSION["administrador"])->getNome()  ?>, seja bem vindo!</p>
        <?php } ?>
    </div>
    <?php include "../includes/js.php"; ?>
</body>

</html>