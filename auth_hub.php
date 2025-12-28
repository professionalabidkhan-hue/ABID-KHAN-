<?php
header('Content-Type: application/json');
session_start();

// 1. Establish the Bridge
$conn = new mysqli("localhost", "root", "", "abid_khan_e_learning_hub");

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Vault Offline']);
    exit;
}

// 2. Capture the Strike (JSON Data)
$data = json_decode(file_get_contents("php://input"), true);
$email = $conn->real_escape_string($data['email']);
$pass = $data['password'];

// 3. Search for the Identity (Email Only)
$query = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // 4. Decrypt and Verify the Access Key
    if (password_verify($pass, $user['password'])) {
        
        // THE MASTER-KEY ASSIGNMENT (Storing in Sessions)
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['full_name'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_dept'] = $user['department'];
        
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Access Key Incorrect']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Identity not found in the Vault']);
}

$conn->close();
?>