<?php

namespace App\Controllers;

use Library\Core\AbstractController;
use App\Models\User;
use App\Models\UserManager;

class LoginController extends AbstractController
{
    public function show(): void
    {

        if (isset($_POST['username'])) {
            $user = new User();
            $user->setUsername($_POST['username']);
            $user->setPlainPassword($_POST['password']);

            $userManager = new UserManager();
            $data = $userManager->findUser($user);

            if ($userManager->findUser($user)) {

                $user->setId($data[0]['id']);

                if (password_verify($user->getPlainPassword(), $data[0]['password'])) {

                    $_SESSION['user_id'] = $user->getId();
                    header('Location:' . url('/login'));
                    exit();

                } else {
                    $_SESSION['wrongPassword'] = true;
                    header('Location:' . url('/login'));
                    exit();
                }   

                
            };

        }

        $this->display('login', []);
    }
}