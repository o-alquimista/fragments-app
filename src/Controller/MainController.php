<?php

namespace App\Controller;

use Fragments\Bundle\Controller\AbstractController;
use Fragments\Bundle\Attribute\Route;
use Fragments\Component\Http\Response;
use App\Repository\ArticleRepository;
use App\Entity\Article;
use Fragments\Component\Http\Exception\HttpException;
use Fragments\Component\Session\Session;
use Fragments\Component\Session\Csrf;
use Fragments\Component\Session\Feedback;

class MainController extends AbstractController
{
    #[Route("/", name: "main_page", methods: ["GET"])]
    public function mainPage(): Response
    {
        $session = new Session();
        $session->start();

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
        $feedback = new Feedback();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($_POST['csrfToken'])) {
                throw new HttpException(403);
            }

            if (false === $csrf->verify('article', $_POST['csrfToken'])) {
                throw new HttpException(403);
            }

            $validForm = true;

            if (empty($_POST['title'])) {
                $feedback->add('warning', 'The title cannot be empty');
                $validForm = false;
            }

            if (empty($_POST['body'])) {
                $feedback->add('warning', 'The body cannot be empty');
                $validForm = false;
            }

            if (empty($_POST['date'])) {
                $feedback->add('warning', 'The date cannot be empty');
                $validForm = false;
            } elseif (empty($_POST['time'])) {
                $feedback->add('warning', 'The time cannot be empty');
                $validForm = false;
            } elseif (false === \DateTime::createFromFormat('Y-m-d', $_POST['date'])) {
                $feedback->add('warning', 'Invalid date format');
                $validForm = false;
            } elseif (false === \DateTime::createFromFormat('H:i', $_POST['time'])) {
                $feedback->add('warning', 'Invalid time format');
                $validForm = false;
            }

            if ($validForm) {
                $article = new Article();
                $article->body = $_POST['body'];
                $article->date = "{$_POST['date']} {$_POST['time']}";
                $article->title = $_POST['title'];

                $repository = new ArticleRepository();
                $articleId = $repository->insert($article);

                $feedback->add('success', 'Article created');

                return $this->redirectToRoute('main_page');
            }
        }

        return $this->render('main/article_insert.php', [
            'csrf' => $csrf
        ]);
    }

    #[Route("/edit/{id}", name: "article_update", methods: ["GET", "POST"])]
    public function articleUpdate(int $id): Response
    {
        $session = new Session();
        $session->start();

        $csrf = new Csrf();

        $repository = new ArticleRepository();
        $article = $repository->getOneById($id);

        if (!$article) {
            return new HttpException(404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //
        }

        return $this->render('main/article_update.php', [
            'article' => $article,
            'csrf' => $csrf
        ]);
    }
}
