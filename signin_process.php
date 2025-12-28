<?php
/**
 * THE MASTER GATEKEEPER
 * Developed for the Abid Khan Global E-Learning Hub
 */
session_start();

// 1. Establish the Vault Connection
// Update these credentials if your 'db_connection.php' is different
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "abid_khan_e_learning_hub";

$conn = new mysqli($host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Vault Offline: " . $conn->connect_error);
}

// 2. Capture the Strike (Capture Form Data)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize input to prevent SQL Injection
    $email = $conn->real_escape_string($_POST['email']);
    $pass  = $_POST['password'];

    // 3. Search for the Identity
    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // 4. Decrypt and Verify the Access Key
        if (password_verify($pass, $user['password'])) {
            
            // THE MASTER-KEY ASSIGNMENT
            // Storing essential data in the Session for the Hub to recognize
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['category']  = $user['department']; // Or 'category' depending on your DB column name

            // 5. THE TREMENDOUS ROUTING LOGIC
            // Ensure these strings match your Signup Dropdown EXACTLY
            if ($_SESSION['category'] == "Holy Quran Recitation") {
                header("Location: DASHBOARDQURANSTUDENT.php");
                exit(); 
            } 
            elseif ($_SESSION['category'] == "IT Trainer") {
                header("Location: DASHBOARDITSTUDENT.php");
                exit();
            }
            elseif ($_SESSION['category'] == "Founder") {
                header("Location: FOUNDER_COMMAND_CENTER.php");
                exit();
            } else {
                // If category is unknown, send to a general home or error
                header("Location: signin.php?error=invalid_category");
                exit();
            }

        } else {
            // Wrong Password
            header("Location: signin.php?error=wrong_key");
            exit();
        }
    } else {
        // User not found
        header("Location: signin.php?error=not_found");
        exit();
    }
}

$conn->close();
?>