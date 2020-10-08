<?php

namespace App\Controller;

use Fragments\Bundle\Controller\AbstractController;

class MainController extends AbstractController
{
    public function mainPage()
    {
        session_start([
            'read_and_close' => true
        ]);

        $this->renderTemplate(__DIR__ . '/../../templates/main/main_page.php');
    }
}