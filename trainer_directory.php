<?php
// Save as get_trainers.php
session_start();
header("Content-Type: application/json");

$host = "localhost"; $db_name = "abid_khan_e_learning_hub"; $username = "root"; $password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    // Fetch only Trainers
    $stmt = $conn->prepare("SELECT full_name, department, location, phone FROM members WHERE role = 'Trainer'");
    $stmt->execute();
    $trainers = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(["success" => true, "trainers" => $trainers]);
} catch(PDOException $e) {
    echo json_encode(["success" => false]);
}
?>