<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Exception\NotFoundException;
use App\Core\Middlewares\AuthMiddleware;
use App\Core\Request;
use App\Core\Response;
use App\Models\ProductCategory;

/**
 * ProductCategoryController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers\Admin
 */
class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['index', 'create', 'edit', 'delete']));
        $this->setLayout('admin');
    }

    public function index()
    {
        $categories = (new ProductCategory())
            ->where(['deleted_at' => 'IS NULL'])
            ->orderBy()
            ->get();

        $params = [
            'title' => 'Categories',
            'categories' => $categories,
        ];

        return $this->render('admin/product_categories/index', $params);
    }

    public function create(Request $request, Response $response)
    {
        $category = new ProductCategory();

        if ($request->isPost()) {
            $category->loadData($request->getBody());

            if ($category->validate() && $category->save()) {
                $response->redirect('/admin/products/categories');
                return;
            }
        }

        $params = [
            'title' => 'Add New Category',
            'model' => $category,
        ];

        return $this->render('admin/product_categories/create', $params);
    }

    public function edit(Request $request, Response $response)
    {
        $category = new ProductCategory();
        $id = $request->getRouteParam('id');

        $result = $category->where(['id' => $id])->findOne();

        if (!$result) {
            throw new NotFoundException();
        }
        $category->loadData($result);

        if ($request->isPost()) {
            $category->loadData($request->getBody());

            if ($category->validate() && $category->update()) {
                $response->redirect('/admin/products/categories');
                return;
            }
        }

        $params = [
            'title' => 'Edit Category',
            'model' => $category,
        ];

        return $this->render('admin/product_categories/edit', $params);
    }

    public function delete(Request $request, Response $response)
    {
        $category = new ProductCategory();
        $id = $request->getRouteParam('id');

        $result = $category->where(['id' => $id])->findOne();

        if (!$result) {
            throw new NotFoundException();
        }
        $category->loadData($result);

        $category->delete();

        $response->redirect('/admin/products/categories');
    }
}
