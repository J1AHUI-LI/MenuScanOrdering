<?php namespace App\Controllers;

use CodeIgniter\Controller;
// 引入 Twilio SDK
use Twilio\Rest\Client;

class OrderingController extends BaseController
{
    public function __construct()
    {
        // Load the URL helper, it will be useful in the next steps
        // Adding this within the __construct() function will make it 
        // available to all views in the ResumeController
        helper('url'); 
    }

    public function index()
    {
        if ($this->request->getMethod() === 'post') {
            // Receive form data
            $username = $this->request->getPost('Username');
            $password = $this->request->getPost('Password');
            $role = $this->request->getPost('Role');
            
            // Validate input (add your validation rules)
            if (empty($username) || empty($password) || empty($role)) {
                // Redirect back to login page with error message
                return redirect()->to(base_url(''))->with('error', 'Please fill in all fields.');
            }

            // Authenticate user (add your authentication logic)
            $userModel = new \App\Models\UserModel();
            $user = $userModel->where('Username', $username)->first();

            if (!$user || !password_verify($password, $user['Password']) || $user['Role'] !== $role) {
                // Authentication failed, redirect back to login page with error message
                return redirect()->to(base_url(''))->with('error', 'Invalid user ID, password, or user type.');
            }

            // Authentication successful, store user data in session
            $session = session();
            $session->set('user_id', $user['UserID']);
            $session->set('user_role', $user['Role']);

            // Redirect to dashboard
            return redirect()->to(base_url('dashboard'));
        }
        return view('login');
    }


    public function dashboard()
    {
        return view('dashboard');
    }

    public function menu_management()
    {
        $menuModel = new \App\Models\MenuModel();
        $data['dishes'] = $menuModel->findAll();

        return view('menu_management', $data);
    }

    public function table_management()
    {
        // 创建一个 TablesModel 实例
        $tablemodel = new \App\Models\TablesModel();
        // 从数据库中获取所有表格信息
        $data['tables'] = $tablemodel->findAll();

        // 将数据传递给视图进行渲染
        return view('table_management', $data);
    }

    public function order_management()
    {
        $orderModel = new \App\Models\OrderModel();
        $data['orders'] = $orderModel->findAll();

        return view('order_management', $data);
    }


    public function forgot_password()
    {
        return view('forgot_password');
    }

    public function menu()
    {
        return view('menu');
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            // Receive form data
            $username = $this->request->getPost('Username');
            $password = $this->request->getPost('Password');
            $confirmPassword = $this->request->getPost('ConfirmPassword');
            $role = $this->request->getPost('Role');

            // Validate input (add your validation rules)
            if (empty($username) || empty($password) || empty($confirmPassword) || empty($role)) {
                // Redirect back to register page with error message
                return redirect()->to(base_url('register'))->with('error', 'Please fill in all fields.');
            }

            if ($password !== $confirmPassword) {
                // Redirect back to register page with error message
                return redirect()->to(base_url('register'))->with('error', 'Passwords do not match.');
            }

            // Create new user (add your user creation logic)
            $userModel = new \App\Models\UserModel();
            $data = [
                'Username' => $username,
                'Password' => password_hash($password, PASSWORD_DEFAULT), // Hash the password
                'Role' => $role, // Add role to the data array
                // Add other fields if needed
            ];
            $userModel->insert($data);

            // Redirect to login page with success message
            return redirect()->to(base_url(''))->with('success', 'Registration successful. You can now log in.');
        }

        return view('register');
    }



    public function check_revenue()
    {
        return view('revenue');
    }
    
    public function qr_code_management()
    {
        $tableModel = new \App\Models\TablesModel();
        $data['Table'] = $tableModel->findAll();
        $data['totalTables'] = count($data['Table']); // 获取 TableID 的总数
        return view('qr_code_management', $data);
    }

}


