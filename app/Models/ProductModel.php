<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_name', 'prod_description', 'prod_qty', 'prod_price'];
    public function getAllProducts()
    {
        return $this->findAll(); 
    }
}
