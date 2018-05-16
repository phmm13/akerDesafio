<!DOCTYPE html>

<!-- 
    @Author : Pedro Henrique
-->

<?php
include_once '../Connection.php';
include_once '../model/User.php';
include_once '../model/Profile.php';
include_once "../verificacaoLogin.php";

$idUser = $_GET['id'];
$user = new User();
$user->setIdUser($idUser);
$user = $user->getUserById();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title></title>
    </head>
    <body>
        <h1>Alteração de usuário</h1>
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
            <form action="../controller/processaAlterarUsuario.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $user->getIdUser(); ?>">

                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" name="id" class="form-control" id="inputEmail3" value="<?php echo $user->getIdUser(); ?>" disabled="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Nome usuário</label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" class="form-control" id="inputEmail3" value="<?php echo $user->getName(); ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Senha</label>
                    <div class="col-sm-10">
                        <input type="text" name="password" class="form-control" id="inputEmail3" value="<?php echo $user->getName(); ?>">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputProfile" class="col-sm-2 col-form-label">Perfil</label>
                    <div class="col-sm-10">
                        <select name="perfil" id="inputState" class="form-control">
                            <option value="<?php echo $user->getProfile()->getIdProfile() ?>">
                                <?php echo $user->getProfile()->getName() ?></option>
                            <?php
                            $listProfile = $user->notMyProfile();
                            foreach ($listProfile as $value) {
                                echo "<option value=" . $value->getIdProfile() . ">" . $value->getName() . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Data de criação</label>
                    <div class="col-sm-10">
                        <input type="text" name="id" class="form-control" id="inputEmail3" value="<?php echo $user->getDateCreation(); ?>" disabled="">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Data de login</label>
                    <div class="col-sm-10">
                        <input type="text" name="id" class="form-control" id="inputEmail3" value=" <?php echo $user->getDateLogin(); ?>" disabled="">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</body>
</html>
