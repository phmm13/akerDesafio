

<!-- 
    @Author : Pedro Henrique
-->

<?php
    include_once '../Connection.php';
    include_once '../model/User.php';
    $user = new User();
    $login = $_POST['login'];
    $password = $_POST['password'];
    $user->setName($login);
    $user->setPassword($password);
    $user = $user->login();
    
   // var_dump($user);
    //die();
    if(is_null($user->getName())){
        echo "<script> alert('Usuario ou senha incorretos') </script>";
        echo "<script> location.href='../index.php' </script>";
    }else{
        session_start();
        $_SESSION["login"] = $user->getName();
        echo "<script> alert('Login bem sucedido') </script>";
        echo "<script> location.href='../view/index2.php' </script>";
    }
    
?>
