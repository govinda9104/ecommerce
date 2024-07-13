<?php namespace App\Controllers;
use App\Models\ProductModel;
class Admin extends BaseController
{



    public function dashboard()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->orderBy('id', 'DESC')->findAll();
        
        return view('admin_dashboard', $data);
    }
    public function addProduct()
    {
        return view('add_product');
    }
     public function fetchProducts()
    {
      
        $productModel = new ProductModel();
        $products = $productModel->findAll(); 

        return $this->response->setJSON($products); 
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
    public function products()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();

        return view('admin/products', $data);
    }

    public function editProduct($id)
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->find($id);

        return view('admin/edit_product', $data);
    }

    public function updateProduct($id)
    {
       
        $productModel = new ProductModel();
        $data = [
            'product_name' => $this->request->getPost('product_name'),
             'prod_description' => $this->request->getPost('prod_description'),
             'prod_qty' => $this->request->getPost('prod_qty'),
            'prod_price' => $this->request->getPost('prod_price')
           
           
        ];
     
       $update= $productModel->update($id, $data);
      
       

        return redirect()->to('/admin/dashboard')->with('status', 'Product updated successfully');
    }

    public function deleteProduct($id)
    {
        $productModel = new ProductModel();
        $productModel->delete($id);

        return redirect()->to('/admin/dashboard')->with('status', 'Product deleted successfully');
    }

    public function viewCustomerProducts()
{
    return view('view_customer_products');
}
}
