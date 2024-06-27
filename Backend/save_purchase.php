<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php';

$response = ['success' => false, 'message' => ''];

// Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400'); // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

session_start();

// Log POST data for debugging
error_log('POST data: ' . print_r($_POST, true));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Check required POST data
        $requiredFields = ['token', 'user_id', 'name', 'surname', 'phone', 'email', 'address', 'purchase_date', 'total_amount', 'products'];
        foreach ($requiredFields as $field) {
            if (!isset($_POST[$field])) {
                throw new Exception('Missing required POST data: ' . $field);
            }
        }

        // Extract data from POST request
        $token = $_POST['token'];
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $purchase_date = $_POST['purchase_date'];
        $total_amount = $_POST['total_amount'];
        $products = $_POST['products']; // This should be an array

        // Verify user token from session
        if (!isset($_SESSION['token']) || $token !== $_SESSION['token']) {
            $response['message'] = 'Invalid token. Please log in again.';
            echo json_encode($response);
            exit;
        }

        // Log extracted data
        error_log('Extracted data: ' . print_r(compact('user_id', 'name', 'surname', 'phone', 'email', 'address', 'purchase_date', 'total_amount', 'products'), true));

        // Check if user_id is not null
        if (is_null($user_id)) {
            throw new Exception('User ID is null');
        }

        // Insert order data into `orders` table
        $sql_order = "INSERT INTO orders (user_id, name, surname, phone, email, address, purchase_date, total_amount) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_order = $conn->prepare($sql_order);
        if (!$stmt_order) {
            throw new Exception('Prepare failed: ' . $conn->error);
        }
        $stmt_order->bind_param('issssssd', $user_id, $name, $surname, $phone, $email, $address, $purchase_date, $total_amount);
        if (!$stmt_order->execute()) {
            throw new Exception('Execute failed: ' . $stmt_order->error);
        }

        // Get the last inserted order_id
        $order_id = $stmt_order->insert_id;

        // Insert product data into `order_products` table
        $sql_product = "INSERT INTO order_products (order_id, good_id, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt_product = $conn->prepare($sql_product);
        if (!$stmt_product) {
            throw new Exception('Prepare failed: ' . $conn->error);
        }

        foreach ($products as $product) {
            $good_id = $product['good_id'];
            $quantity = $product['quantity'];
            $price = $product['price'];

            $stmt_product->bind_param('iiid', $order_id, $good_id, $quantity, $price);
            if (!$stmt_product->execute()) {
                throw new Exception('Execute failed: ' . $stmt_product->error);
            }
        }

        $response['success'] = true;
        $response['message'] = 'Order and products successfully saved!';
        $stmt_order->close();
        $stmt_product->close();
    } catch (Exception $e) {
        $response['message'] = 'Internal Server Error: ' . $e->getMessage();
        error_log($e->getMessage());
        http_response_code(500);
    }
} else {
    $response['message'] = 'Invalid request method.';
    http_response_code(400);
}

echo json_encode($response);
?>
