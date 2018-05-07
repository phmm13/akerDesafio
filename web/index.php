<!DOCTYPE html>

<!-- 
    @Author : Pedro Henrique
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once "User.php";
            
            $user1 = new User;
            $user1 -> dateCreation = "06/05/2018 12:20:00";
            $user1 -> dateLogin = "06/05/2018 12:35:00";
            $user1 -> idUser = 1;
            $user1 -> name = "Pedro Henrique Marcelino";
            $user1 -> password = "***********";
            
            print_r($user1);
        ?>
    </body>
</html>
