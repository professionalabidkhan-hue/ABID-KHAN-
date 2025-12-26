<?php
// MASTER ARCHITECT: ABID KHAN
// PURPOSE: OTP GENERATION & VAULT INSERTION

function generateAndStoreOTP($conn, $email) {
    // 1. Generate a 6-Digit Sovereign Code
    $otp = rand(100000, 999999);
    
    // 2. Clear any old OTPs for this email to maintain purity
    $deleteSql = "DELETE FROM AK_OTP_VAULT WHERE email = :email";
    $stmtDel = oci_parse($conn, $deleteSql);
    oci_bind_by_name($stmtDel, ":email", $email);
    oci_execute($stmtDel);

    // 3. Insert the new code into the AK_OTP_VAULT
    $insertSql = "INSERT INTO AK_OTP_VAULT (email, otp_code) VALUES (:email, :otp)";
    $stmtIns = oci_parse($conn, $insertSql);
    oci_bind_by_name($stmtIns, ":email", $email);
    oci_bind_by_name($stmtIns, ":otp", $otp);
    
    if (oci_execute($stmtIns)) {
        oci_commit($conn);
        return $otp; // Return to send via Email/WhatsApp
    }
    return false;
}
?>
