<?php

namespace App\Models;

class User {
    private int $id;
    private string $username;
    private string $displayName;
    private string $password;
    private string $plainPassword;
    private string $profilePicturePath;

    // SETTERS

    public function setId(int $id) {
        $this->id = $id;
    }

    public function setUsername(string $username) {
        $this->username = $username;
    }

    public function setDisplayName(string $displayName) {
        $this->displayName = $displayName;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }

    public function setPlainPassword(string $password) {
        $this->plainPassword = $password;
    }

    public function setProfilePicturePath(string $path) {
        $this->profilePicturePath = $path;
    }

    // GETTERS

    public function getUsername() : string {
        return $this->username;
    }

    public function getDisplayName() : string {
        return $this->displayName;
    }

    public function getPassword() : string {
        return $this->password;
    }

    public function getPlainPassword() : string {
        return $this->plainPassword;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getProfilePicturePath() : string {
        return $this->profilePicturePath;
    }

    // VALIDATION 

    public function validate(): bool
    {
        $validation = true;

        if (strlen($this->username) < 5) {
            $_SESSION['wrongUsername'] = true;
            $validation = false;
        }

        if (strlen($this->displayName) < 5) {
            $_SESSION['wrongDisplayname'] = true;
            $validation = false;
        }

        if (strlen($this->plainPassword) < 8) {
            $_SESSION['wrongPassword'] = true;
            $validation = false;
        }
        
        return $validation;

    }
}