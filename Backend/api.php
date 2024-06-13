<?php
header("Content-Type: application/json");

include 'dbConfig.php';

$sql = "SELECT * FROM your_table";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
}

echo json_encode($data);

$conn->close();
?>
