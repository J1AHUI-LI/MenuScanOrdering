<?php namespace App\Controllers;

use CodeIgniter\Controller;

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
        // 获取传递的table_id参数
        $tableID = $this->request->getGet('table_id');

        // 将table_id保存到session中
        if ($tableID) {
            session()->set('table_id', $tableID);
        }

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

            // Redirect to dashboard or menu based on user role
            if ($role === 'User') {
                return redirect()->to(base_url('menu'));
            } else {
                return redirect()->to(base_url('dashboard'));
            }
        }
        return view('login');
    }



    public function logout()
    {
        // Check if user is logged in
        if (!session()->has('user_id')) {
            // If user is not logged in, do nothing
            return redirect()->to(base_url(''));
        }

        // Destroy the session
        $session = session();
        $session->destroy();

        // Redirect to login page
        return redirect()->to(base_url(''));
    }



    public function dashboard()
    {
        $vendorModel = new \App\Models\VendorModel();
        $data['vendors'] = $vendorModel->findAll();

        $menuModel = new \App\Models\MenuModel();
        $data['dishes'] = $menuModel->findAll();

        return view('dashboard', $data);
    }

    public function menu_management()
    {
        $vendorModel = new \App\Models\VendorModel();
        $data['vendors'] = $vendorModel->findAll();

        $menuModel = new \App\Models\MenuModel();
        $data['dishes'] = $menuModel->findAll();

        return view('menu_management', $data);
    }

    public function edit_dish($menuId)
    {
        $menuModel = new \App\Models\MenuModel();
        $data['dishes'] = $menuModel->findAll();
        $data['editDishId'] = $menuId;

        return view('menu_management', $data);
    }


    public function update_dish($menuId)
    {
        $menuModel = new \App\Models\MenuModel();

        $data = [
            'ItemName' => $this->request->getPost('dishName'),
            'Price' => $this->request->getPost('dishPrice'),
            // Add other fields if needed
        ];

        $menuModel->update($menuId, $data);

        return redirect()->to(base_url('menu_management'));
    }

    public function delete_dish($menuId)
    {
        $menuModel = new \App\Models\MenuModel();
        $menuModel->delete($menuId);

        return redirect()->to(base_url('menu_management'));
    }

    public function add_dish()
    {
        $menuModel = new \App\Models\MenuModel();

        $data = [
            'VendorID'=> $this->request->getPost('vendorId'),
            'ItemName' => $this->request->getPost('dishName'),
            'Price' => $this->request->getPost('dishPrice'),
            // Add other fields if needed
        ];

        $menuModel->insert($data);

        return redirect()->to(base_url('menu_management'));
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

    public function edit_table($tableId)
    {
        if ($this->request->getMethod() === 'post') {
            $tableModel = new \App\Models\TablesModel();
            $status = $this->request->getPost('Status');

            // Validate status and set default if invalid
            $validStatus = ['Available', 'Occupied', 'Reserved'];
            if (!in_array($status, $validStatus)) {
                $status = 'Available'; // Set default value
                session()->setFlashdata('warning', 'Invalid status. Defaulted to "Available".');
            }

            $data = [
                'Status' => $status,
                // Update other fields if needed
            ];
            $tableModel->update($tableId, $data);

            session()->setFlashdata('message', 'Table updated successfully');
        }

        return redirect()->to(base_url('table_management'));
    }

    public function add_table()
    {
        if ($this->request->getMethod() === 'post') {
            $tableModel = new \App\Models\TablesModel();
            $vendorModel = new \App\Models\VendorModel();

            $data = [
                'VendorID' => $this->request->getPost('vendorId'),
                'Seats' => $this->request->getPost('seats'),
                'Status' => $this->request->getPost('status'),
                // Add other fields if needed
            ];
            $tableModel->insert($data);

            // Update TotalTable in Vendor table
            $vendorId = $this->request->getPost('vendorId');
            $vendor = $vendorModel->find($vendorId);
            $vendorModel->update($vendorId, ['TotalTable' => $vendor['TotalTable'] + 1]);

            session()->setFlashdata('message', 'Table added successfully');
        }

        return redirect()->to(base_url('table_management'));
    }


    public function delete_table($tableId)
    {
        $tableModel = new \App\Models\TablesModel();
        $vendorModel = new \App\Models\VendorModel();

        // Get the VendorID of the table
        $table = $tableModel->find($tableId);
        $vendorId = $table['VendorID'];

        $tableModel->delete($tableId);

        // Update TotalTable in Vendor table
        $vendor = $vendorModel->find($vendorId);
        $vendorModel->update($vendorId, ['TotalTable' => $vendor['TotalTable'] - 1]);

        session()->setFlashdata('message', 'Table deleted successfully');
        return redirect()->to(base_url('table_management'));
    }

    public function order_management()
    {
        $orderModel = new \App\Models\OrderModel();
        $data['orders'] = $orderModel->findAll();

        return view('order_management', $data);
    }

    public function complete_order($orderId)
    {
        $orderModel = new \App\Models\OrderModel();
        $orderModel->update($orderId, ['Status' => 'Complete']);
        
        session()->setFlashdata('message', 'Order Complete successfully');
        return redirect()->to(base_url('order_management'));
    }

    public function cancel_order($orderId)
    {
        $orderModel = new \App\Models\OrderModel();
        $orderModel->update($orderId, ['Status' => 'Cancelled']);

        session()->setFlashdata('message', 'Order cancelled successfully');
        return redirect()->to(base_url('order_management'));
    }

    public function view_order_details($orderId)
    {
        $orderModel = new \App\Models\OrderModel();
        $orderModel->update($orderId, ['OrderTime' => date('Y-m-d H:i:s')]);

        $data['orders'] = $orderModel->findAll();

        return view('order_management', $data);
    }

    public function menu()
    {
        return view('menu');
    }

    public function menu_forordering()
    {
        $vendorModel = new \App\Models\VendorModel();
        $data['vendors'] = $vendorModel->findAll();

        $menuModel = new \App\Models\MenuModel();
        $data['dishes'] = $menuModel->findAll();

        return view('menu_forordering', $data);
    }

    public function cart()
    {
        $cart = session()->get('cart', []);

        return view('cart');
    }

    public function addToCart()
    {
        if ($this->request->getMethod() === 'post') {
            $itemName = $this->request->getVar('ItemName');
            $price = $this->request->getVar('Price');
            $vendorId = $this->request->getVar('VendorID');

            $cart = session()->get('cart', []);
            $cartItem = [
                'itemName' => $itemName,
                'price' => $price,
                'vendorId' => $vendorId
            ];
            $cart[] = $cartItem;
            session()->set('cart', $cart);

            return redirect()->to(base_url('cart')); // Redirect to cart page
        }
        return redirect()->to(base_url('menu'));
    }

    public function removeFromCart()
    {
        if ($this->request->getMethod() === 'post') {
            $index = $this->request->getVar('index');

            $cart = session()->get('cart', []);
            if (isset($cart[$index])) {
                unset($cart[$index]);
                session()->set('cart', $cart);
            }

            return redirect()->to(base_url('cart')); // Redirect back to cart page
        }
        return redirect()->to(base_url('menu'));
    }

    public function submitOrder()
    {
        $orderModel = new \App\Models\OrderModel(); // 直接实例化OrderModel

        // 获取当前用户的ID和table_id
        $userID = session()->get('user_id');
        $tableID = session()->get('table_id');

        if (!$userID || !$tableID) {
            // 如果无法获取用户ID或table_id，显示提示信息并重定向到菜单页面
            echo '<script>alert("Please scan QR code before ordering. (You can use admin account login to find QR code");</script>';
            return redirect()->to(base_url('menu'));
        }

        // 获取购物车中的商品信息
        $cart = session()->get('cart', []);

        // 插入订单信息到订单表中
        $data = [
            'UserID' => $userID,
            'TableID' => $tableID, // 将table_id也保存到订单中
            'Status' => 'Pending', // 假设初始状态为待处理
            'OrderTime' => date('Y-m-d H:i:s'), // 当前时间
        ];
        $orderModel->insert($data); // 使用模型插入数据
        $orderID = $orderModel->insertID(); // 获取刚插入的订单的ID

        // 清空购物车
        session()->remove('cart');

        // 提示订单提交成功或重定向到菜单页面
        $session = session();
        $session->setFlashdata('order_success_message', 'Order submitted successfully.');
        return redirect()->to(base_url('menu'));
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
    
    public function user_management()
    {
        $userModel = new \App\Models\UserModel();
        $data['users'] = $userModel->findAll(); // 获取所有用户信息

        return view('user_management', $data); // 加载用户管理页面，并传递用户信息数组到视图中
    }

    // 编辑用户信息
    public function edit_user($userID)
    {
        $userModel = new \App\Models\UserModel();

        // 从表单中获取用户输入的新信息
        $newUserData = [
            'Role' => $this->request->getPost('Role'),
        ];

        // 更新用户信息
        $userModel->update($userID, $newUserData);

        // 重定向到用户管理页面
        return redirect()->to(base_url('user_management'));
    }

    // 删除用户
    public function delete_user($userID)
    {
        $userModel = new \App\Models\UserModel();

        // 删除指定用户
        $userModel->delete($userID);

        // 重定向到用户管理页面
        return redirect()->to(base_url('user_management'));
    }


    public function add_user()
    {
        $password = $this->request->getPost('Password');

        $userData = [
            'FirstName' => $this->request->getPost('FirstName'),
            'LastName' => $this->request->getPost('LastName'),
            'Role' => $this->request->getPost('Role'),
            'Phone' => $this->request->getPost('Phone'),
            'Address' => $this->request->getPost('Address'),
            'Password' => password_hash($password, PASSWORD_DEFAULT),
            'Username' => $this->request->getPost('Email'), 
        ];

        // 将数据插入数据库
        $userModel = new \App\Models\UserModel();
        $userModel->insert($userData);

        // 重定向到用户管理页面
        return redirect()->to(base_url('user_management'));
    }

    public function qr_code_management()
    {
        $tableModel = new \App\Models\TablesModel();
        $data['Table'] = $tableModel->findAll();
        $data['totalTables'] = count($data['Table']);
        return view('qr_code_management', $data);
    }

}


