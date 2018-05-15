<!DOCTYPE html>

<!-- 
    @Author : Pedro Henrique
-->
<?php
    include_once '../Connection.php';
    //include_once '../model/Profile.php';
    include_once '../model/User.php';
    include_once "../verificacaoLogin.php";
    $user = new User();
    $profile = new Profile();
    $profileList = $profile->listProfile();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table>
            <form action="../controller/processaCadastroUsuario.php" method="POST">
                <tr>
                    <td>
                        Nome Usuario
                    </td>
                    <td>
                        <input type="text" name="nome">
                    </td>
                </tr>
                <tr>
                    <td>
                        Senha
                    </td>
                    <td>
                        <input type="password" name="password">
                    </td>
                </tr>
                <tr>
                    <td>
                        Perfil
                    </td>
                    <td>
                        <select name="perfil">
                            <option>Selecione</option>
                            <?php
                                foreach($profileList as $value){
                                    echo "<option value=".$value->getIdProfile().">".$value->getName()."</option>";
                                }
                            
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Cadastrar">
                    </td>
                </tr>
                
            </form>
        </table>
    </body>
</html>
