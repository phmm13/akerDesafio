<!DOCTYPE html>

<!-- 
    @Author : Pedro Henrique
-->

<?php
    include_once '../Connection.php';
    include_once '../model/User.php';
    include_once '../model/Profile.php';
    include_once "../verificacaoLogin.php";
    
    $idUser = $_GET['id'];
    $user = new User();
    $user->setIdUser($idUser);
    $user = $user->getUserById();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="../controller/processaAlterarUsuario.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user->getIdUser(); ?>">
            <table>
                <tr>
                    <td>
                        ID
                    </td>
                    <td>
                        <?php echo $user->getIdUser();?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nome
                    </td>
                    <td>
                        <input type="text" name="nome" value="<?php echo $user->getName();?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Senha
                    </td>
                    <td>
                        <input type="password" name="senha" value="<?php echo $user->getName();?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Perfil
                    </td>
                    <td>
                        <select name="perfil">
                            <option value="<?php echo $user->getProfile()->getIdProfile()?>">
                                <?php echo $user->getProfile()->getName()?></option>
                            <?php
                                $listProfile = $user->notMyProfile();
                                var_dump($listProfile);
                                foreach($listProfile as $value){
                                    echo "<option value=".$value->getIdProfile().">".$value->getName()."</option>";
                                }
                            
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Data de criação
                    </td>
                    <td>
                        <?php echo $user->getDateCreation();?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Data de login
                    </td>
                    <td>
                        <?php echo $user->getDateLogin();?>
                    </td>
                </tr>
            </table>
            <input type="submit" value="Salvar alterações">
        </form>
    </body>
</html>
