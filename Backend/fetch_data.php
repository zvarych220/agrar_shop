<?php
include 'db_connect.php';

// Fetch all products from the database
$sql = "SELECT id, title, image, inStock, price FROM goods"; 
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Shuffle the array to randomize the order
shuffle($data);

// Ensure at least 5 products are selected
$randomNumberOfProducts = rand(5, count($data));
$data = array_slice($data, 0, $randomNumberOfProducts);

echo json_encode($data);

$conn->close();
?>
