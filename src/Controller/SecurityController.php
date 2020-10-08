<?php

namespace App\Controller;

use Fragments\Bundle\Controller\AbstractController;
use Fragments\Component\Request;
use App\Repository\UserRepository;

class SecurityController extends AbstractController
{
    public function login()
    {
        session_start();
        $request = new Request();

        if ($this->isFormSubmitted()) {
            if (!$this->isCsrfTokenValid('login', $_POST['_csrf_token'])) {
                $request->redirectToRoute('login');
            }
            
            $repository = new UserRepository();
            $validUser = true;
            
            try {
                $user = $repository->getUserByUsername($_POST['username']);
            } catch (\Exception $e) {
                $validUser = false;
            }
            
            if ($validUser && password_verify($_POST['password'], $user->getPassword())) {
                session_regenerate_id();

                $_SESSION['user'] = [
                    'id' => $user->getId(),
                    'username' => $user->getUsername()
                ];
                
                $request->redirectToRoute('main_page');
            }
            
            // User not found or incorrect password
            $this->addFeedback('warning', 'Invalid credentials.');
        }

        $this->renderTemplate(__DIR__ . '/../../templates/user/login.php');
    }
    
    public function logout()
    {
        $request = new Request();

        $_SESSION = [];
        $request->redirectToRoute('login');
    }
}