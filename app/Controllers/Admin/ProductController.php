<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Middlewares\AuthMiddleware;
use App\Models\Product;
use App\Models\ProductCategory;

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
        $product = new Product();
        $categories = (new ProductCategory())
            ->where(['deleted_at' => 'IS NULL'])
            ->orderBy('name', 'ASC')
            ->get();

        $params = [
            'title' => 'Add New Product',
            'model' => $product,
            'categories' => $categories,
        ];

        return $this->render('admin/products/create', $params);
    }
}
