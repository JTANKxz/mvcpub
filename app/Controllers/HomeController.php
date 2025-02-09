<?php
namespace App\Controllers;

require_once __DIR__ . '/../core/Controller.php';
use App\Core\Controller;
use App\Models\User;

class HomeController extends Controller
{
  public function index()
  {
    $this->view('home');
  }
}