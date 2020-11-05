<?php

namespace App\Controller;

use Fragments\Bundle\Controller\AbstractController;
use App\Repository\UserRepository;
use Fragments\Component\Http\Response;
use Fragments\Component\Http\Request;
use Fragments\Component\Session\Session;

class SecurityController extends AbstractController
{
    public function login(): Response
    {
        $session = new Session();
        $session->start();

        $request = new Request();

        if ($request->server['REQUEST_METHOD'] === 'POST') {
            if (false === $this->isCsrfTokenValid('login', $request->post['_csrf_token'])) {
                return $this->redirectToRoute('login');
            }
            
            $repository = new UserRepository();
            $validUser = true;
            
            try {
                $user = $repository->getUserByUsername($request->post['username']);
            } catch (\Exception $e) {
                $validUser = false;
            }
            
            if ($validUser && password_verify($request->post['password'], $user->getPassword())) {
                $session->regenerate();

                $session->set('user', [
                    'id' => $user->getId(),
                    'username' => $user->getUsername()
                ]);
                
                return $this->redirectToRoute('main_page');
            }
            
            // User not found or incorrect password
            $this->addFeedback('warning', 'Invalid credentials.');
        }

        return $this->render('user/login.php');
    }
    
    public function logout(): Response
    {
        $session = new Session();
        $session->start();

        $session->destroy();

        return $this->redirectToRoute('main_page');
    }
}