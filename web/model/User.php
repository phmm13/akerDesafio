<?php

/**
 * Description of User
 *
 * @Author Pedro Henrique
 */
include '../DAO/userDAO.php';
class User {
    private $idUser;
    private $name;
    private $password;
    private $dateCreation;
    private $dateLogin;
    private $profile;
    
    public function setIdUser ($idUser){
        $this->idUser = $idUser;
    }
    public function getIdUser(){
        return $this->idUser;
    }
    public function setName ($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function setPassword ($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setDateCreation ($dateCreation){
        $this->dateCreation = $dateCreation;
    }
    public function getDateCreation(){
        return $this->dateCreation;
    }
    public function setDateLogin ($dateLogin){
        $this->dateLogin = $dateLogin;
    }
    public function getDateLogin(){
        return $this->dateLogin;
    }
    public function setProfile(Profile $profile){
        $this->profile = $profile;
    }
    public function getProfile(){
        return $this->profile;
    }
    public function insertUser(){
        $userDAO = new UserDAO();
        return $userDAO->insertUser($this);
    }
    public function listUser(){
        $userDAO = new UserDAO();
        return $userDAO->listUser();
    }
    public function updateUser(){
        $userDAO = new UserDAO();
        return $userDAO->updateUser($this);
    }
    public function getUserById(){
        $userDAO = new UserDAO();
        return $userDAO->getUserById($this);
    }
    public function deleteUser(){
        $userDAO = new UserDAO();
        return $userDAO->deleteUser($this);
    }
    public function notMyProfile(){
        $userDAO = new UserDAO();
        return $userDAO->notMyProfile($this);
    }
}
