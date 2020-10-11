<?php

namespace App\Controller;

use Fragments\Bundle\Controller\AbstractController;
use Fragments\Component\Http\Response;

class MainController extends AbstractController
{
    public function mainPage(): Response
    {
        session_start([
            'read_and_close' => true
        ]);

        return $this->render('main/main_page.php');
    }
}