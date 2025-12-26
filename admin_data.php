<?php
// --- ADMIN VISION HEADERS (TREMENDOUS AUTHORITY) ---
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// --- ORACLE 23ai VAULT CONNECTION ---
$username = "ADMIN"; 
$password = "BiSMILLAh7&"; 
$connection_string = "23ai_34ui2_high"; 

$conn = oci_connect($username, $password, $connection_string);

if (!$conn) {
    echo json_encode(["success" => false, "message" => "Vault Connection Failed"]);
    exit;
}

// THE FOUNDER'S QUERY: SELECTING ALL REGISTERED MEMBERS
$sql = "SELECT ID, FULL_NAME, EMAIL, WHATSAPP_NO, DEPARTMENT, LOCATION, CREATED_AT 
        FROM AK_HUB_VAULT 
        ORDER BY CREATED_AT DESC";

$stmt = oci_parse($conn, $sql);
oci_execute($stmt);

$students = [];
while ($row = oci_fetch_array($stmt, OCI_ASSOC)) {
    $students[] = $row;
}

// RETURNING THE LIVE DATA TO THE DASHBOARD
echo json_encode($students);

oci_free_statement($stmt);
oci_close($conn);
?>
