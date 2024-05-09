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
        $tableID = $this->request->getGet('table_id');

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



    /**
     * Displays the dashboard with vendor and dish information.
     *
     * @return mixed
     */
    public function dashboard()
    {
        // Retrieve vendor and dish information
        $vendorModel = new \App\Models\VendorModel();
        $data['vendors'] = $vendorModel->findAll();

        $menuModel = new \App\Models\MenuModel();
        $data['dishes'] = $menuModel->findAll();

        return view('dashboard', $data);
    }

    /**
     * Displays the menu management page with vendor and dish information.
     *
     * @return mixed
     */
    public function menu_management()
    {
        // Retrieve vendor and dish information
        $vendorModel = new \App\Models\VendorModel();
        $data['vendors'] = $vendorModel->findAll();

        $menuModel = new \App\Models\MenuModel();
        $data['dishes'] = $menuModel->findAll();

        return view('menu_management', $data);
    }

    /**
     * Displays the edit dish form for a specific dish.
     *
     * @param int $menuId The ID of the dish to edit
     * @return mixed
     */
    public function edit_dish($menuId)
    {
        $menuModel = new \App\Models\MenuModel();
        $data['dishes'] = $menuModel->findAll();
        $data['editDishId'] = $menuId;

        return view('menu_management', $data);
    }

    /**
     * Updates the details of a specific dish.
     *
     * @param int $menuId The ID of the dish to update
     * @return mixed
     */
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

    /**
     * Deletes a specific dish.
     *
     * @param int $menuId The ID of the dish to delete
     * @return mixed
     */
    public function delete_dish($menuId)
    {
        $menuModel = new \App\Models\MenuModel();
        $menuModel->delete($menuId);

        return redirect()->to(base_url('menu_management'));
    }

    /**
     * Adds a new dish to the menu.
     *
     * @return mixed
     */
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

    /**
     * Displays the table management page with all table information.
     *
     * @return mixed
     */
    public function table_management()
    {
        // Create an instance of TablesModel
        $tablemodel = new \App\Models\TablesModel();
        // Retrieve all table information from the database
        $data['tables'] = $tablemodel->findAll();

        // Pass the data to the view for rendering
        return view('table_management', $data);
    }

    /**
     * Edits the status of a specific table.
     *
     * @param int $tableId The ID of the table to edit
     * @return mixed
     */
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

    /**
     * Adds a new table to the system.
     *
     * @return mixed
     */
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

    /**
     * Deletes a specific table from the system.
     *
     * @param int $tableId The ID of the table to delete
     * @return mixed
     */
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

    /**
     * Displays the order management page with all order information.
     *
     * @return mixed
     */
    public function order_management()
    {
        $orderModel = new \App\Models\OrderModel();
        $data['orders'] = $orderModel->findAll();

        return view('order_management', $data);
    }

    /**
     * Marks a specific order as complete.
     *
     * @param int $orderId The ID of the order to mark as complete
     * @return mixed
     */
    public function complete_order($orderId)
    {
        $orderModel = new \App\Models\OrderModel();
        $orderModel->update($orderId, ['Status' => 'Complete']);
        
        session()->setFlashdata('message', 'Order Complete successfully');
        return redirect()->to(base_url('order_management'));
    }

    /**
     * Cancels a specific order.
     *
     * @param int $orderId The ID of the order to cancel
     * @return mixed
     */
    public function cancel_order($orderId)
    {
        $orderModel = new \App\Models\OrderModel();
        $orderModel->update($orderId, ['Status' => 'Cancelled']);

        session()->setFlashdata('message', 'Order cancelled successfully');
        return redirect()->to(base_url('order_management'));
    }

    /**
     * Displays the details of a specific order.
     *
     * @param int $orderId The ID of the order to view
     * @return mixed
     */
    public function view_order_details($orderId)
    {
        $orderModel = new \App\Models\OrderModel();
        $order = $orderModel->find($orderId);

        if (!$order) {
            // Handle case where order is not found
            // For example, redirect to an error page
            return redirect()->to(base_url('error'));
        }

        // Get the MenuIDs from the order and split them into an array
        $menuIDs = explode(',', $order['MenuIDs']);

        // Get the menu items corresponding to the MenuIDs
        $menuModel = new \App\Models\MenuModel();
        $menuItems = [];
        foreach ($menuIDs as $menuID) {
            $menuItem = $menuModel->find($menuID);
            if ($menuItem) {
                $menuItems[] = $menuItem;
            }
        }

        $data['order'] = $order;
        $data['menuItems'] = $menuItems;

        return view('order_details', $data);
    }




    /**
     * Displays the menu page.
     *
     * @return mixed
     */
    public function menu()
    {
        return view('menu');
    }

    /**
     * Displays the menu for ordering with vendor and dish information.
     *
     * @return mixed
     */
    public function menu_forordering()
    {
        $vendorModel = new \App\Models\VendorModel();
        $data['vendors'] = $vendorModel->findAll();

        $menuModel = new \App\Models\MenuModel();
        $data['dishes'] = $menuModel->findAll();

        return view('menu_forordering', $data);
    }

    /**
     * Displays the cart page with the current cart items.
     *
     * @return mixed
     */
    public function cart()
    {
        $cart = session()->get('cart', []);

        return view('cart');
    }

    /**
     * Adds a selected item to the cart.
     *
     * @return mixed
     */
    public function addToCart()
    {
        if ($this->request->getMethod() === 'post') {
            $itemName = $this->request->getVar('ItemName');
            $price = $this->request->getVar('Price');
            $vendorId = $this->request->getVar('VendorID');
            $menuId = $this->request->getVar('MenuID'); // Corrected case for MenuID

            $cart = session()->get('cart', []);
            $cartItem = [
                'itemName' => $itemName,
                'price' => $price,
                'vendorId' => $vendorId,
                'menuId' => $menuId, // Add MenuID to the cart item
            ];
            
            var_dump($cartItem); // Check if MenuID is included in the cart item
            
            $cart[] = $cartItem;
            session()->set('cart', $cart);

            return redirect()->to(base_url('menu_forordering')); // Redirect to menu_forordering page
        }
        return redirect()->to(base_url('menu'));
    }


    /**
     * Removes an item from the cart.
     *
     * @return mixed
     */
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

    /**
     * Submits the order by inserting it into the database and clearing the cart.
     *
     * @return mixed
     */
    public function submitOrder()
    {
        $orderModel = new \App\Models\OrderModel();

        // Get the current user's ID and table_id
        $userID = session()->get('user_id');
        $tableID = session()->get('table_id');

        if (!$userID || !$tableID) {
            // If unable to get userID or table_id, display a prompt and redirect to the menu page
            echo '<script>alert("Please scan QR code before ordering. (You can use admin account login to find QR code");</script>';
            return redirect()->to(base_url('menu'));
        }

        // Get the cart items
        $cart = session()->get('cart', []);

        // Extract MenuIDs from cart items
        $menuIDs = array_column($cart, 'menuId');

        // Insert order information into the order table
        $data = [
            'UserID' => $userID,
            'TableID' => $tableID,
            'Status' => 'Pending',
            'OrderTime' => date('Y-m-d H:i:s'),
            'MenuIDs' => implode(',', $menuIDs), // Store MenuIDs as comma-separated string
        ];
        $orderModel->insert($data); // Insert data using the model

        $orderID = $orderModel->insertID(); // Get the ID of the newly inserted order

        // Clear the cart
        session()->remove('cart');

        // Display a success message and redirect to the menu page
        $session = session();
        $session->setFlashdata('order_success_message', 'Order submitted successfully.');
        return redirect()->to(base_url('menu'));
    }



    /**
     * Registers a new user.
     *
     * @return mixed
     */
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

    /**
     * Displays the user management view with a list of all users.
     *
     * @return mixed
     */
    public function user_management()
    {
        $userModel = new \App\Models\UserModel();
        $data['users'] = $userModel->findAll(); // Get all user information

        return view('user_management', $data); // Load the user management page and pass the user information array to the view
    }

    /**
     * Edits a user's information.
     *
     * @param int $userID The ID of the user to edit
     * @return mixed
     */
    public function edit_user($userID)
    {
        $userModel = new \App\Models\UserModel();

        // Get the new information entered by the user from the form
        $newUserData = [
            'Role' => $this->request->getPost('Role'),
        ];

        // Update the user information
        $userModel->update($userID, $newUserData);

        // Redirect to the user management page
        return redirect()->to(base_url('user_management'));
    }

    /**
     * Deletes a user.
     *
     * @param int $userID The ID of the user to delete
     * @return mixed
     */
    public function delete_user($userID)
    {
        $userModel = new \App\Models\UserModel();

        // Delete the specified user
        $userModel->delete($userID);

        // Redirect to the user management page
        return redirect()->to(base_url('user_management'));
    }

    /**
     * Adds a new user to the system.
     *
     * @return mixed
     */
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

        // Insert data into the database
        $userModel = new \App\Models\UserModel();
        $userModel->insert($userData);

        // Redirect to the user management page
        return redirect()->to(base_url('user_management'));
    }

    /**
     * Displays the QR code management view.
     *
     * @return mixed
     */
    public function qr_code_management()
    {
        $tableModel = new \App\Models\TablesModel();
        $data['Table'] = $tableModel->findAll();
        $data['totalTables'] = count($data['Table']);
        return view('qr_code_management', $data);
    }
}