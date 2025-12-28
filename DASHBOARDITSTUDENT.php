<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['category'] !== 'IT Trainer') {
    header("Location: signin.php?unauthorized");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IT Mastery Portal | Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --cyber-blue: #00d4ff; --bg-black: #0d1117; --card-gray: #161b22; }
        body { background: var(--bg-black); color: #c9d1d9; font-family: 'Consolas', monospace; }
        .sidebar { background: #010409; height: 100vh; width: 260px; position: fixed; border-right: 1px solid var(--cyber-blue); }
        .main-content { margin-left: 260px; padding: 30px; }
        .task-glow { border: 1px solid var(--cyber-blue); box-shadow: 0 0 15px rgba(0, 212, 255, 0.2); border-radius: 10px; padding: 20px; margin-bottom: 25px; }
        .code-viewport { height: 75vh; background: #000; border: 1px solid #30363d; border-radius: 10px; }
    </style>
</head>
<body>

<div class="sidebar p-4">
    <h4 style="color: var(--cyber-blue);" class="fw-bold mb-5">IT MASTER</h4>
    <nav class="nav flex-column">
        <a class="nav-link text-light mb-3" href="#"><i class="fas fa-terminal me-2"></i> Coding Sheet</a>
        <a class="nav-link text-light mb-3" href="#"><i class="fab fa-github me-2"></i> My Repo</a>
        <a class="nav-link text-light mt-5" href="logout.php"><i class="fas fa-power-off me-2 text-danger"></i> Shutdown</a>
    </nav>
</div>

<div class="main-content">
    <div class="task-glow">
        <h6 style="color: var(--cyber-blue);"><i class="fas fa-code-branch me-2"></i> SYSTEM UPDATE: FOUNDER COMMAND</h6>
        <p class="mb-0">Commit latest changes to the Login Logic and test Database connectivity before 0900 hrs.</p>
    </div>

    <div class="code-viewport">
        <iframe src="assets/it_assignment_01.html" width="100%" height="100%" style="border:none;"></iframe>
    </div>
</div>

</body>
</html>