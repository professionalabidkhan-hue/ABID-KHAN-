// --- GATE 1: SIGNUP (Aligned with your exact Oracle Columns) ---
if (isset($data['full_name']) && !isset($data['message'])) {
    $sql = "INSERT INTO AK_HUB_VAULT (
                FULL_NAME, USER_EMAIL, PASSWORD, CONTACT_NO, 
                FATHER_NAME, MONTHLY_INCOME, PREFERRED_TIMING, 
                LOCATION, DEPARTMENT, USER_ROLE
            ) VALUES (
                :fn, :em, :pw, :wa, 
                :ft, :inc, :tim, :loc, :dept, :role
            )";
    
    $stmt = oci_parse($conn, $sql);
    
    // Binding the Sovereign Data - Matching your JSON keys exactly
    oci_bind_by_name($stmt, ':fn', $data['full_name']);
    oci_bind_by_name($stmt, ':em', $data['email']);
    oci_bind_by_name($stmt, ':pw', $data['password']); // Tip: Use password_hash() later for security
    oci_bind_by_name($stmt, ':wa', $data['whatsapp_no']);
    oci_bind_by_name($stmt, ':ft', $data['father_name']);
    oci_bind_by_name($stmt, ':inc', $data['monthly_income']);
    oci_bind_by_name($stmt, ':tim', $data['preferred_timing']);
    oci_bind_by_name($stmt, ':loc', $data['location']);
    oci_bind_by_name($stmt, ':dept', $data['department']);
    oci_bind_by_name($stmt, ':role', $data['role']); // Added from your HTML
    
    if(oci_execute($stmt)) {
        oci_commit($conn);
        echo json_encode(["success" => true, "message" => "Identity Secured in Abid Khan Hub"]);
    } else {
        $error = oci_error($stmt);
        echo json_encode(["success" => false, "message" => "Strike Failed: " . $error['message']]);
    }
}
