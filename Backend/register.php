<?php
include 'db_connect.php';

$response = ['success' => false, 'message' => ''];

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $agreed_to_terms = isset($_POST['agreedToTerms']) ? 1 : 0;

    if ($password !== $confirm_password) {
        $response['message'] = "Паролі не співпадають";
        echo json_encode($response);
        exit();
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE email = ? OR phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $email, $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $response['message'] = "Користувач з таким email або телефоном вже існує.";
    } else {
        $role_id = 2; // Роль простого користувача
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, phone, email, password, agreed_to_terms, role_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssis", $first_name, $last_name, $phone, $email, $password_hash, $agreed_to_terms, $role_id);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Реєстрація успішна";
            $userId = $stmt->insert_id;

            // Generate token
            $token = bin2hex(random_bytes(16));
            $_SESSION['token'] = $token;

            $response['token'] = $token;
        } else {
            $response['message'] = "Помилка: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    $response['message'] = "Дозволено тільки POST запити";
}

echo json_encode($response);
?>