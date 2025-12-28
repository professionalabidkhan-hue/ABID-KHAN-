<?php
header("Content-Type: application/json");
$conn = new mysqli("localhost", "root", "", "abid_khan_e_learning_hub");

$data = json_decode(file_get_contents("php://input"), true);
$action = $data['action'];

if ($action === 'send_otp') {
    $phone = $conn->real_escape_string($data['whatsapp_no']);
    // Search for the last 9 digits to be safe from prefix errors (+92 vs 0)
    $search_term = substr($phone, -9); 

    $check = $conn->query("SELECT id FROM users WHERE whatsapp_no LIKE '%$search_term%'");
    
    if ($check->num_rows > 0) {
        $otp = rand(100000, 999999);
        echo json_encode(["success" => true, "debug_otp" => $otp]);
    } else {
        echo json_encode(["success" => false, "message" => "Number $phone not found."]);
    }
}

if ($action === 'reset_password') {
    $phone = $conn->real_escape_string($data['whatsapp_no']);
    $search_term = substr($phone, -9);
    $new_pass = password_hash($data['new_password'], PASSWORD_DEFAULT);
    
    $update = $conn->query("UPDATE users SET password = '$new_pass' WHERE whatsapp_no LIKE '%$search_term%'");
    echo json_encode(["success" => $update]);
}
?>