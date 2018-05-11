<!DOCTYPE html>

<!-- 
    @Author : Pedro Henrique
-->
<?php
    include '../Connection.php';
    include '../model/Profile.php';
    include '../model/User.php';
    $user = new User();
    $listUser = $user->listUser();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Lista de usuarios</h1>
        <hr>
        <?php
        if(empty($listUser)){
            echo "<h1>Não existe usuarios cadastrados</h1>";
        }else{
        ?>
        <table border="2">
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
            <?php
                foreach($listUser as $value){
                    $profile = new Profile();
                    $profile->setIdProfile($value->getProfile());
                    $profile = $profile->getProfileById();
                    
                    echo "<tr>";
                    echo "<td>" . $value->getIdUser() . "</td>";
                    echo "<td>" . $value->getName() . "</td>";
                    echo "<td>" . $profile->getName() . "</td>";
                    echo "<td>" . $value->getDateCreation() . "</td>";
                    echo "<td>" . $value->getDateLogin() . "</td>";
                    echo "<td> <a href='detalheUsuario.php?id=".$value->getIdUser()."'>Detalhes</a>".
                            " / <a href='alterarUsuario.php?id=".$value->getIdUser()."'>Alterar</a>";
                    echo "</tr>";
                }
            ?>
            
            <?php
                }
            ?>
        </table>
    </body>
</html>
