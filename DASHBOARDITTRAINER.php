<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: signin.html");
    exit();
}

$name = $_SESSION['user_name'];
$role = $_SESSION['user_role'];
$dept = isset($_SESSION['user_dept']) ? $_SESSION['user_dept'] : "General";

// Department-based Logic
$isIslamic = ($dept == "Islamic Studies");
$accent = $isIslamic ? "#4ade80" : "#4fc3f7"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Console | ABID KHAN HUB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root { 
            --primary: <?php echo $accent; ?>; 
            --bg: #030508; 
            --glass: rgba(255, 255, 255, 0.05);
            --border: rgba(255, 255, 255, 0.1);
            --gold: #ffca28;
        }

        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); color: #fff; overflow-x: hidden; }
        .sidebar { width: 260px; height: 100vh; background: #0a0c10; border-right: 1px solid var(--border); position: fixed; padding: 30px 20px; z-index: 1000; }
        .nav-link { color: #888; padding: 12px 15px; border-radius: 12px; margin-bottom: 5px; display: block; text-decoration: none; transition: 0.3s; }
        .nav-link:hover, .nav-link.active { background: var(--glass); color: var(--primary); }
        .main-wrapper { margin-left: 260px; padding: 40px; }
        .glass-card { background: var(--glass); backdrop-filter: blur(10px); border: 1px solid var(--border); border-radius: 24px; padding: 30px; transition: 0.3s; margin-bottom: 25px; }
        
        /* Master Input Bar Styling */
        .master-input-group { background: rgba(0,0,0,0.3); border: 1px solid var(--primary); border-radius: 12px; padding: 10px; }
        .master-input-group input { background: transparent; border: none; color: white; outline: none; width: 100%; padding-left: 10px; }

        /* Distinguished Profile Styling */
        .profile-glow { width: 80px; height: 80px; border-radius: 50%; border: 2px solid var(--gold); box-shadow: 0 0 15px var(--gold); margin-bottom: 15px; }
        
        .live-window { width: 100%; height: 500px; border-radius: 15px; border: 1px solid var(--border); background: #000; overflow: hidden; position: relative; }
        .live-window iframe { width: 100%; height: 100%; border: none; }
        
        .live-status-tag { background: #ff4d4d; color: white; padding: 2px 10px; border-radius: 5px; font-size: 0.7rem; font-weight: 800; animation: blink 1.5s infinite; }
        @keyframes blink { 0% { opacity: 1; } 50% { opacity: 0.4; } 100% { opacity: 1; } }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4 class="fw-bold mb-5"><i class="fas <?php echo $isIslamic ? 'fa-mosque' : 'fa-laptop-code'; ?> me-2"></i>AK-HUB</h4>
        <nav>
            <a href="#" class="nav-link active"><i class="fas fa-crown me-2"></i> Master Terminal</a>
            <a href="https://web.whatsapp.com/" target="_blank" class="nav-link"><i class="fab fa-whatsapp me-2"></i> WhatsApp Web</a>
            <hr class="my-4 border-secondary opacity-25">
            <a href="logout.php" class="nav-link text-danger"><i class="fas fa-power-off me-2"></i> Exit System</a>
        </nav>
    </div>

    <div class="main-wrapper">
        <div class="row">
            <div class="col-md-8">
                <div class="glass-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold m-0"><i class="fas fa-terminal me-2 text-primary"></i> Master Live Bridge</h5>
                        <span class="live-status-tag">SYSTEM ACTIVE</span>
                    </div>
                    
                    <div class="live-window">
                        <iframe id="masterIframe" src="about:blank"></iframe>
                    </div>

                    <div class="mt-4">
                        <label class="small text-secondary fw-bold mb-2">DEPLOY REMOTE RESOURCE TO FRAME:</label>
                        <div class="master-input-group d-flex align-items-center">
                            <i class="fas fa-globe text-primary ms-2"></i>
                            <input type="text" id="urlInput" placeholder="Paste URL here (e.g., zoom.us/j/...)">
                            <button onclick="deployUrl()" class="btn btn-primary btn-sm rounded-pill px-4 fw-bold">DEPLOY</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card text-center border-warning" style="border: 1px solid var(--gold) !important;">
                    <div class="d-flex justify-content-center">
                        <div class="profile-glow d-flex align-items-center justify-content-center bg-dark">
                            <i class="fas fa-user-tie fa-2x text-warning"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1 text-warning">ABID KHAN</h5>
                    <p class="small text-white opacity-75 mb-3">Distinguished Master & Senior Trainer</p>
                    
                    <div class="d-flex justify-content-around mb-4">
                        <div class="text-center">
                            <small class="d-block text-secondary" style="font-size: 0.6rem;">EXPERTISE</small>
                            <span class="badge bg-dark border border-secondary">Engineering</span>
                        </div>
                        <div class="text-center">
                            <small class="d-block text-secondary" style="font-size: 0.6rem;">AUTHORITY</small>
                            <span class="badge bg-dark border border-secondary">Islamic Studies</span>
                        </div>
                    </div>
                    
                    <p class="small text-muted italic">"Guiding the next generation of engineers and scholars through the Abid Khan Hub ecosystem."</p>
                </div>

                <div class="glass-card text-center" style="border-color: #25D366;">
                    <i class="fab fa-whatsapp fa-2x mb-2" style="color: #25D366;"></i>
                    <h6 class="fw-bold mb-3">Community Bridge</h6>
                    <a href="https://chat.whatsapp.com/YOUR_LINK" target="_blank" class="btn btn-success btn-sm w-100 rounded-pill">OPEN WHATSAPP</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deployUrl() {
            let url = document.getElementById('urlInput').value;
            let frame = document.getElementById('masterIframe');
            
            if (url !== "") {
                // Auto-fix if user forgets https://
                if (!url.startsWith('http')) {
                    url = 'https://' + url;
                }
                frame.src = url;
                console.log("Master Abid: Deploying -> " + url);
            } else {
                alert("Please enter a URL to deploy, Master.");
            }
        }

        // Enter key support
        document.getElementById("urlInput").addEventListener("keypress", function(event) {
            if (event.key === "Enter") { deployUrl(); }
        });
    </script>
</body>
</html>