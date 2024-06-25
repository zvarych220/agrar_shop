<?php
include 'db_connect.php';

$response = ['success' => false, 'users' => []];

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT users.id, users.first_name, users.last_name, users.email, roles.role_name 
            FROM users 
            JOIN roles ON users.role_id = roles.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $response['users'][] = $row;
        }
        $response['success'] = true;
    } else {
        $response['message'] = 'Немає користувачів.';
    }
} else {
    $response['message'] = 'Невірний метод запиту.';
}

echo json_encode($response);
?>
