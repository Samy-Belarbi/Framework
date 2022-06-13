<?php

namespace App\Models;

use Library\Core\AbstractModel;
use PDOException;

class UserManager extends AbstractModel {

    public function insert(User $user) : void {

        try {
            $query = $this->db->execute('INSERT INTO users (username, password, display_name, image) VALUES (:username, :password, :displayName, :image)', [
                'username' => $user->getUsername(),
                'password' => $user->getPassword(),
                'displayName' => $user->getDisplayName(),
                'image' => $user->getProfilePicturePath()
            ]);

        } catch(PDOException $exception) {
            $error = 'Erreur :' . $exception->getMessage();
            echo $error;
        }

    }

}