<!DOCTYPE html>

<!-- 
    @Author : Pedro Henrique
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include "../Connection.php";
        include "../model/User.php";
        include "../model/Profile.php";
        $idUser = $_GET['id'];
        echo "ALOOOOOOOOOOOOOO" . $idUser;
        $user = new User();
        $user->setIdUser($idUser);
        $user = $user->getUserById();
        var_dump($user);
        ?>
        <table border="2">
            <tr>
                <td>
                    ID
                </td>
                <td>
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
        <button type="button" onclick="">Deletar perfil</button>
    </body>
</html>
