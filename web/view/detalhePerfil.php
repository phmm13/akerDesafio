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
            function deleteProfile(idProfile){
                if(confirm("Tem certeza que deseja excluir o perfil? " + idProfile)){
                    location.href = "../controller/processaDeletarPerfil.php?id="+idProfile;
                }
            }
        </script>
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
        <button onclick="deleteProfile(<?php echo $profile->getIdProfile() ?>)">Deletar perfil</button>
    </body>
</html>
