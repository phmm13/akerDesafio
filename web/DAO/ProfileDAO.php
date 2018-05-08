<?php

/**
 * Description of ProfileDAO
 *
 * @Author Pedro Henrique
 */
class ProfileDAO {

    public function insertProfile(Profile $profile) {
        $query = "INSERT INTO profile (nome) values (?)";
        $insert = $connection->prepare($query);
        $insert->bind_param("s", $profile->getName());
        $insert->execute();
        $connection->close();
        return $insert;
    }

    public function listProfile() {
        global $connection;
        $query = "SELECT*FROM perfil";
        $select = $connection->query($query);
        if ($select) {
            while ($result = $select->fetch_array(MYSQLI_BOTH)) {
                $profile = new Profile();
                $profile->setIdProfile(intval($result["idPerfil"]));
                $profile->setName($result["nome"]);
                $list = array();
                array_push($list,$profile);
            }
            $connection->close();
            return $list;
        } else {
            return false;
        }
    }

    public function getProfileById(Profile $profile) {
        $query = "SELECT*FROM profile WHERE idPerfil=?";
        $insert = $connection->prepare($query);
        $insert->bind_param("s", $profile->getIdProfile());
        $insert->execute();
        if ($result = $insert->fetch_array()) {
            $profile = new Profile();
            $profile->setIdProfile($result["idPerfil"]);
            $profile->setName($result["nome"]);
            $connection->close();
            return $profile;
        } else {
            return false;
        }
    }

    public function updateProfile(Profile $profile) {
        $query = "UPDATE profile SET nome=? WHERE idPerfil=?";
        $update = $connection->prepare($query);
        $update->bind_param("si", $profile->getName(), $profile->getIdProfile());
        $update->execute();
        $connection->close();
        return $update;
    }

    public function deleteById(Profile $profile) {
        $query = "DELETE profile WHERE idPerfil= ?";
        $delete = $connection->prepare($query);
        $delete->bind_param("i", $profile->getIdProfile());
        $delete->execute();
        $connection->close();
        return $delete;
    }

}
