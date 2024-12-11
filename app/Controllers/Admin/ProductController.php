<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Middlewares\AuthMiddleware;

/**
 * ProductController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers\Admin
 */
class ProductController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['index', 'create', 'edit', 'delete']));
        $this->setLayout('admin');
    }

    public function index()
    {
        $params = [
            'title' => 'Products',
        ];

        return $this->render('admin/products/index', $params);
    }

    public function create()
    {
        $params = [
            'title' => 'Add New Product',
        ];

        return $this->render('admin/products/create', $params);
    }
}
