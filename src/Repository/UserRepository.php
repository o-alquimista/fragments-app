<?php

namespace App\Repository;

use Fragments\Component\Storage\PdoConnection;
use App\Entity\User;

class UserRepository
{
    private $pdo;
    
    public function __construct()
    {
        $this->pdo = PdoConnection::getConnection();
    }
    
    public function getUserByUsername(string $username): User
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindValue(':username', $username, \PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        
        if (!$row) {
            throw new \Exception('User not found.');
        }
        
        $user = new User();
        $user->setId($row['id']);
        $user->setUsername($row['username']);
        $user->setPassword($row['password']);
        
        return $user;
    }
}