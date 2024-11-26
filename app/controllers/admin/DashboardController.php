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
    return $this->render('dashboard/index');
  }
}
