<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user_login_table';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'password', 'role'];
}
