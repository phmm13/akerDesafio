
<!-- 
    @Author : Pedro Henrique
-->

<?php
    include '../Connection.php';
    include '../model/Profile.php';
    $idProfile = $_GET['id'];
    $name = $_GET['nome'];
    
    $profile = new Profile();
    $profile->setIdProfile($idProfile);
    $profile->setName($name);
    
    if($profile->updateProfile()){
        echo "<script>alert('Perfil atualizado com sucesso!')</script>";
        echo "<script> location.href='../view/listarPerfil.php' </script>";
    }else{
        echo "<script>alert('Não foi possivel atualizar o perfil!')</script>";
        echo "<script> location.href='../view/listarPerfil.php' </script>";
    }
?>