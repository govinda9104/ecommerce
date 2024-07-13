<?php namespace App\Controllers;

use App\Models\CustomerProductModel;
use App\Models\ProductModel;

class Customer extends BaseController
{
    public function dashboard2($param)
    {
        $userid = session()->get('userid');
        
        $productId = $this->request->getPost('product_id');
        $productName = $this->request->getPost('product_name');
        $quantity = $this->request->getPost('quantity');
        $price = $this->request->getPost('price');
    
        if ($quantity <= 0) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid quantity. Please enter a valid quantity.']);
        }
    
        $productModel = new ProductModel();
        $product = $productModel->find($productId);
    
        if (!$product) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Product not found.']);
        }
    
        if ($product['prod_qty'] < $quantity) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Insufficient quantity available.']);
        }
    
        $remainingQuantity = $product['prod_qty'] - $quantity;
    
        $db = db_connect();
        $db->transBegin();
    
        try {
            $updated = $productModel->update($productId, ['prod_qty' => $remainingQuantity]);
    
            if ($updated === false) {
                $errors = $productModel->errors();
                throw new \Exception('Failed to update product quantity: ' . json_encode($errors));
            }
    
            $customerProductModel = new CustomerProductModel();
            $data = [
                'product_id' => $productId,
                'product_name' => $productName,
                'quantity' => $quantity,
                'price' => $price,
                'customer_id' =>$userid
            ];
    
            $inserted = $customerProductModel->insert($data);
    
            if (!$inserted) {
                throw new \Exception('Failed to add product to cart.');
            }
    
            $db->transCommit();
    
            return $this->response->setJSON(['status' => 'success', 'message' => 'Product added to cart.']);
        } catch (\Exception $e) {
            $db->transRollback();
    
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    
    public function dashboard()
    {
        $productModel = new \App\Models\ProductModel();
        $data['products'] = $productModel->where('prod_qty !=', 0)->findAll();
        return view('customer_dashboard', $data);
    }

    public function getCustomerProducts()
    {
        $customerProductModel = new CustomerProductModel();
        $customerProducts = $customerProductModel->select('user_login_table.name,customer_products.id, customer_products.product_id, products.product_name, customer_products.quantity, customer_products.created_at, products.prod_price,(products.prod_price * customer_products.quantity) as total_price')
            ->join('products', 'products.id = customer_products.product_id')
            ->join('user_login_table', 'user_login_table.id = customer_products.customer_id')
            ->findAll();
    
        return $this->response->setJSON($customerProducts);
    }

    public function vieworders()
    {
        return view('view_orders');
    }

    public function getcustomerorders()
    {
        $userid = session()->get('userid');

        $customerProductModel = new CustomerProductModel();
        $customerProducts = $customerProductModel
            ->select('user_login_table.name, customer_products.id, customer_products.product_id, products.product_name, customer_products.quantity, customer_products.created_at, products.prod_price, (products.prod_price * customer_products.quantity) as total_amount')
            ->join('products', 'products.id = customer_products.product_id')
            ->join('user_login_table', 'user_login_table.id = customer_products.customer_id')
            ->where('customer_products.customer_id', $userid)
            ->findAll();
    
        return $this->response->setJSON($customerProducts);
    }
}
?>
