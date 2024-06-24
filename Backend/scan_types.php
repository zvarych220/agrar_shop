<?php
include 'db_connect.php'; // Підключення до бази даних

header('Content-Type: application/json');

$result = $conn->query("SELECT type_id, type_name FROM types");
$types = array();

while($row = $result->fetch_assoc()) {
  $types[] = $row;
}

echo json_encode(['types' => $types]);

$conn->close();
?>
