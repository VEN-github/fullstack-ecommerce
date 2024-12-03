<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\middlewares\AuthMiddleware;

/**
 * DashboardController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers
 */
class DashboardController extends Controller
{
  public function __construct()
  {
    $this->registerMiddleware(new AuthMiddleware(['index']));
  }

  public function index()
  {
    $this->setLayout('admin');
    $params = [
      'title' => 'Dashboard'
    ];

    return $this->render('admin/dashboard/index', $params);
  }
}
