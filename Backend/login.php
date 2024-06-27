<?php
include 'db_connect.php';

$response = ['success' => false, 'message' => ''];

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $agreedToTerms = $_POST['agreedToTerms'];

    if ($agreedToTerms != 1) {
        $response['message'] = 'Ви повинні погодитись на обробку і захист персональних даних.';
        echo json_encode($response);
        exit;
    }

    $sql = "SELECT * FROM users WHERE email = ? OR phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $contact, $contact);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $response['success'] = true;
            $response['message'] = 'Ви успішно увійшли!';
            
            // Generate token
            $token = bin2hex(random_bytes(16));
            $_SESSION['token'] = $token;

            $response['token'] = $token;
            $response['role_id'] = $user['role_id'];
            $response['user_id'] = $user['id'];  // Додаємо id користувача до відповіді
        } else {
            $response['message'] = 'Невірний пароль.';
        }
    } else {
        $response['message'] = 'Невірний телефон або e-mail.';
    }

    $stmt->close();
} else {
    $response['message'] = 'Невірний метод запиту.';
}

echo json_encode($response);
?>