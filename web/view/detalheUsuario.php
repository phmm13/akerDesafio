<!DOCTYPE html>

<!-- 
    @Author : Pedro Henrique
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>
        <script>
            var app = angular.module('testApp', []);
            app.controller('testController', function ($scope, $http) {

                $scope.deleteUser = function () {
                    var idUser = $scope.idUser;

                    if ($window.confirm("Deseja deletar o usuario?")) {
                        $http.get('../controller/processaDeletaUsuario.php', idUser).then(function (response) {
                            alert("Usuario deletado com sucesso");
                            $window.location.href = '../index.php';
                        });
                    }
                }



            }

            );
        </script>
    </head>
    <body>
        <div ng-app="testApp" ng-controller="testController">
            <?php
            include "../Connection.php";
            include "../model/User.php";
            include "../model/Profile.php";
            $idUser = $_GET['id'];
            $user = new User();
            $user->setIdUser($idUser);
            $user = $user->getUserById();
            ?>
            <table border="2">
                <tr>
                    <td>
                        ID
                    </td>
                    <td ng-model="idUser">
                        <?php echo $user->getIdUser() ?> 
                    </td>
                </tr>

                <tr>
                    <td>
                        Nome
                    </td>
                    <td>
                        <?php echo $user->getName() ?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Senha
                    </td>
                    <td>
                        <?php echo $user->getPassword() ?> 
                    </td>
                </tr>

                <tr>
                    <td>
                        Perfil
                    </td>
                    <td>
                        <?php echo $user->getProfile()->getName() ?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Data de criação
                    </td>
                    <td>
                        <?php echo $user->getDateCreation() ?> 
                    </td>
                </tr>

                <tr>
                    <td>
                        Data de login
                    </td>
                    <td>
                        <?php echo $user->getDateLogin() ?> 
                    </td>
                </tr>

            </table>
            <input type="button" ng-click="deleteUser()" value="Deletar usuario">
        </div>
    </body>
</html>
