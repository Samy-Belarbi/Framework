<?php

namespace App\Controllers;

use Library\Core\AbstractController;
use App\Models\User;
use App\Models\UserManager;

class ProfileController extends AbstractController
{
    public function show(): void
    {
        if (isset($_SESSION['user_id'])) {
            $userManager = new UserManager();
            $user = $userManager->findUserById($_SESSION['user_id']);
        } else {
            header('Location:' . url('/'));
            exit();
        }

        if (isset($_POST['username'])) {
            $userEdit = new User();
            $userEdit->setId($_SESSION['user_id']);
            $userEdit->setUsername($_POST['username']);
            $userEdit->setDisplayName($_POST['displayname']);
            $userEdit->setPlainPassword($_POST['password']);
            $userEdit->setPassword(password_hash($_POST['password'], PASSWORD_ARGON2ID));

            if (
                $userEdit->validate()
                && isset($_FILES['picture'])
            ) {

                $size = $_FILES['picture']['size'];

                // Taille en MO
                $size /= (1024 * 1024);

                // Récupération de l'extension
                $extension = explode('/', $_FILES['picture']['type'])[1];

                $extensions = ['png', 'jpeg', 'jpg'];

                if (
                    $_FILES['picture']['error'] !== UPLOAD_ERR_OK
                    || $size > 1
                    || !in_array($extension, $extensions)
                ) {
                    $_SESSION['wrongPicture'] = true;
                    header('Location:' . url('/profile'));
                    exit();
                }

                $fileName = uniqid();

                array_map('unlink', glob('assets/' . $user->getProfilePicturePath()));
                move_uploaded_file($_FILES['picture']['tmp_name'], "assets/img/$fileName.$extension");
                // (unlink la méthode pour supprimer les images)

                $userEdit->setProfilePicturePath("img/$fileName.$extension");

                $userManager = new UserManager();
                $userManager->edit($userEdit);
                
                header('Location:' . url('/profile'));
                exit();
            } else {
                header('Location:' . url('/profile'));
                exit();
            }
        }

        $this->display('profile', ['user' => $user]);
    }
}