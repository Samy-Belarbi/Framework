<?php

namespace App\Controllers;

use Library\Core\AbstractController;

class LoginController extends AbstractController
{
    public function show(): void
    {
        $this->display('homepage', [

        ]);
    }
}