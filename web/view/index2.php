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
        <title></title>
    </head>
    <body>
        <h1>Bem vindo <?php echo $_SESSION["login"]?></h1>
        <hr>
        <a href="inserirPerfil.php">Cadastrar perfil</a> <br>
        <a href="inserirUsuario.php">Cadastrar usuario</a> <br>
        <a href="listarPerfil.php">Lista de perfis</a> <br>
        <a href="listarUsuario.php">Lista de usuarios</a> <br>
    </body>
</html>
