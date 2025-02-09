<?php

namespace App\Controllers;

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../Models/User.php';

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
  private $userModel;
  
  public function __construct() {
    $this->userModel = new User();
  }
  public function showLoginForm()
  {
    $this->view('auth/login');
  }

  public function login()
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = $this->userModel->find($email);
    if ($user && password_verify($password, $user['password'])) {
      $_SESSION['user'] = $user;
      $this->redirect('/dashboard');
    } else {
      $_SESSION['error'] = 'Credenciais inválidas';
      $this->redirect('/login');
    }
  }

    public function showRegisterForm()
    {
        $this->view('auth/register');
    }

    public function register()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($this->userModel->find($email)) {
            $_SESSION['error'] = 'Email já cadastrado';
            $this->redirect('/register');
        }

        $this->userModel->create($name, $email, $password);
        $_SESSION['success'] = 'Registro realizado com sucesso!';
        $this->redirect('/login');
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/');
    }
}