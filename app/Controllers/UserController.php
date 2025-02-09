<?php

namespace App\Controllers;

require_once __DIR__ . '/../core/Controller.php';
use App\Core\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $userModel = new User();
        $users = $userModel->all();
        $this->view('dashboard/users/index', ['users' => $users], [
        'title' => 'Usuarios'
    ]);
    }

    public function create()
    {
        $this->view('dashboard/users/create');
    }

    public function store()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new User();
        $userModel->create($name, $email, $password);

        $_SESSION['success'] = 'Usuário criado com sucesso!';
        $this->redirect('/dashboard/users');
    }

    public function edit($id)
    {
        $userModel = new User();
        $user = $userModel->findById($id);
        
        if (!$user) {
            $_SESSION['error'] = 'Usuário não encontrado';
            $this->redirect('/dashboard/users');
        }

        $this->view('dashboard/users/edit', ['user' => $user]);
    }

    public function update($id)
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new User();
        $userModel->update($id, $name, $email, $password);

        $_SESSION['success'] = 'Usuário atualizado com sucesso!';
        $this->redirect('/dashboard/users');
    }

    public function delete($id)
    {
        $userModel = new User();
        $userModel->delete($id);

        $_SESSION['success'] = 'Usuário removido com sucesso!';
        $this->redirect('/dashboard/users');
    }
}