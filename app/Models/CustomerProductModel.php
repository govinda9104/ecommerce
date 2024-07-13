<?php


namespace App\Models;

use CodeIgniter\Model;

class CustomerProductModel extends Model
{
    protected $table = 'customer_products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'product_id', 'quantity', 'created_at', 'updated_at'];

    
    public function getCustomerProducts()
    {
        return $this->findAll(); 
    }
}

?>