<?php

namespace App\Controller;

use Fragments\Bundle\Controller\AbstractController;
use Fragments\Component\Request;
use App\Repository\UserRepository;
use Fragments\Component\SessionManagement\Session;

class SecurityController extends AbstractController
{
    public function login()
    {
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
                $session = new Session();
                $session->regenerate();

                $session->set('user', [
                    'id' => $user->getId(),
                    'username' => $user->getUsername()
                ]);
                
                $request->redirectToRoute('main_page');
            }
            
            // User not found or incorrect password
            $this->addFeedback('warning', 'Invalid credentials.');
        }

        $this->renderTemplate(__DIR__ . '/../../templates/user/login.php');
    }
    
    public function logout()
    {
        $session = new Session();
        $request = new Request();

        $session->destroyAll();
        $request->redirectToRoute('login');
    }
}