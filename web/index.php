<!DOCTYPE html>

<!-- 
    @Author : Pedro Henrique
-->

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/index.css" rel="stylesheet">
        
        <title></title>
    </head>
    <body class="text-center" >
        <form class="form-signin" action="controller/processaLogin.php" method="POST">
            <h1 class="h3 mb-3 font-weight-normal">Entre</h1>
            <label for="inputEmail" class="sr-only">Login</label>
            <input type="text" name="login" id="inputEmail" class="form-control" placeholder="Nome" required autofocus>
            
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
    </body>
</html>
