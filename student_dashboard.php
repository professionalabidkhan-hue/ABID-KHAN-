<?php
session_start();
if (!isset($_SESSION['user_email']) || $_SESSION['user_role'] !== 'Student') {
    header("Location: signin.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IT Engineering | Student Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #07090d; color: #fff; font-family: 'Inter', sans-serif; }
        .cyber-card { 
            background: rgba(30, 41, 59, 0.7); 
            border-left: 5px solid #0ea5e9; 
            border-radius: 15px; 
            padding: 30px;
            margin-top: 50px;
        }
        .lesson-box { background: #1e293b; border: 1px solid #334155; border-radius: 10px; transition: 0.3s; }
        .lesson-box:hover { border-color: #0ea5e9; transform: translateY(-5px); }
    </style>
</head>
<body>
    <div class="container">
        <div class="cyber-card shadow-lg">
            <h1 class="text-info fw-bold">Welcome, Engineer <?php echo $_SESSION['user_name']; ?></h1>
            <p class="text-secondary">Department: <?php echo $_SESSION['user_dept']; ?> | Status: Authorized</p>
            
            <hr class="border-secondary">
            
            <div class="row mt-4">
                <div class="col-md-8">
                    <h3><i class="fas fa-book-open me-2"></i>Current Curriculum</h3>
                    <div id="curriculum-list" class="mt-3">
                        <div class="p-4 lesson-box d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">Introduction to Hub Infrastructure</h5>
                                <small class="text-muted">Uploaded by: Lead Trainer</small>
                            </div>
                            <button class="btn btn-outline-info">Download PDF</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="p-4 bg-dark rounded border border-secondary text-center">
                        <h4 class="text-warning">Skill Progress</h4>
                        <div class="progress mb-3" style="height: 10px;">
                            <div class="progress-bar bg-info" style="width: 25%"></div>
                        </div>
                        <p class="small text-muted">Complete your first lesson to advance.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>