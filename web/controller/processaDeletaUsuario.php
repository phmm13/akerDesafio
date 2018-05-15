
<!-- 
    @Author : Pedro Henrique
-->
<?php
    include_once '../Connection.php';
    include_once '../model/User.php';
    $idUser = $_GET['id'];
    $user = new User();
    $user->setIdUser($idUser);
    if($user->deleteUser()>0){
        echo "<script> alert('Usuario deletado com sucesso')</script>";
        echo "<script> location.href='../view/index2.php'</script>";
    }else{
        echo "<script> alert('Não foi possivel deletar o usuario')</script>";
        echo "<script> location.href='../view/listarUsuario.php'</script>";
    }
?>
