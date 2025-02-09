<?php
namespace App\Controllers;

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../Models/User.php';

use App\Core\Controller;
use App\Models\User;

class DashboardController extends Controller
{
  public function index()
  {
    $this->view('dashboard/index', [
        'title' => 'Dashboard'
    ]);
  }
}