<?php
// Підключення до бази даних
$host = 'localhost';
$user = 'root';
$password = 'root';
$db = 'agrar_shop';
$port = 3306;

$mysqli = new mysqli($host, $user, $password, $db, $port);

// Перевірка з'єднання
if ($mysqli->connect_error) {
    die('Помилка підключення до бази даних: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Встановлення заголовків для CORS
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");

// Перевірка методу запиту
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Запит OPTIONS - відповідь для CORS preflight
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    header("Access-Control-Max-Age: 3600");
    http_response_code(200);
    exit();
}

// Отримання даних від клієнта
$data = json_decode(file_get_contents("php://input"));

// Перевірка чи передано всі необхідні дані
if (
    !empty($data->token) &&
    !empty($data->user_id) &&
    !empty($data->name) &&
    !empty($data->surname) &&
    !empty($data->phone) &&
    !empty($data->email) &&
    !empty($data->address) &&
    isset($data->total_amount) &&
    !empty($data->products)
) {
    // Підготовка запиту для збереження загальної інформації про покупку
    $purchaseQuery = "INSERT INTO purchases (user_id, name, surname, phone, email, address, total_amount) 
                      VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $mysqli->prepare($purchaseQuery);
    if (!$stmt) {
        http_response_code(500);
        echo json_encode(array("success" => false, "message" => "Помилка підготовки запиту: " . $mysqli->error));
        exit();
    }
    
    $stmt->bind_param("isssssd", 
                      $data->user_id, 
                      $data->name, 
                      $data->surname, 
                      $data->phone, 
                      $data->email, 
                      $data->address, 
                      $data->total_amount);
    
    if ($stmt->execute()) {
        $purchase_id = $stmt->insert_id;

        // Підготовка запиту для збереження даних про товари у покупці
        $itemQuery = "INSERT INTO purchase_items (purchase_id, good_id, quantity, price) 
                      VALUES (?, ?, ?, ?)";
        
        foreach ($data->products as $product) {
            $stmt = $mysqli->prepare($itemQuery);
            if (!$stmt) {
                http_response_code(500);
                echo json_encode(array("success" => false, "message" => "Помилка підготовки запиту: " . $mysqli->error));
                exit();
            }
            
            $stmt->bind_param("iiid", 
                              $purchase_id, 
                              $product->good_id, 
                              $product->quantity, 
                              $product->price);
            $stmt->execute();
        }

        // Відправлення відповіді про успішне збереження
        http_response_code(200);
        echo json_encode(array("success" => true, "message" => "Дані про покупку успішно збережені."));
    } else {
        // Відправлення відповіді про помилку збереження
        http_response_code(500);
        echo json_encode(array("success" => false, "message" => "Помилка збереження даних про покупку: " . $mysqli->error));
    }
} else {
    // Відправлення відповіді про неповні дані від клієнта
    http_response_code(400);
    echo json_encode(array("success" => false, "message" => "Недостатньо даних для збереження покупки."));
}

// Закриття з'єднання з базою даних
$mysqli->close();
?>
