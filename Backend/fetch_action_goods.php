<?php
include 'db_connect.php';

$sql = "SELECT id, title, image, inStock, price, discount FROM goods WHERE action = 1"; // Вибираємо лише акційні товари
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

echo json_encode($data);

$conn->close();
?>
