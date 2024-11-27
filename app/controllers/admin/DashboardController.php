<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

/**
 * DashboardController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers
 */
class DashboardController extends Controller
{
  public function index()
  {
    $this->setLayout('admin');
    $params = [
      'title' => 'Dashboard'
    ];

    return $this->render('admin/dashboard/index', $params);
  }
}
