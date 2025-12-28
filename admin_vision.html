<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inner Sanctum | Abid Khan Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary-blue: #4fc3f7; --dark-bg: #07090d; --border: rgba(255, 255, 255, 0.1); }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #07090d; color: #fff; min-height: 100vh; }
        .sidebar { background: rgba(13, 17, 23, 0.9); border-right: 1px solid var(--border); min-height: 100vh; padding: 30px; }
        .main-content { padding: 50px; }
        .stat-card { background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 20px; padding: 25px; transition: 0.3s; }
        .stat-card:hover { border-color: var(--primary-blue); background: rgba(79, 195, 247, 0.05); }
        .welcome-text { font-weight: 800; font-size: 2.5rem; letter-spacing: -1px; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar d-none d-md-block">
            <img src="ABID KHAN.png" width="50" class="mb-4">
            <h5 class="fw-bold text-info mb-4">COMMAND CENTER</h5>
            <nav class="nav flex-column">
                <a class="nav-link text-white mb-2" href="#"><i class="fas fa-home me-2"></i> My Identity</a>
                <a class="nav-link text-secondary mb-2" href="#"><i class="fas fa-book me-2"></i> IT Engineering</a>
                <a class="nav-link text-secondary mb-2" href="#"><i class="fas fa-quran me-2"></i> Islamic Studies</a>
                <hr class="border-secondary">
                <a class="nav-link text-danger" href="logout.php">Logout</a>
            </nav>
        </div>

        <div class="col-md-9 main-content">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h1 class="welcome-text">Welcome, <span id="user-name" class="text-info">Master</span></h1>
                    <p class="text-secondary">Your profile is active in the Abid Khan Hub Vault.</p>
                </div>
                <div class="stat-card text-center">
                    <small class="text-secondary d-block">STATUS</small>
                    <span class="badge bg-info text-dark">CERTIFIED MEMBER</span>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="stat-card">
                        <small class="text-info uppercase fw-bold">Department</small>
                        <h4 id="user-dept" class="mt-2">---</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <small class="text-info uppercase fw-bold">Member Role</small>
                        <h4 id="user-role" class="mt-2">---</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <small class="text-info uppercase fw-bold">Location</small>
                        <h4 id="user-loc" class="mt-2">---</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // AUTOMATIC IDENTITY RETRIEVAL
    async function loadIdentity() {
        try {
            const res = await fetch('./get_member_data.php');
            const result = await res.json();
            
            if(result.success) {
                document.getElementById('user-name').innerText = result.data.full_name;
                document.getElementById('user-dept').innerText = result.data.department;
                document.getElementById('user-role').innerText = result.data.role;
                document.getElementById('user-loc').innerText = result.data.location;
            } else {
                window.location.href = 'signin.html';
            }
        } catch (err) {
            console.error("Identity retrieval failed.");
        }
    }
    window.onload = loadIdentity;
</script>

</body>
</html>