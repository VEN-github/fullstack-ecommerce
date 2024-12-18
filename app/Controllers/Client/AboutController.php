<?php

namespace App\Controllers\Client;

use App\Core\Controller;

/**
 * AboutController
 * @author Raven Barrogo <barrogoraven@gmail.com>
 * @package App\Controllers\Client
 */
class AboutController extends Controller
{
    public function index()
    {
        $params = [
            'title' => 'About Us',
        ];

        return $this->render('client/about/index', $params);
    }
}
