

<!-- 
    @Author : Pedro Henrique
-->

<?php
    include_once '../Connection.php';
    include_once '../model/Profile.php';
    $idProfile = $_GET['id'];
    $profile = new Profile();
    $profile->setIdProfile($idProfile);
    if($profile->deleteProfile() > 0){
        echo "<script> alert('Perfil deletado com sucesso')</script>";
        echo "<script> location.href='../view/index2.php'</script>";
    }else{
        echo "<script> alert('Não foi possivel deletar o perfil')</script>";
        echo "<script> location.href='../view/listarPerfil.php'</script>";
    }
?>

