<?php

namespace App\Controllers\Client;

use App\Core\Controller;

/**
 * AboutController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers
 */
class AboutController extends Controller
{
  public function index()
  {
    return $this->render('client/about/index');
  }
}
