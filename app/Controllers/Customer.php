<?php namespace App\Controllers;
use App\Models\CustomerProductModel;
use App\Models\ProductModel;


class Customer extends BaseController

{

    public function dashboard2($param)
    {
        $productId = $this->request->getPost('product_id');
        $productName = $this->request->getPost('product_name');
        $quantity = $this->request->getPost('quantity');
        $price = $this->request->getPost('price');
    
        // Validate quantity
        if ($quantity <= 0) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid quantity. Please enter a valid quantity.']);
        }
    
        // Check product availability
        $productModel = new ProductModel();
        $product = $productModel->find($productId);
    
        if (!$product) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Product not found.']);
        }
    
        if ($product['prod_qty'] < $quantity) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Insufficient quantity available.']);
        }
    
        // Calculate remaining quantity after purchase
        $remainingQuantity = $product['prod_qty'] - $quantity;
    
        // Begin transaction to ensure atomicity
        $db = db_connect();
        $db->transBegin();
    
        try {
            // Update product quantity
            $updated = $productModel->update($productId, ['prod_qty' => $remainingQuantity]);
    
            // Debugging statement
            if ($updated === false) {
                $errors = $productModel->errors();
                throw new \Exception('Failed to update product quantity: ' . json_encode($errors));
            }
    
            // Insert into customer product table
            $customerProductModel = new CustomerProductModel();
            $data = [
                'product_id' => $productId,
                'product_name' => $productName,
                'quantity' => $quantity,
                'price' => $price
            ];
    
            $inserted = $customerProductModel->insert($data);
    
            if (!$inserted) {
                throw new \Exception('Failed to add product to cart.');
            }
    
            // Commit transaction
            $db->transCommit();
    
            return $this->response->setJSON(['status' => 'success', 'message' => 'Product added to cart.']);
        } catch (\Exception $e) {
            // Rollback transaction on error
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
        $customerProducts = $customerProductModel->select('customer_products.id, customer_products.product_id, products.product_name, customer_products.quantity, customer_products.created_at, products.prod_price')
            ->join('products', 'products.id = customer_products.product_id')
            ->findAll();
    
        return $this->response->setJSON($customerProducts);
    }
    




  
}



