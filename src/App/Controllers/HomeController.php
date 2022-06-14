<?php

namespace App\Controllers;

use App\Models\UserManager;
use Library\Core\AbstractController;

class HomeController extends AbstractController
{
    public function show(): void
    {

        if (isset($_SESSION['user_id'])) {
            $userManager = new UserManager();
            $user = $userManager->findUserById($_SESSION['user_id']);
        }

        $this->display('homepage', [
            'name' => 'Toto',
            'age' => 42,
            'user' => $user
        ]);

    }
}