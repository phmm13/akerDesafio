<?php

/**
 * Description of profile
 *
 * @Author Pedro Henrique
 */
include_once '../DAO/ProfileDAO.php';
class Profile {
    var $idProfile;
    var $name;
    
    public function setIdProfile($idProfile){
        $this->idProfile =  $idProfile;
    }
    public function getIdProfile(){
        return $this->idProfile;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    
    public function getProfileById(){
        $profileDAO = new ProfileDAO();
        return $profileDAO->getProfileById($this);
    }
    public function listProfile(){
        $profileDAO = new ProfileDAO();
        return $profileDAO->listProfile();
    }
    public function insertProfile(){
        $profileDAO = new ProfileDAO();
        return $profileDAO->insertProfile($this);
    }
    public function updateProfile(){
        $profileDAO = new ProfileDAO();
        return $profileDAO->updateProfile($this);
    }
    public function deleteProfile(){
        $profileDAO = new ProfileDAO();
        return $profileDAO->deleteById($this);
    }
}
