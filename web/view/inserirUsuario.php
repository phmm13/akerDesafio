<!DOCTYPE html>

<!-- 
    @Author : Pedro Henrique
-->
<?php
include_once '../Connection.php';
//include_once '../model/Profile.php';
include_once '../model/User.php';
include_once "../verificacaoLogin.php";
$user = new User();
$profile = new Profile();
$profileList = $profile->listProfile();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <h1>Cadastrar usuário</h1>
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
        <form action="../controller/processaCadastroUsuario.php" method="POST">
            <div class="container">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Nome usuário</label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputEmail3" placeholder="Email" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputProfile" class="col-sm-2 col-form-label">Perfil</label>
                    <div class="col-sm-10">
                        <select name="perfil" id="inputState" class="form-control">
                            <option selected>Selecione</option>
                            <?php
                            foreach ($profileList as $value) {
                                echo "<option value=" . $value->getIdProfile() . ">" . $value->getName() . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>


    </div>
</body>
</html>
