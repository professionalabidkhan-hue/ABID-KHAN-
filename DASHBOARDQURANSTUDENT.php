<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['category'] !== 'Holy Quran Recitation') {
    header("Location: signin.php?unauthorized");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Portal | Quranic Studies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --emerald: #1b5e20; --gold: #fbbf24; --dark: #051b07; }
        body { background: #f4f9f4; font-family: 'Inter', sans-serif; }
        .sidebar { background: var(--dark); color: white; height: 100vh; width: 260px; position: fixed; border-right: 4px solid var(--gold); }
        .main-content { margin-left: 260px; padding: 30px; }
        .instruction-card { background: linear-gradient(90deg, var(--dark), var(--emerald)); color: white; border-radius: 15px; padding: 20px; border-left: 10px solid var(--gold); margin-bottom: 25px; }
        .sheet-viewport { height: 75vh; background: white; border-radius: 20px; border: 2px solid #ddd; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="sidebar p-4">
    <h4 class="text-gold fw-bold mb-4">QURAN HUB</h4>
    <div class="mb-4 text-center">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" width="70" class="rounded-circle bg-white p-1">
        <p class="mt-2 small mb-0">Student: <?php echo $_SESSION['user_name']; ?></p>
    </div>
    <nav class="nav flex-column">
        <a class="nav-link text-white mb-2" href="#"><i class="fas fa-book-open me-2 text-warning"></i> My Course Sheet</a>
        <a class="nav-link text-white mb-2" href="#"><i class="fas fa-history me-2 text-warning"></i> Progress Log</a>
        <a class="nav-link text-white mt-5" href="logout.php"><i class="fas fa-sign-out-alt me-2 text-danger"></i> Exit Portal</a>
    </nav>
</div>

<div class="main-content">
    <div class="instruction-card shadow">
        <h6 class="text-gold fw-bold"><i class="fas fa-scroll me-2"></i> FOUNDER'S TASK FOR TOMORROW</h6>
        <p class="mb-0 italic" id="taskText">Please review Tajweed Rules for Madd and complete Surah Al-Mulk recitation.</p>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-dark">Current Course Sheet</h3>
        <span class="badge bg-dark text-gold p-2">Level: Intermediate</span>
    </div>

    <div class="sheet-viewport">
        <iframe src="assets/sample_quran_sheet.pdf" width="100%" height="100%" style="border:none;"></iframe>
    </div>
</div>

</body>
</html>