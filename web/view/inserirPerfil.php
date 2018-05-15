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
        <title></title>
    </head>
    <body>
        <table>
            <form action="../controller/processaCadastroPerfil.php" method="GET">
                <tr>
                    <td>
                        Nome do perfil
                    </td>
                    <td>
                        <input type="text" name="nome">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Cadastrar">
                    </td>
                </tr>
                
            </form>
        </table>
    </body>
</html>
