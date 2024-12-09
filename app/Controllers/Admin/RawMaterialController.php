<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Middlewares\AuthMiddleware;
use App\Models\RawMaterial;
use App\Models\Supplier;
use App\Core\Request;
use App\Core\Response;

/**
 * RawMaterialController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers\Admin
 */
class RawMaterialController extends Controller
{
  public function __construct()
  {
    $this->registerMiddleware(new AuthMiddleware(['index']));
    $this->setLayout('admin');
  }

  public function index()
  {
    $raw_materials = (new RawMaterial())->get();

    $params = [
      'title' => 'Raw Materials',
      'raw_materials' => $raw_materials
    ];

    return $this->render('admin/raw_materials/index', $params);
  }

  public function create(Request $request, Response $response)
  {
    $raw_material = new RawMaterial();

    if ($request->isPost()) {
      $raw_material->loadData($request->getBody());

      if ($raw_material->validate() && $raw_material->save()) {
        $response->redirect('/admin/raw-materials');
        return;
      }
    }

    $suppliers = (new Supplier())->get();

    $params = [
      'title' => 'Add New Raw Material',
      'model' => $raw_material,
      'suppliers' => $suppliers
    ];

    return $this->render('admin/raw_materials/create', $params);
  }
}
