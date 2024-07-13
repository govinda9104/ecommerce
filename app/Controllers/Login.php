<?php namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
    public function admin()
    {
        return view('admin_login');
    }

    public function customer()
    {
        return view('customer_login');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Validate the user against the database
        $userModel = new UserModel();
        $user = $userModel->where(['name' => $username, 'password' => $password])->first();
       

        if (!empty($user)) {
            if ($user['role'] == 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/customer/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid login details');
        }
    }

}
