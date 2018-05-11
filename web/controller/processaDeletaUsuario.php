
<!-- 
    @Author : Pedro Henrique
-->
<?php
    include '../Connection.php';
    include '../model/User.php';
    $idUser = $_GET['id'];
    $user = new User();
    $user->setIdUser($idUser);
    $user->deleteUser();
    return true;
?>
