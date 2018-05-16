<!DOCTYPE html>

<!-- 
    @Author : Pedro Henrique
-->
<?php
include_once "../verificacaoLogin.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title></title>
        <script type="text/javascript">
            function deleteProfile(idProfile){
                if(confirm("Tem certeza que deseja excluir o perfil? " + idProfile)){
                    location.href = "../controller/processaDeletarPerfil.php?id="+idProfile;
                }
            }
        </script>
    </head>
    <body>
        <?php
        include_once "../Connection.php";
        include_once "../model/profile.php";
        $idProfile = $_GET['id'];

        $profile = new Profile();
        $profile->setIdProfile($idProfile);
        $profile = $profile->getProfileById();
        ?>
        <h1>Detalhe de perfil</h1>
        <hr>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link" href="inserirPerfil.php">Cadastrar perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="inserirUsuario.php">Cadastrar usuario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listarPerfil.php">Exibir perfis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listarUsuario.php">Exibir usuarios</a>
            </li>
        </ul>
        <hr>
        <div class="container">
        <table class="table table-light table-striped">
            <tr>
                <td>
                    ID
                </td>
                <td>
                    <?php echo $profile->getIdProfile() ?> 
                </td>
            </tr>
            
            <tr>
                <td>
                    Nome
                </td>
                <td>
                    <?php echo $profile->getName() ?> 
                </td>
            </tr>

        </table>
        <button onclick="deleteProfile(<?php echo $profile->getIdProfile() ?>)">Deletar perfil</button>
        </div>
    </body>
</html>
