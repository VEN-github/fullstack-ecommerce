<?php

namespace App\Controllers\Client;

use App\Core\Controller;

/**
 * HomeController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers
 */
class HomeController extends Controller
{
  public function index()
  {
    return $this->render('home/index');
  }
}
