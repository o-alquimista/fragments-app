<?php

namespace App\Repository;

use Fragments\Component\Storage\PdoConnection;
use App\Entity\Article;
use PDO;

class ArticleRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = PdoConnection::getConnection();
    }

    public function insert(Article $article): int
    {
        $stmt = $this->pdo->prepare("INSERT INTO article (title, body, date) VALUES (:title, :body, :date)");
        $stmt->bindValue(':title', $article->title, PDO::PARAM_STR);
        $stmt->bindValue(':body', $article->body, PDO::PARAM_STR);
        $stmt->bindValue(':date', $article->date, PDO::PARAM_STR);
        $stmt->execute();

        return (int) $this->pdo->lastInsertId();
    }

    public function update(Article $article): bool
    {
        $stmt = $this->pdo->prepare("UPDATE article SET title = :title, body = :body, date = :date WHERE id = :id");
        $stmt->bindValue(':id', $article->id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $article->title, PDO::PARAM_STR);
        $stmt->bindValue(':body', $article->body, PDO::PARAM_STR);
        $stmt->bindValue(':date', $article->date, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete(Article $article)
    {
        $this->pdo->exec("DELETE FROM article WHERE id = {$article->id}");
    }

    public function getOneById(int $id): ?Article
    {
        $stmt = $this->pdo->query("SELECT * FROM article WHERE id = {$id}");
        $article = $stmt->fetchObject(Article::class);

        if (!$article) {
            return null;
        }

        return $article;
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM article");
        $articles = $stmt->fetchAll(PDO::FETCH_CLASS, Article::class);

        return $articles;
    }
}