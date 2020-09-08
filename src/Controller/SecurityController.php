<?php

namespace App\Controller;

use Fragments\Bundle\Controller\AbstractController;

class SecurityController extends AbstractController
{
    public function authenticate()
    {
        $this->renderTemplate(__DIR__ . '/../../templates/user/login.php');
    }
}