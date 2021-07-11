<?php

namespace App\Controller;

use Fragments\Bundle\Controller\AbstractController;
use Fragments\Bundle\Attribute\Route;
use Fragments\Component\Http\Response;

class MyController extends AbstractController
{
    #[Route("/", name: "main_page", methods: ["GET"])]
    public function mainPage(): Response
    {
        return $this->render('main/main_page.php');
    }
}
