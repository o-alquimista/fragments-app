<?php

namespace App\Repository;

use Fragments\Component\PdoConnection;
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
        $params = [];

        $query = "SELECT * FROM user WHERE username = :username";
        $params[':username'] = $username;
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
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