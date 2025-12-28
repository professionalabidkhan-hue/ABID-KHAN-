<?php
// 1. Tell the browser we are sending JSON, not HTML
header('Content-Type: application/json');

// 2. Connect to your Database
$conn = new mysqli("localhost", "root", "", "elearning_hub");

if ($conn->connect_error) {
    // This goes back to the 'catch' block in your JS
    echo json_encode(["success" => false, "message" => "Database offline"]);
    exit;
}

// 3. Get the data from your JavaScript 'fetch' body
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $name  = $conn->real_escape_string($data['full_name']);
    $email = $conn->real_escape_string($data['email']);
    $pass  = password_hash($data['password'], PASSWORD_DEFAULT); // Encrypt password
    $phone = $conn->real_escape_string($data['whatsapp_no']);
    $dept  = $conn->real_escape_string($data['department']);

    // 4. Save to Database
    $sql = "INSERT INTO users (full_name, email, password, whatsapp, department) 
            VALUES ('$name', '$email', '$pass', '$phone', '$dept')";

    if ($conn->query($sql)) {
        // This triggers 'result.success' in your JS
        echo json_encode(["success" => true, "message" => "Success"]);
    } else {
        echo json_encode(["success" => false, "message" => "Email already exists"]);
    }
}
?>