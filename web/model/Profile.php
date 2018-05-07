<?php

/**
 * Description of profile
 *
 * @Author Pedro Henrique
 */
class profile {
    var $idProfile;
    var $name;
    
    public function setIdProfile($idProfile){
        $this->idProfile = $idProfile;
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
        $profileDAO->getProfileById($this->profile);
        return $profileDAO;
    }
}
