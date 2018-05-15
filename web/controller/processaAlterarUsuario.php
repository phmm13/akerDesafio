
<!-- 
    @Author : Pedro Henrique
-->
<?php
    include_once '../Connection.php';
    include_once '../model/User.php';
    include_once '../model/Profile.php';
    
    $idUser = $_POST['id'];
    $name = $_POST['nome'];
    $password = $_POST['senha'];
    $idProfile = $_POST['perfil'];

    $user = new User();
    $user->setIdUser($idUser);
    $user->setName($name);
    $user->setPassword($password);
    
    $profile = new Profile();
    $profile->setIdProfile($idProfile);
    
    $user->setProfile($profile);
    
    if($user->updateUser($user)){
        echo "<script>alert('Usuario atualizado com sucesso!')</script>";
        echo "<script> location.href='../view/listarUsuario.php' </script>";
    }else{
        echo "<script>alert('Não foi possivel atualizar o usuario!')</script>";
        echo "<script> location.href='../view/listarUsuario.php' </script>";
    }
?>

