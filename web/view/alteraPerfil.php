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
        <table>
            <form action="../controller/processaAlterarPerfil.php" method="GET">
                <input type="hidden" name="id" value=<?php echo $profile->getIdProfile() ?> >
                <tr>
                    <td>
                        Nome
                    </td>
                    <td>
                        <input type="text" name="nome" value=<?php echo $profile->getName()?> >
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Salvar alterações">
                    </td>
                </tr>
            </form>
        </table>
    </body>
</html>
