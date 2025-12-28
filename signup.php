<?php
header("Content-Type: application/json");

// 1. Establish connection
$conn = new mysqli("localhost", "root", "", "abid_khan_e_learning_hub");

if ($conn->connect_error) {
    echo json_encode(["success" => false, "message" => "Sentinel Offline: Database Bridge Failed."]);
    exit;
}

// 2. Capture JSON data
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["success" => false, "message" => "No data received."]);
    exit;
}

// 3. Prepare and Sanitize Identity Markers
$name     = $conn->real_escape_string($data['full_name']);
$email    = $conn->real_escape_string($data['email']);
$password = password_hash($data['password'], PASSWORD_DEFAULT); 
$whatsapp = $conn->real_escape_string($data['whatsapp_no']);
$location = $conn->real_escape_string($data['location']);
$dept     = $conn->real_escape_string($data['department']);
$role     = $conn->real_escape_string($data['role']);

// 4. Check if Email already exists
$checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
$checkEmail->bind_param("s", $email);
$checkEmail->execute();
$result = $checkEmail->get_result();

if ($result->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Identity already secured in the Vault."]);
    exit;
}

// 5. Execute Registration Strike
// Columns now match your updated table: full_name, email, password, whatsapp_no, location, department, role
$sql = "INSERT INTO users (full_name, email, password, whatsapp_no, location, department, role) 
        VALUES ('$name', '$email', '$password', '$whatsapp', '$location', '$dept', '$role')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "IDENTITY SECURED: Welcome to the Hub!"]);
} else {
    echo json_encode(["success" => false, "message" => "Vault Entry Error: " . $conn->error]);
}

$conn->close();
?>