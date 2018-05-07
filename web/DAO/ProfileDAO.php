<?php

/**
 * Description of ProfileDAO
 *
 * @Author Pedro Henrique
 */
class ProfileDAO {
    
    public function insertProfile(Profile $profile){
        $query = "INSERT INTO profile (nome) values (?)";
        $insert = $connection->prepare($query);
        $insert->bind_param("s",$profile->name);
        $insert->execute();
        $connection->close();
        return $insert;
    }
    public function listProfile(){
        $query = "SELECT*FROM profile";
        $select = $connection->query($query);
        $connection->close();
        return $select;
    }
    public function getProfileById(Profile $profile){
        $query = "SELECT*FROM profile WHERE idPerfil=?";
        $insert = $connection->prepare($query);
        $insert->bind_param("s",$profile->name);
        $insert->execute();
        $connection->close();
        return $insert;
    }
    public function updateProfile(Profile $profile){
        $query = "UPDATE profile SET nome=? WHERE idPerfil=?";
        $update = $connection->prepare($query);
        $update->bind_param("si",$profile->name,$profile->idProfile);
        $update->execute();
        $connection->close();
        return $update;
    }
    public function deleteById(Profile $profile){
        $query = "DELETE profile WHERE idPerfil= ?";
        $delete = $connection->prepare($query);
        $delete->bind_param("i",$profile->idProfile);
        $delete->execute();
        $connection->close();
        return $delete;
    }
}
