<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Middlewares\AuthMiddleware;
use App\Models\Supplier;

/**
 * SupplierController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers\Admin
 */
class SupplierController extends Controller
{
  public function __construct()
  {
    $this->registerMiddleware(new AuthMiddleware(['index']));
  }

  public function index()
  {
    $suppliers = (new Supplier())->get();

    $params = [
      'title' => 'Suppliers',
      'suppliers' => $suppliers
    ];
    $this->setLayout('admin');

    return $this->render('admin/supplier/index', $params);
  }
}
