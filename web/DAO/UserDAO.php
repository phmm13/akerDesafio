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
        $query = "INSERT INTO usuario (nome,senha,perfil_idPerfil,dataCriacao,dataLogin) "
                . "VALUES (?,?,?,STR_TO_DATE(),STR_TO_DATE())";
        $insert = $connection->prepare($query);
        $insert->bind_param("ssiss",$user->getName(),$user->getPassword(),$user->getProfile()->getIdProfile()
                ,$user->getDateCreation(),$user->getDateLogin());
        $insert->execute();
        $connection->close();
        return $insert;
    }
    public function listUser(){
        $query = "SELECT*FROM usuario";
        $select = $connection->query($query);
        if($select){
            while($result = $select->fetch_array()){
                $user = new User();
                $profile = new Profile();
                $user->setIdUser($result["idUsuario"]);
                $user->setName($result["nome"]);
                $user->setSenha($result["senha"]);
                $profile->setIdProfile($result["idPerfil"]);
                $profile->getProfileById();
                $user->setProfile($profile);
                $user->setDateCreation($result["dataCriacao"]);
                $user->setDateLogin($result["dataLogin"]);
                $list = array();
                array_push($list,$user);
            }
            $connection->close();
            return $list;
        }else{
            $connection->close();
            return false;
        }
    }
    public function getUserById(User $user){
        $query = "SELECT*FROM usuario WHERE idUsuario = ?";
        
        $select = $connection->prepare($query);
        $select->bind_param("i",$user->getIdUser());
        $select->execute();
        if($result = $select->fetch_array()){
            $user = new User();
            $profile = new Profile();
            
            $user->setIdUser($result["idUsuario"]);
            $user->setName($result["nome"]);
            $user->setPassword($result["senha"]);
            
            $profile->setIdProfile($result["perfil_idPerfil"]);
            $profile->getProfileById();
            
            $user->setProfile($profile);
            $user->setDateCreation($result["dataCriacao"]);
            $user->setDateLogin($result["dataLogin"]);
            
            $connection->close();
            return $user;
        }else{
            $connection->close();
            return false;
        }
    }
    public function updateUser(User $user){
        $query = "UPDATE usuario SET nome=?,senha=?,perfil_idPerfil=? WHERE idUsuario=?";
        $insert = $connection->prepare($query);
        $insert->bind_param("ssii",$user->getName(),$user->getPassword(),$user->getProfile()->getIdProfile()
                ,$user->getIdUser());
        $insert->execute();
        $connection->close();
        return $insert;
    }
    public function deleteUser(User $user){
        $query = "DELETE usuario WHERE idUsuario = ?";
        $delete = $connection->prepare($query);
        $delete->bind_param("i",$user->getIdUser());
        $delete->execute();
        $connection->close();
        return $delete;
    }
    public function login(User $user){
        $query1 = "SELECT*FROM usuario WHERE nome=? AND senha=?";
        $select = $connection->prepare($query1);
        $select->bind_param("ss",$user->getName(),$user->getPassword());
        if($select > 0){
            $query2 = "UPDATE usuario SET dataLogin = now()";
            $update->query($query2);
            $connection->close();
            return $select;
        }else{
            return false;
        }
    }
}
