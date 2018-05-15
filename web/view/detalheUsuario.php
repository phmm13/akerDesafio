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
        <table border="2">
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

    </body>
</html>
