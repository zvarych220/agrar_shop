<?php
include 'db_connect.php';

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, phone, email, password, agreed_to_terms) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $first_name, $last_name, $phone, $email, $password_hash, $agreed_to_terms);

    // Set parameters
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $agreed_to_terms = isset($_POST['agreedToTerms']) ? 1 : 0;

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Паролі не співпадають";
        exit();
    }

    // Hash the password before storing
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Реєстрація успішна";
    } else {
        echo "Помилка: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    // Handle non-POST request
    echo "Дозволено тільки POST запити";
}
?>
