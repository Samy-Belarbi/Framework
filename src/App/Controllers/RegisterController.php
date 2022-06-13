<?php

namespace App\Controllers;

use Library\Core\AbstractController;
use App\Models\User;
use App\Models\UserManager;

class RegisterController extends AbstractController
{
    public function show(): void
    {

        if (isset($_POST['username'])) {
            $user = new User();
            $user->setUsername($_POST['username']);
            $user->setDisplayName($_POST['displayname']);
            $user->setPlainPassword($_POST['password']);
            $user->setPassword(password_hash($_POST['password'], PASSWORD_ARGON2ID));

            if (
                $user->validate()
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
                    header('Location:' . url('/register'));
                    exit();
                }

                $fileName = uniqid();

                move_uploaded_file($_FILES['picture']['tmp_name'], "assets/img/$fileName.$extension");
                // (unlink la méthode pour supprimer les images)

                $user->setProfilePicturePath("img/$fileName.$extension");

                $userManager = new UserManager();
                $userManager->insert($user);

                header('Location:' . url('/'));
                exit();
            } else {
                header('Location:' . url('/register'));
                exit();
            }
        }

        $this->display('register', []);
    }
}
