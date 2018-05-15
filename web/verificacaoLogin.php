
<!-- 
    @Author : Pedro Henrique
-->

<?php
session_start();
if (!ISSET($_SESSION["login"])) { //usar IF(ISSET(VARIAVEL)) isset retorna true se a variavel tiver algo, false se for null
    echo "<script>alert('Voce não esta logado')</script>";
    echo "<script>location.href = ('../index.php')</script>";
}
?>

