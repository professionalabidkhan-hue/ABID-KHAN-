<?php
// --- FOUNDER ANALYTICS (MySQL VERSION) ---
header("Content-Type: application/json");
session_start();

$conn = new mysqli("localhost", "root", "", "abid_khan_e_learning_hub");

$analytics = [];

// 1. Total Members from your 'members' table
$res1 = $conn->query("SELECT COUNT(*) AS TOTAL FROM members");
$analytics['total_members'] = $res1->fetch_assoc()['TOTAL'];

// 2. Role Breakdown from 'users' table
$res2 = $conn->query("SELECT role, COUNT(*) AS COUNT FROM users GROUP BY role");
while ($row = $res2->fetch_assoc()) {
    $analytics['roles'][] = $row;
}

echo json_encode($analytics);
$conn->close();
?>