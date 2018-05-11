<?php

/**
 * Description of ProfileDAO
 *
 * @Author Pedro Henrique
 */
class ProfileDAO {

    public function insertProfile(Profile $profile) {
        global $connection;
        $query = "INSERT INTO perfil (nome) values (?)";
        $insert = $connection->prepare($query);
        $insert->bind_param("s", $profile->getName());
        $insert->execute();
        $insert->close();
        $connection->close();
        return $insert;
    }

    public function listProfile() {
        global $connection;
        $query = "SELECT*FROM perfil";
        $select = $connection->query($query);
        if ($select) {
            $list = array();
            while ($result = $select->fetch_assoc()) {
                $profile = new Profile();
                $profile->setIdProfile(intval($result["idPerfil"]));
                $profile->setName($result["nome"]);
                
                array_push($list,$profile);
            }
            $connection->close();
            return $list;
        } else {
            return false;
        }
    }

    public function getProfileById(Profile $profile) {
        global $connection;
        $query = "SELECT * FROM perfil WHERE idPerfil=?";
        var_dump($profile);
        if($select = $connection->prepare($query)){
            
        }else{
            $error = $connection->errno . ' ' . $connection->error;
            echo $error;
        }
        $select->bind_param("i", intval($profile->getIdProfile()));
        if ($select->execute()) {
            $select->bind_result($idProfile,$nameProfile);
            $select->fetch();
            $profileOBJ = new Profile();
            $profileOBJ->setIdProfile($idProfile);
            $profileOBJ->setName($nameProfile);
            $select->close();
            return $profileOBJ;
        } else {
            return false;
        }
    }

    public function updateProfile(Profile $profile) {
        global $connection;
        $query = "UPDATE perfil SET nome=? WHERE idPerfil=?";
        $update = $connection->prepare($query);
        $update->bind_param("si", $profile->getName(), $profile->getIdProfile());
        $update->execute();
        $update->close();
        $connection->close();
        return $update;
    }

    public function deleteById(Profile $profile) {
        global $connection;
        $query = "DELETE perfil WHERE idPerfil= ?";
        $delete = $connection->prepare($query);
        $delete->bind_param("i", $profile->getIdProfile());
        $delete->execute();
        $delete->close();
        $connection->close();
        return $delete;
    }

}
