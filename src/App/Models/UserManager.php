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

    public function edit(User $user) : void {

        try {
            $query = $this->db->execute('UPDATE users SET username = :username, password = :password, display_name = :displayname, image = :image WHERE id = :id', [
                'username' => $user->getUsername(),
                'password' => $user->getPassword(),
                'displayname' => $user->getDisplayName(),
                'image' => $user->getProfilePicturePath(),
                'id' => $user->getId()
            ]);

        } catch(PDOException $exception) {
            $error = 'Erreur :' . $exception->getMessage();
            echo $error;
        }

    }

    public function findUser(User $user) : array {
        $query = $this->db->getResults('SELECT * FROM users WHERE username = :username', [
            'username' => $user->getUsername()
        ]);

        return $query;
    }

    public function findUserById(int $id) : User {
        $data = $this->db->getResults('SELECT * FROM users WHERE id = :id', [
            'id' => $id
        ]);

        $user = new User();
        $user->setUsername($data[0]['username']);
        $user->setDisplayName($data[0]['display_name']);
        $user->setProfilePicturePath($data[0]['image']);
        
        return $user;
    }
}