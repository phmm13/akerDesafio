<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserDAO
 *
 * @author Pedro Henrique
 */

class UserDAO {
    
    public function insertUser(User $user){
        global $connection;
        $query = "INSERT INTO usuario (nome,senha,perfil_idPerfil,dataCriacao)VALUES (?,?,?,now())";
        $insert = $connection->prepare($query);
        $insert->bind_param("ssi",$user->getName(),$user->getPassword(),$user->getProfile()->getIdProfile());
        $insert->execute();
        $insert->close();
        return $insert;
    }
    public function listUser(){
        global $connection;
        $query = "SELECT*FROM usuario";
        $select = $connection->query($query);
        if($select){
            $list = array();
            while($result = $select->fetch_array()){
                $user = new User();
                $profile = new Profile();
                $user->setIdUser($result["idUsuario"]);
                $user->setName($result["nome"]);
                $user->setPassword($result["senha"]);
                $profile->setIdProfile($result["perfil_idPerfil"]);
                $profile = $profile->getProfileById();
                $user->setProfile($profile);
                $user->setDateCreation($result["dataCriacao"]);
                $user->setDateLogin($result["dataLogin"]);
                
                
                array_push($list,$user);
            }
            $select->close();
            return $list;
        }else{
            return false;
        }
    }
    public function getUserById(User $user){
        global $connection;
        $query = "SELECT*FROM usuario WHERE idUsuario = ?";
        
        $select = $connection->prepare($query);
        $select->bind_param("i",$user->getIdUser());
        if($select->execute()){
            $select->bind_result($idUser,$nameUser,$passwordUser,$idPerfilUser,$dateCreation,$dateLogin);
            $select->fetch();
            $user = new User();
            $profile = new Profile();
            
            $user->setIdUser($idUser);
            $user->setName($nameUser);
            $user->setPassword($passwordUser);
            
            
            $user->setDateCreation($dateCreation);
            $user->setDateLogin($dateLogin);
            $select->close();
            
            $profile->setIdProfile($idPerfilUser);
            $profile = $profile->getProfileById();
            $user->setProfile($profile);
            
            
            
            return $user;
        }else{
            return false;
        }
    }
    public function updateUser(User $user){
        global $connection;
        $query = "UPDATE usuario SET nome=?,senha=?,perfil_idPerfil=? WHERE idUsuario=?";
        $update = $connection->prepare($query);
        $update->bind_param("ssii",$user->getName(),$user->getPassword(),$user->getProfile()->getIdProfile()
                ,$user->getIdUser());
        $update->execute();
        $update->close();
        return $insert;
    }
    public function deleteUser(User $user){
        global $connection;
        $query = "DELETE usuario WHERE idUsuario = ?";
        $delete = $connection->prepare($query);
        $delete->bind_param("i",$user->getIdUser());
        $delete->execute();
        $delete->close();
        return $delete;
    }
    public function login(User $user){
        global $connection;
        $query1 = "SELECT*FROM usuario WHERE nome=? AND senha=?";
        $select = $connection->prepare($query1);
        $select->bind_param("ss",$user->getName(),$user->getPassword());
        if($select > 0){
            $query2 = "UPDATE usuario SET dataLogin = now()";
            $update->query($query2);
            $update->close();
            $select->close();
            return $select;
        }else{
            return false;
        }
    }
}
