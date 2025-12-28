<?php
session_start();

// 1. THE SECURITY CHECK
if (!isset($_SESSION['user_name'])) {
    header('Location: signin.html');
    exit;
}

// 2. THE HUB CONNECTION
$conn = new mysqli("localhost", "root", "", "abid_khan_e_learning_hub");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. CAPTURE THE ENGAGEMENT
if (isset($_GET['file']) && isset($_GET['title'])) {
    $seeker_name = $_SESSION['user_name'];
    $lesson_title = $conn->real_escape_string($_GET['title']);
    $file_path = $_GET['file'];

    // Record this movement into the student_progress table
    $sql = "INSERT INTO student_progress (user_name, lesson_title) VALUES ('$seeker_name', '$lesson_title')";
    $conn->query($sql);

    // 4. DELIVER THE KNOWLEDGE
    // This tells the browser to download the file after the record is made
    if (file_exists($file_path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
        readfile($file_path);
        exit;
    } else {
        echo "The Custodian has not yet placed the physical file in the vault.";
    }
} else {
    header('Location: dashboard.php');
}

$conn->close();
?>