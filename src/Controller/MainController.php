<?php

namespace App\Controller;

use Fragments\Bundle\Controller\AbstractController;

class MainController extends AbstractController
{
    public function mainPage()
    {
        $this->renderTemplate(__DIR__ . '/../../templates/main/main_page.php');
    }
}