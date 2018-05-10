

<!-- 
    @Author : Pedro Henrique
-->
<?php
    include '../Connection.php';
    include '../model/Profile.php';
    $name = $_GET['nome'];
    
    $profile = new Profile();
    $profile->setName($name);
    
    if($profile->insertProfile()){
        echo "<script>alert('Perfil cadastrado com sucesso!')</script>";
        echo "<script> location.href='../view/listarPerfil.php' </script>";
    }else{
        echo "<script>alert('Não foi possivel cadastrar o perfil!')</script>";
        echo "<script> location.href='../view/inserirPerfil.php' </script>";
    }

?>
