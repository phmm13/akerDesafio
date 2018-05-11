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
        include "../model/profile.php";
        $idProfile = $_GET['id'];

        $profile = new Profile();
        $profile->setIdProfile($idProfile);
        $profile = $profile->getProfileById();
        ?>
        <table border="2">
            <tr>
                <td>
                    ID
                </td>
                <td>
                    <?php echo $profile->getIdProfile() ?> 
                </td>
            </tr>
            
            <tr>
                <td>
                    Nome
                </td>
                <td>
                    <?php echo $profile->getName() ?> 
                </td>
            </tr>

        </table>
        <button type="button" onclick="">Deletar perfil</button>
    </body>
</html>
