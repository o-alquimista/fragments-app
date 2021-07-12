<?php

namespace App\Controller;

use Fragments\Bundle\Controller\AbstractController;
use Fragments\Bundle\Attribute\Route;
use Fragments\Component\Http\Response;
use App\Repository\ArticleRepository;
use Fragments\Component\Session\Session;
use Fragments\Component\Session\Csrf;

class MainController extends AbstractController
{
    #[Route("/", name: "main_page", methods: ["GET"])]
    public function mainPage(): Response
    {
        $repository = new ArticleRepository();
        $articles = $repository->getAll();

        return $this->render('main/main_page.php', [
            'articles' => $articles
        ]);
    }

    #[Route("/new", name: "article_insert", methods: ["GET", "POST"])]
    public function articleInsert(): Response
    {
        $session = new Session();
        $session->start();

        $csrf = new Csrf();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //
        }

        return $this->render('main/article_insert.php', [
            'csrf' => $csrf
        ]);
    }
}
