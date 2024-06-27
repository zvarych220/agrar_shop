<?php
header('Access-Control-Allow-Origin: http://localhost:5173');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');
header('Content-Type: application/json');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Enable error logging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include the database connection file
include 'db_connect.php';

// Get the JSON data from the request
$data = json_decode(file_get_contents('php://input'), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    error_log('JSON decode error: ' . json_last_error_msg());
    echo json_encode(['error' => 'Invalid JSON data']);
    exit();
}

$user = $data['user'];
$items = $data['items'];

$user_id = $user['id'];
$name = $user['name'];
$surname = $user['surname'];
$phone = $user['phone'];
$email = $user['email'];
$address = $user['address'];
$purchase_date = date('Y-m-d H:i:s');
$total_amount = array_reduce($items, function($sum, $item) {
    return $sum + ($item['price'] * $item['quantity']);
}, 0);

// Insert into purchases table
$sql = "INSERT INTO purchases (user_id, name, surname, phone, email, address, purchase_date, total_amount) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    error_log('Prepare failed: ' . $conn->error);
    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
    exit();
}

$stmt->bind_param('issssssd', $user_id, $name, $surname, $phone, $email, $address, $purchase_date, $total_amount);

if (!$stmt->execute()) {
    error_log('Execute failed: ' . $stmt->error);
    echo json_encode(['error' => 'Execute failed: ' . $stmt->error]);
    exit();
}

$purchase_id = $stmt->insert_id;

// Insert into purchase_items table
$sql = "INSERT INTO purchase_items (purchase_id, good_id, quantity, price) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    error_log('Prepare failed: ' . $conn->error);
    echo json_encode(['error' => 'Prepare failed: ' . $conn->error]);
    exit();
}

foreach ($items as $item) {
    $good_id = $item['id'];
    $quantity = $item['quantity'];
    $price = $item['price'];
    $stmt->bind_param('iiid', $purchase_id, $good_id, $quantity, $price);

    if (!$stmt->execute()) {
        error_log('Execute failed: ' . $stmt->error);
        echo json_encode(['error' => 'Execute failed: ' . $stmt->error]);
        exit();
    }
}

echo json_encode(['success' => 'Purchase saved successfully']);
$conn->close();
?>
