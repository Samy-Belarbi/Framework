<?php

namespace App\Controllers;

use Library\Core\AbstractController;

class HomeController extends AbstractController
{
    public function show(): void
    {
        $this->display('homepage', [
            'name' => 'Toto',
            'age' => 42
        ]);
    }
}