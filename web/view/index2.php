<!DOCTYPE html>

<!-- 
    @Author : Pedro Henrique
-->
<?php
include_once "../verificacaoLogin.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title></title>
    </head>
    <body>
        <h1>Bem vindo <?php echo $_SESSION["login"] ?></h1>
        <hr>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="inserirPerfil.php">Cadastrar perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="inserirUsuario.php">Cadastrar usuario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listarPerfil.php">Exibir perfis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listarUsuario.php">Exibir usuarios</a>
            </li>
        </ul>


    </body>
</html>
