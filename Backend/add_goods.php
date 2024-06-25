<?php
include 'db_connect.php'; // Підключення до бази даних

header('Content-Type: application/json');

// Додамо функцію для виведення помилок
function respond($success, $error = '') {
    echo json_encode(['success' => $success, 'error' => $error]);
    exit;
}

try {
    if (isset($_POST['title']) && isset($_POST['price']) && isset($_POST['type_id']) && isset($_POST['action']) && isset($_FILES['image'])) {
        $title = $_POST['title'];
        $price = $_POST['price'];
        $type_id = $_POST['type_id'];
        $action = $_POST['action'];
        $inStock = 1; // Встановлюємо значення за замовчуванням для поля inStock

        $target_dir = "../src/assets/slider/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Перевірка чи файл є зображенням
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            respond(false, 'File is not an image.');
        }

        // Перевірка розміру файлу
        if ($_FILES["image"]["size"] > 500000) {
            respond(false, 'Sorry, your file is too large.');
        }

        // Дозволені формати файлів
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            respond(false, 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
        }

        // Переконайтеся, що цільова директорія існує і доступна для запису
        if (!file_exists($target_dir)) {
            if (!mkdir($target_dir, 0777, true)) {
                respond(false, 'Failed to create target directory.');
            }
        }
        
        if (!is_writable($target_dir)) {
            respond(false, 'Target directory is not writable.');
        }

        // Завантаження файлу
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            respond(false, 'Sorry, there was an error uploading your file. Error code: ' . $_FILES["image"]["error"]);
        }

        // Перевірка, чи файл дійсно переміщено
        if (!file_exists($target_file)) {
            respond(false, 'File was not moved successfully.');
        }

        // Вставка нового товару в базу даних
        $relative_file_path = 'src/assets/slider/' . basename($_FILES["image"]["name"]);
        $sql = "INSERT INTO goods (title, image, price, action, type_id, inStock) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            respond(false, 'Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param("ssdiii", $title, $relative_file_path, $price, $action, $type_id, $inStock);
        if ($stmt->execute()) {
            respond(true, $relative_file_path);
        } else {
            respond(false, 'Execute failed: ' . htmlspecialchars($stmt->error));
        }
        $stmt->close();
    } else {
        respond(false, 'Invalid data');
    }
} catch (Exception $e) {
    respond(false, 'Exception: ' . $e->getMessage());
}

$conn->close();
?>
