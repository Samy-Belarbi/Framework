<?php

namespace App\Controllers;

use Library\Core\AbstractController;

class RegisterController extends AbstractController
{
    public function show(): void
    {
        $this->display('register', [

        ]);
    }
}