<?php
// Підключення до бази даних та інші налаштування...
include 'db_connect.php';

// Отримання даних з POST запиту
$currentPassword = $_POST['currentPassword'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];
$user_id = $_POST['user_id'];

// Виведення user_id у консоль
error_log("user_id у PHP скрипті: $user_id");

// Якщо не передано user_id, повертаємо помилку
if (!$user_id) {
    $response['message'] = 'Не вдалося отримати user_id.';
    echo json_encode($response);
    exit;
}

// Перевірка, чи всі необхідні дані були передані з форми
if (!$currentPassword || !$newPassword || !$confirmPassword) {
    $response['message'] = 'Будь ласка, заповніть всі поля.';
    echo json_encode($response);
    exit;
}

// Перевірка, чи новий пароль співпадає з підтвердженням
if ($newPassword !== $confirmPassword) {
    $response['message'] = 'Паролі не співпадають.';
    echo json_encode($response);
    exit;
}

// Підготовка запиту до бази даних для отримання пароля користувача за його ID
$sql = "SELECT password FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Перевірка поточного пароля
    if (password_verify($currentPassword, $user['password'])) {
        // Хешування нового паролю
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Запис старого паролю в історію паролів
        $insertHistorySql = "INSERT INTO password_history (user_id, password_hash, change_date) VALUES (?, ?, NOW())";
        $insertHistoryStmt = $conn->prepare($insertHistorySql);
        $insertHistoryStmt->bind_param('is', $user_id, $user['password']);
        $insertHistoryStmt->execute();

        // Оновлення паролю в таблиці користувачів
        $updateSql = "UPDATE users SET password = ? WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param('si', $hashedPassword, $user_id);
        $updateStmt->execute();

        if ($updateStmt->affected_rows > 0) {
            $response['success'] = true;
            $response['message'] = 'Пароль успішно оновлено!';
        } else {
            $response['message'] = 'Не вдалося оновити пароль.';
        }

        $updateStmt->close();
        $insertHistoryStmt->close();
    } else {
        $response['message'] = 'Невірний поточний пароль.';
    }
} else {
    $response['message'] = 'Користувача з таким ID не знайдено.';
}

$stmt->close();

// Виведення відповіді у форматі JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
