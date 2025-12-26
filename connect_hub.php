// --- GATE 5: PASSWORD RECOVERY STRIKE ---

// ACTION A: SENDING THE CODE
if (isset($data['action']) && $data['action'] == 'send_otp') {
    $otp = rand(100000, 999999); // Tremendous 6-digit code
    $sql = "INSERT INTO AK_OTP_VAULT (user_email, otp_code) VALUES (:em, :otp)";
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':em', $data['email']);
    oci_bind_by_name($stmt, ':otp', $otp);
    
    if (oci_execute($stmt)) {
        // In a live system, here you would trigger the SMTP Mail or SMS strike
        echo json_encode(["success" => true, "message" => "OTP Sent to Vault", "debug_otp" => $otp]);
    }
}

// ACTION B: VERIFY & RESET
if (isset($data['action']) && $data['action'] == 'reset_password') {
    // Check if OTP is valid and not expired
    $sql = "SELECT * FROM AK_OTP_VAULT 
            WHERE user_email = :em AND otp_code = :otp AND is_used = 0 
            AND expiry > CURRENT_TIMESTAMP";
    
    $stmt = oci_parse($conn, $sql);
    oci_bind_by_name($stmt, ':em', $data['email']);
    oci_bind_by_name($stmt, ':otp', $data['otp']);
    oci_execute($stmt);

    if (oci_fetch($stmt)) {
        // OTP Valid! Now perform the Password Strike
        $updateSql = "UPDATE AK_HUB_VAULT SET password = :pw WHERE email = :em";
        $updStmt = oci_parse($conn, $updateSql);
        oci_bind_by_name($updStmt, ':pw', $data['new_password']);
        oci_bind_by_name($updStmt, ':em', $data['email']);
        oci_execute($updStmt);
        
        // Burn the OTP so it cannot be used again
        oci_execute(oci_parse($conn, "UPDATE AK_OTP_VAULT SET is_used = 1 WHERE user_email = '".$data['email']."'"));
        
        echo json_encode(["success" => true, "message" => "Password Re-Established!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid or Expired OTP Strike."]);
    }
}
