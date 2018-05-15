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
        <title></title>
    </head>
    <body>
        <h1>Lista de perfis</h1>
        <hr>
        <?php
        $profile = new Profile();
        
        $profileList = $profile->listProfile();
        if(empty($profileList)){
            echo "<p>Nao existem perfis cadastrados</p>";
        }else{
        ?>
        <table border="2">
            <tr>
                <th>ID perfil</th>
                <th>Nome do perfil</th>
                <th>Opções</th>
            </tr>
            <?php
                foreach ($profileList as $value) {
                    echo "<tr>";
                    echo "<td>" . $value->getIdProfile() . "</td>";
                    echo "<td>" . $value->getName() . "</td>";
                    echo "<td> <a href='detalhePerfil.php?id=".$value->getIdProfile()."'>Detalhes</a>"
                            ." / <a href='alteraPerfil.php?id=".$value->getIdProfile()."'>alterar</a> </td>"; // link para opções
                    echo "</tr>";
                }
            
            ?>
        </table>
        <?php
        }
        ?>
        
    </body>
</html>
