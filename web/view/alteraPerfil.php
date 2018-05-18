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
        <?php
        include_once "../Connection.php";
        include_once "../model/profile.php";
        $idProfile = $_GET['id'];

        $profile = new Profile();
        $profile->setIdProfile($idProfile);
        $profile = $profile->getProfileById();
        ?>
        <h1>Alteração de perfil</h1>
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
        <hr>
        <div class="container">
            <form action="../controller/processaAlterarPerfil.php" method="GET">
                <input type="hidden" name="id" value=<?php echo $profile->getIdProfile() ?> >
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Nome do Perfil</label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" class="form-control" placeholder="Perfil" value=<?php echo $profile->getName() ?> required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>

            </form>
        </div>
    </body>
</html>
