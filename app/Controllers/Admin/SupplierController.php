<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Middlewares\AuthMiddleware;
use App\Models\Supplier;
use App\Core\Request;
use App\Core\Response;
use App\Core\Exception\NotFoundException;

/**
 * SupplierController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers\Admin
 */
class SupplierController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['index', 'create', 'edit', 'delete']));
        $this->setLayout('admin');
    }

    public function index()
    {
        $suppliers = (new Supplier())->where(['deleted_at' => 'IS NULL'])->orderBy()->get();

        $params = [
            'title' => 'Suppliers',
            'suppliers' => $suppliers,
        ];

        return $this->render('admin/supplier/index', $params);
    }

    public function create(Request $request, Response $response)
    {
        $supplier = new Supplier();

        if ($request->isPost()) {
            $supplier->loadData($request->getBody());

            if ($supplier->validate() && $supplier->save()) {
                $response->redirect('/admin/suppliers');
                return;
            }
        }

        $params = [
            'title' => 'Add New Supplier',
            'model' => $supplier,
        ];

        return $this->render('admin/supplier/create', $params);
    }

    public function edit(Request $request, Response $response)
    {
        $supplier = new Supplier();
        $id = $request->getRouteParam('id');

        $result = $supplier->where(['id' => $id])->findOne();

        if (!$result) {
            throw new NotFoundException();
        }
        $supplier->loadData($result);

        if ($request->isPost()) {
            $supplier->loadData($request->getBody());

            if ($supplier->validate() && $supplier->update()) {
                $response->redirect('/admin/suppliers');
                return;
            }
        }

        $params = [
            'title' => 'Edit Supplier',
            'model' => $supplier,
        ];

        return $this->render('admin/supplier/edit', $params);
    }

    public function delete(Request $request, Response $response)
    {
        $supplier = new Supplier();
        $id = $request->getRouteParam('id');

        $result = $supplier->where(['id' => $id])->findOne();

        if (!$result) {
            throw new NotFoundException();
        }
        $supplier->loadData($result);

        $supplier->delete();

        $response->redirect('/admin/suppliers');
    }
}
