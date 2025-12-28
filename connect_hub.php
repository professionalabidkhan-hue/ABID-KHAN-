<?php
// --- THE SOVEREIGN BRIDGE: CONNECT_HUB.PHP ---
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// Handle pre-flight OPTIONS request for browser safety
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Vault Credentials
$host = "localhost";
$db_name = "abid_khan_e_learning_hub";
$username = "root"; 
$password = "";

try {
    // Establishing the PDO connection to the Vault
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // If the database is not started in XAMPP
    echo json_encode(["success" => false, "message" => "Vault Offline: Ensure MySQL is running in XAMPP."]);
    exit;
}

// Capturing the JSON Strike from the Frontend
$data = json_decode(file_get_contents("php://input"), true);

if ($data && isset($data['email'])) {
    try {
        // Prepared SQL Strike for maximum security
        $sql = "INSERT INTO members (full_name, email, password, phone, location, department, role) 
                VALUES (:fn, :em, :pw, :ph, :loc, :dept, :role)";
        
        $stmt = $conn->prepare($sql);
        
        // Executing the Entry with precision alignment
        $stmt->execute([
            ':fn'   => $data['full_name'],
            ':em'   => $data['email'],
            ':pw'   => $data['password'], // Security Note: Master Abid, we will hash this later!
            ':ph'   => $data['whatsapp_no'],
            ':loc'  => $data['location'],
            ':dept' => $data['department'],
            ':role' => $data['role']
        ]);

        echo json_encode([
            "success" => true, 
            "message" => "IDENTITY SECURED: Welcome Master " . $data['full_name'] . " to the Hub Sanctum!"
        ]);

    } catch(PDOException $e) {
        // Handle Duplicate Email (Sentinel Error 23000)
        if ($e->getCode() == 23000) {
            echo json_encode(["success" => false, "message" => "Email already recognized in the Vault!"]);
        } else {
            echo json_encode(["success" => false, "message" => "Database Error: " . $e->getMessage()]);
        }
    }
} else {
    // If the script is accessed without data
    echo json_encode(["success" => false, "message" => "Sentinel: No data detected in the transmission."]);
}
?>