<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quranic Master Hub | Abid Khan Global</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { 
            --emerald-deep: #062608; 
            --emerald-mid: #1b5e20; 
            --gold: #fbbf24; 
            --glass-white: rgba(255, 255, 255, 0.05);
        }
        
        body { 
            background: radial-gradient(circle at top right, #0a2e12, #051b07); 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            color: #fff; margin: 0; overflow-x: hidden; 
        }

        /* --- THE DISTINGUISHED SIDEBAR --- */
        .sidebar { 
            background: var(--emerald-deep); color: white; padding: 30px 20px; 
            height: 100vh; position: fixed; width: 290px; 
            border-right: 2px solid var(--gold); display: flex; flex-direction: column; 
            box-shadow: 15px 0 40px rgba(0,0,0,0.5);
        }
        
        .master-profile {
            border: 1px solid rgba(251, 191, 36, 0.3);
            border-radius: 20px; padding: 20px; background: var(--glass-white);
            text-align: center; margin-bottom: 30px;
        }

        .nav-link { 
            color: rgba(255,255,255,0.7); padding: 14px 18px; border-radius: 12px; 
            display: flex; align-items: center; gap: 15px; transition: 0.4s;
            margin-bottom: 8px; text-decoration: none;
        }
        .nav-link i { color: var(--gold); font-size: 1.2rem; }
        .nav-link:hover { background: var(--glass-white); color: var(--gold); transform: translateX(10px); }
        .nav-link.active { background: var(--emerald-mid); border-left: 5px solid var(--gold); }

        /* --- THE COMMAND ARCHITECTURE --- */
        .main-content { margin-left: 290px; padding: 40px; }
        
        .command-console {
            background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(20px);
            border: 1px solid rgba(251, 191, 36, 0.2);
            padding: 25px; border-radius: 25px; margin-bottom: 30px;
        }

        .viewer-card { 
            height: 65vh; background: #000; border-radius: 30px; 
            overflow: hidden; border: 4px solid var(--emerald-mid); 
            box-shadow: 0 30px 70px rgba(0,0,0,0.6); position: relative;
        }

        /* TASBEEH ENGINE UI */
        .tasbeeh-engine {
            background: linear-gradient(145deg, #0a2e12, #051b07);
            border-radius: 40px; padding: 50px; border: 2px solid var(--gold);
            text-align: center; box-shadow: 0 0 50px rgba(251, 191, 36, 0.2);
        }
        .counter-val { 
            font-size: 8rem; font-weight: 900; color: var(--gold);
            text-shadow: 0 0 30px var(--gold); font-family: 'Courier New', monospace;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="master-profile">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" class="rounded-circle mb-3" style="width: 80px; background: #fff; padding: 3px;">
        <h6 class="fw-bold mb-0">Abid Khan</h6>
        <small class="text-warning">Quranic Visionary</small>
    </div>

    <div class="nav-section-label text-uppercase small opacity-50 mb-3" style="letter-spacing: 2px;">Sacred Stream</div>
    <nav class="nav flex-column">
        <a class="nav-link active" href="#"><i class="fas fa-mosque"></i> Master Dashboard</a>
        <a class="nav-link" onclick="loadF('https://quran.com/1?style=colored', 'Holy Quran Recitation')"><i class="fas fa-quran"></i> Recitation Hub</a>
        <a class="nav-link" onclick="loadF('', 'Tajweed Lessons')"><i class="fas fa-microphone-alt"></i> Tajweed Lessons</a>
        <a class="nav-link" onclick="openT()"><i class="fas fa-fingerprint"></i> Digital Tasbeeh</a>
    </nav>
    
    <div class="mt-auto">
        <button class="btn btn-outline-danger w-100 rounded-pill" onclick="logout()">
            <i class="fas fa-power-off me-2"></i> System Exit
        </button>
    </div>
</div>

<div class="main-content">
    <div id="dashSec">
        <div class="command-console">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <h4 class="fw-bold m-0 text-gold"><i class="fas fa-broadcast-tower me-3"></i>Quran Hub Deployer</h4>
                </div>
                <div class="col-md-7">
                    <div class="input-group">
                        <input type="text" id="urlInput" class="form-control bg-dark text-white border-warning" style="border-radius: 15px 0 0 15px;" placeholder="Paste Zoom, PDF or Recitation URL...">
                        <button class="btn btn-warning px-4 fw-bold" style="border-radius: 0 15px 15px 0;" onclick="deployMasterUrl()">DEPLOY LIVE</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 id="cTitle" class="fw-bold">Spiritual Operational Viewport</h2>
            <span class="badge bg-success border border-warning px-3 py-2 rounded-pill pulse">LIVE STREAM ACTIVE</span>
        </div>

        <div class="viewer-card">
            <iframe id="mFrame" src="about:blank" class="w-100 h-100 border-0"></iframe>
        </div>
    </div>

    <div id="tasSec" class="d-none">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="tasbeeh-engine">
                        <h2 class="text-white mb-4">SACRED COUNTER</h2>
                        <div class="counter-val" id="cnt">0</div>
                        <div class="d-flex gap-3 mt-4">
                            <button class="btn btn-warning flex-grow-1 py-4 fs-3 fw-bold rounded-4 shadow" onclick="cU()">COUNT</button>
                            <button class="btn btn-outline-danger px-4 rounded-4" onclick="rU()">RESET</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let c = 0;
    const frame = document.getElementById('mFrame');

    window.onload = () => showWelcome();

    function deployMasterUrl() {
        const input = document.getElementById('urlInput');
        let url = input.value.trim();
        if(url) {
            frame.srcdoc = ""; 
            if(!url.startsWith('http')) url = 'https://' + url;
            
            // The Genius Bridge for Restricted Sites (Zoom/Google)
            const restricted = ['zoom.us', 'google.com', 'whatsapp.com'];
            if(restricted.some(site => url.includes(site))) {
                frame.srcdoc = `<body style="background:#051b07; color:white; font-family:sans-serif; display:flex; align-items:center; justify-content:center; height:100vh; margin:0; text-align:center;">
                    <div style="border:2px solid #fbbf24; padding:50px; border-radius:40px; background:rgba(255,255,255,0.05); backdrop-filter:blur(10px);">
                        <i class="fas fa-shield-alt" style="font-size:4rem; color:#fbbf24; margin-bottom:25px;"></i>
                        <h2 style="color:#fbbf24; letter-spacing:1px;">SECURE EXTERNAL PORTAL</h2>
                        <p style="opacity:0.8;">Platform <b>${url}</b> is active and secured.</p>
                        <a href="${url}" target="_blank" style="display:inline-block; margin-top:25px; text-decoration:none; padding:18px 50px; background:#fbbf24; color:#051b07; border-radius:15px; font-weight:900; box-shadow:0 10px 30px rgba(0,0,0,0.5);">LAUNCH MASTER TAB</a>
                    </div>
                </body><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">`;
            } else {
                frame.src = url;
            }
            document.getElementById('cTitle').innerText = "Live: " + url;
            input.value = "";
        }
    }

    function cU() { 
        c++; 
        document.getElementById('cnt').innerText = c; 
        if(navigator.vibrate) navigator.vibrate(70); 
    }
    
    function rU() { if(confirm("Master, shall we reset the count?")) { c = 0; document.getElementById('cnt').innerText = c; } }

    function loadF(u, t) { 
        document.getElementById('dashSec').classList.remove('d-none'); 
        document.getElementById('tasSec').classList.add('d-none'); 
        document.getElementById('cTitle').innerText = t; 
        frame.srcdoc = ""; frame.src = u; 
    }

    function openT() { 
        document.getElementById('dashSec').classList.add('d-none'); 
        document.getElementById('tasSec').classList.remove('d-none'); 
    }

    function showWelcome() {
        frame.srcdoc = `<body style="background:radial-gradient(circle, #0a2e12, #051b07); color:white; font-family:sans-serif; display:flex; align-items:center; justify-content:center; height:100vh; margin:0; text-align:center;">
            <div style="border:1px solid rgba(251,191,36,0.3); padding:60px; border-radius:50px; background:rgba(255,255,255,0.02); backdrop-filter:blur(15px);">
                <h1 style="color:#fbbf24; font-size:5rem; margin:0; text-shadow:0 0 20px rgba(251,191,36,0.4);">Bismillah</h1>
                <p style="font-size:1.5rem; letter-spacing:5px; color:#a5d6a7;">QURANIC COMMAND CENTER</p>
                <div style="width:100px; height:2px; background:#fbbf24; margin:30px auto;"></div>
                <p style="font-size:0.8rem; color:#fbbf24; opacity:0.6;">ABID KHAN GLOBAL VISION v2.0</p>
            </div></body>`;
    }

    function logout() { location.href='index.html'; }
</script>
</body>
</html>