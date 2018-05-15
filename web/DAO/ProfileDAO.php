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
            $select->close();
            return $list;
        } else {
            return false;
        }
    }

    public function getProfileById(Profile $profile) {
        global $connection;
        $query = "SELECT * FROM perfil WHERE idPerfil=?";
        $select = $connection->prepare($query);

        $idProfile = $profile->getIdProfile();
        $nameProfile = "";
        $select->bind_param("i", $idProfile);
        $select->execute();
        $select->bind_result($idProfile,$nameProfile);
        if ($idProfile) {
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
        
        return $update;
    }

    public function deleteById(Profile $profile) {
        global $connection;
        $query = "DELETE FROM perfil WHERE idPerfil= ?";
        $delete = $connection->prepare($query);
        $delete->bind_param("i", $profile->getIdProfile());
        $delete->execute();
        $numRows = $delete->affected_rows;
        $delete->close();
        
        return $numRows;
    }

}
