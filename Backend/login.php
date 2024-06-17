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
            
            // Set session for one day
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['start'] = time();
            $_SESSION['expire'] = $_SESSION['start'] + (24 * 60 * 60);
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
