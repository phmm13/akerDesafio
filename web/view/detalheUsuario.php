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
        <script type="text/javascript">
            function deleteUser(idUser) {
                if (confirm("Tem certeza que deseja excluir o usuario? " + idUser)) {
                    location.href = "../controller/processaDeletaUsuario.php?id=" + idUser;
                }
            }
        </script>
    </head>
    <body>
        <?php
        include_once "../Connection.php";
        include_once "../model/User.php";
        include_once "../model/Profile.php";
        $idUser = $_GET['id'];
        $user = new User();
        $user->setIdUser($idUser);
        $user = $user->getUserById();
        ?>
        <h1>Detalhe de usuário</h1>
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
        <table class="table table-light table-striped">
            <tr>
                <td>
                    ID
                </td>
                <td ng-model="idUser">
                    <?php echo $user->getIdUser() ?> 
                </td>
            </tr>

            <tr>
                <td>
                    Nome
                </td>
                <td>
                    <?php echo $user->getName() ?> 
                </td>
            </tr>
            <tr>
                <td>
                    Senha
                </td>
                <td>
                    <?php echo $user->getPassword() ?> 
                </td>
            </tr>

            <tr>
                <td>
                    Perfil
                </td>
                <td>
                    <?php echo $user->getProfile()->getName() ?> 
                </td>
            </tr>
            <tr>
                <td>
                    Data de criação
                </td>
                <td>
                    <?php echo $user->getDateCreation() ?> 
                </td>
            </tr>

            <tr>
                <td>
                    Data de login
                </td>
                <td>
                    <?php echo $user->getDateLogin() ?> 
                </td>
            </tr>

        </table>
        <button onclick="deleteUser(<?php echo $user->getIdUser() ?>)">Deletar usuario</button>
        </div>
    </body>
</html>
