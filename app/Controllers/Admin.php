<?php namespace App\Controllers;
use App\Models\ProductModel;
class Admin extends BaseController
{



    public function dashboard()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->getAllProducts(); // Fetch all products from database

        return view('admin_dashboard', $data); // Pass data to the view
    }
    public function addProduct()
    {
        return view('add_product');
    }

    public function saveProduct()
    {
        $productModel = new ProductModel();
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'prod_description' => $this->request->getPost('prod_description'),
            'prod_qty' => $this->request->getPost('prod_qty'),
            'prod_price' => $this->request->getPost('prod_price'),
        ];
        $productModel->insert($data);
        return redirect()->to('/admin/dashboard');
    }

    public function viewCustomerProducts()
{
    return view('view_customer_products');
}
}
