<?php
include("../../config/config.php");
session_start();

// header('Content-Type: application/json');

$emailOrPhone = $_POST['emailOrPhone'] ?? '';
$password = $_POST['password'] ?? '';

$response = ['success' => false, 'message' => 'Invalid email or password'];

$query = $mysqli->prepare("SELECT * FROM User WHERE (Email = ? OR Phone = ?) AND Password = ? LIMIT 1");
$query->bind_param('sss', $emailOrPhone, $emailOrPhone, $password);

if (!$query->execute()) {
    $response['message'] = 'Database error: ' . $mysqli->error;
    echo json_encode($response);
    exit;
}

$result = $query->get_result();
$count = $result->num_rows;
if ($count >= 1) {
    $_SESSION["dangnhap"] = $emailOrPhone;
    $userData = $result->fetch_assoc();
    $_SESSION["User_ID"] = $userData["User_ID"];
    $_SESSION["role"] = $userData["Role"];
    $response['success'] = true;
    $response['message'] = 'Login successful';
} else {
    $response['message'] = 'Sai Email/SDT hoặc mật khẩu';
}

echo json_encode($response);
?>