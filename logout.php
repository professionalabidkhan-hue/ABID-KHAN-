<?php
session_start();

// 1. Clear all session variables
$_SESSION = array();

// 2. Destroy the session cookie for absolute security
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Destroy the session on the server
session_destroy();

// 4. Teleport back to the Sign-in page
header("Location: signin.php?status=logged_out");
exit();
?>