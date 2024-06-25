<?php
include 'db_connect.php';

$response = ['success' => false, 'message' => ''];

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $user_id = $data['userId'];
    $new_role_id = 1; // Роль адміністратора

    $sql = "UPDATE users SET role_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $new_role_id, $user_id);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Роль користувача успішно змінено.';
    } else {
        $response['message'] = 'Помилка: ' . $stmt->error;
    }

    $stmt->close();
} else {
    $response['message'] = 'Невірний метод запиту.';
}

echo json_encode($response);
?>
