<?php

namespace App\Models;

class User {
    private int $id;
    private string $username;
    private string $displayName;
    private string $password;
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

    public function setProfilePicturePath(string $path) {
        $this->profilePicturePath = $path;
    }

    // GETTERS

    public function getUsername() : string {
        return $this->username;
    }

    public function getDisplayName() : string {
        return $this->username;
    }

    public function getPassword() : string {
        return $this->password;
    }

    public function getId() : int {
        return $this->id;
    }

    public function getProfilePicturePath() : string {
        return $this->profilePicturePath;
    }
}