<?php

namespace App\Controller;

use Fragments\Bundle\Controller\AbstractController;
use Fragments\Component\Http\Response;
use Fragments\Component\Session\Session;

class MainController extends AbstractController
{
    public function mainPage(): Response
    {
        $session = new Session();
        $session->start(true);

        return $this->render('main/main_page.php');
    }
}