<?php namespace App\Controllers;

class Api extends BaseController
{
    public function getProducts()
    {
        $productModel = new \App\Models\ProductModel();
        $data['products'] = $productModel->findAll();
        return $this->response->setJSON($data);
    }
}
