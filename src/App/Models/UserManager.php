<?php

namespace App\Models;

use Library\Core\AbstractModel;
use PDO;
use PDOException;

class UserManager extends AbstractModel {

    private PDO $db;

    public function __construct() {
        $this->db = new PDO(
            'mysql:host=127.0.0.1;dbname=BLOG', 'root', ''
        );
    }

    public function insert(User $user) : void {

        try {

            $query = $this->db->prepare('INSERT INTO Users (username, password, display_name, image) VALUES (:username, :password, :displayName, image)');
            $query->execute([
                'username' => $user->getUsername(),
                'password' => $user->getPassword(),
                'displayName' => $user->getDisplayName(),
                'image' => $user->getProfilePicturePath()
            ]);
    
            header('Location: index.php');

        } catch(PDOException $exception) {
            $error = 'Erreur :' . $exception->getMessage();
            echo $error;
        }

    }

}