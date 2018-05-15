
<!-- 
    @Author : Pedro Henrique
-->


<?php
    include_once '../Connection.php';
    include_once '../model/User.php';
    include_once '../model/Profile.php';
    $name = $_POST['nome'];
    $password = $_POST['password'];
    $profileId = $_POST['perfil'];
    
    $profile = new Profile();
    $profile->setIdProfile($profileId);
    
    $user = new User();
    $user->setName($name);
    $user->setPassword($password);
    $user->setProfile($profile);
    
    if($user->insertUser()){
        echo "<script>alert('Usuario cadastrado com sucesso!')</script>";
        echo "<script> location.href='../view/listarUsuario.php' </script>";
    }else{
        echo "<script>alert('Não foi possivel cadastrar o usuario!')</script>";
        echo "<script> location.href='../view/inserirUsuario.php' </script>";
    }

?>