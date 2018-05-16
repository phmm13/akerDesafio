<!DOCTYPE html>

<!-- 
    @Author : Pedro Henrique
-->
<?php
include_once '../Connection.php';
include_once '../model/Profile.php';
include_once '../model/User.php';
include_once "../verificacaoLogin.php";
$user = new User();
$listUser = $user->listUser();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title></title>
    </head>
    <body>
        <h1>Lista de usuarios</h1>
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
        <?php
        if (empty($listUser)) {
            echo "<h1>Não existe usuarios cadastrados</h1>";
        } else {
            ?>
            <div class="container">
                <table class="table table-light table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                ID do usuario
                            </th>
                            <th>
                                Nome
                            </th>
                            <th>
                                Perfil
                            </th>
                            <th>
                                Data de criaçao
                            </th>
                            <th>
                                Ultimo login
                            </th>
                            <th>
                                Opções
                            </th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($listUser as $value) {
                        $profile = new Profile();


                        $profile->setIdProfile($value->getProfile()->getIdProfile());

                        $profile = $profile->getProfileById();
                        echo "<tr>";
                        echo "<td>" . $value->getIdUser() . "</td>";
                        echo "<td>" . $value->getName() . "</td>";
                        echo "<td>" . $profile->getName() . "</td>";
                        echo "<td>" . $value->getDateCreation() . "</td>";
                        echo "<td>" . $value->getDateLogin() . "</td>";
                        echo "<td> <a href='detalheUsuario.php?id=" . $value->getIdUser() . "'>Detalhes</a>" .
                        " / <a href='alteraUsuario.php?id=" . $value->getIdUser() . "'>Alterar</a>";
                        echo "</tr>";
                    }
                    ?>

                    <?php
                }
                ?>
            </table>
        </div>
    </body>
</html>
