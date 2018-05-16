<!DOCTYPE html>

<!--
    @Author : Pedro Henrique
-->
<?php
include_once '../Connection.php';
include_once '../model/Profile.php';
include_once '../verificacaoLogin.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title></title>
    </head>
    <body>
        <h1>Lista de perfis</h1>
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
        $profile = new Profile();

        $profileList = $profile->listProfile();
        if (empty($profileList)) {
            echo "<p>Nao existem perfis cadastrados</p>";
        } else {
            ?>
            <div class="container">
                <table class="table table-light table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID perfil</th>
                            <th>Nome do perfil</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($profileList as $value) {
                        echo "<tr>";
                        echo "<td>" . $value->getIdProfile() . "</td>";
                        echo "<td>" . $value->getName() . "</td>";
                        echo "<td> <a href='detalhePerfil.php?id=" . $value->getIdProfile() . "'>Detalhes</a>"
                        . " / <a href='alteraPerfil.php?id=" . $value->getIdProfile() . "'>alterar</a> </td>"; // link para opções
                        echo "</tr>";
                    }
                    ?>
                </table>
                <?php
            }
            ?>
        </div>
    </body>
</html>
