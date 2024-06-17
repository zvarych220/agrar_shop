<?php
session_start();

$response = ['loggedIn' => false];

if (isset($_SESSION['user_id'])) {
    $response['loggedIn'] = true;
    $response['user_id'] = $_SESSION['user_id'];
    $response['email'] = $_SESSION['email'];
    $response['expire'] = $_SESSION['expire'];
}

echo json_encode($response);
?>
