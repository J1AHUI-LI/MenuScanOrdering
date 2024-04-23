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
        return view('register');
    }

    public function login()
    {
        return view('login');
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





// class OrderingController extends BaseController
// {
//     public function __construct()
//     {
//         // Load the URL helper, it will be useful in the next steps
//         // Adding this within the __construct() function will make it 
//         // available to all views in the ResumeController
//         helper('url'); 
//     }

//     public function index()
//     {
//         // Check if the user is logged in, if not, redirect to the login page
//         if (!logged_in()) {
//             return redirect()->to('login');
//         }

//         // User is logged in, display the login page
//         return view('login');
//     }

//     public function dashboard()
//     {
//         // Check if the user is logged in, if not, redirect to the login page
//         if (!logged_in()) {
//             return redirect()->to('login');
//         }

//         // User is logged in, display the login page
//         return view('dashboard');
//     }

//     public function menu_management()
//     {
//         // Check if the user is logged in, if not, redirect to the login page
//         if (!logged_in()) {
//             return redirect()->to('login');
//         }

//         // User is logged in, display the login page
//         return view('menu_management');
//     }

//     public function table_management()
//     {
//         // Check if the user is logged in, if not, redirect to the login page
//         if (!logged_in()) {
//             return redirect()->to('login');
//         }

//         // User is logged in, display the login page
//         return view('table_management');
//     }

//     public function order_management()
//     {
//         // Check if the user is logged in, if not, redirect to the login page
//         if (!logged_in()) {
//             return redirect()->to('login');
//         }

//         // User is logged in, display the login page
//         return view('order_management');
//     }

//     public function forgot_password()
//     {
//         // Check if the user is logged in, if not, redirect to the login page
//         if (!logged_in()) {
//             return redirect()->to('login');
//         }

//         // User is logged in, display the login page
//         return view('forgot_password');
//     }

//     public function menu()
//     {
//         // Check if the user is logged in, if not, redirect to the login page
//         if (!logged_in()) {
//             return redirect()->to('login');
//         }

//         // User is logged in, display the login page
//         return view('menu');
//     }

//     public function register()
//     {
//         // Check if the user is logged in, if not, redirect to the login page
//         if (!logged_in()) {
//             return redirect()->to('login');
//         }

//         // User is logged in, display the login page
//         return view('register');
//     }

//     public function qr_code_management()
//     {
//         // Check if the user is logged in, if not, redirect to the login page
//         if (!logged_in()) {
//             return redirect()->to('login');
//         }

//         // User is logged in, display the login page
//         return view('qr_code_management');
//     }
// }