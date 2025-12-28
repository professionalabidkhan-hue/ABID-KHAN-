<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Identity Recovery | ABID KHAN HUB</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        :root { --primary-blue: #4fc3f7; --dark-bg: #07090d; --input-black: #000; --border: rgba(255, 255, 255, 0.1); }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: radial-gradient(circle at bottom left, #1a1c2c, #07090d); color: #fff; height: 100vh; display: flex; align-items: center; justify-content: center; margin: 0; }
        .form-container { background: rgba(13, 17, 23, 0.8); backdrop-filter: blur(25px); border: 1px solid var(--border); border-radius: 35px; padding: 40px; width: 100%; max-width: 400px; box-shadow: 0 40px 100px rgba(0,0,0,0.7); }
        input, select { width: 100%; background: #000; border: 1px solid var(--border); color: #fff; border-radius: 12px; padding: 12px; margin-bottom: 20px; outline: none; }
        button { background: var(--primary-blue); color: #000; font-weight: 800; border: none; padding: 15px; border-radius: 15px; width: 100%; text-transform: uppercase; cursor: pointer; transition: 0.5s; }
        button:hover { background: #fff; transform: translateY(-3px); }
    </style>
</head>
<body>
<div class="form-container">
    <h2 style="text-align:center;">RECOVERY PORTAL</h2>
    <label style="font-size:0.7rem; color:var(--primary-blue); font-weight:800;">CONTACT NUMBER</label>
    <div style="display:flex; gap:10px;">
        <select id="country-code" style="width:100px;"><option value="+92">🇵🇰 +92</option></select>
        <input type="tel" id="phone" placeholder="3497469638">
    </div>
    <button type="button" id="send-otp-btn">Send OTP</button>

    <div id="otp-section" style="display:none; margin-top:20px;">
        <input type="text" id="otp-input" placeholder="Enter 6-Digit Code">
        <button type="button" id="verify-btn">Verify Identity</button>
    </div>
</div>

<script>
    const sendBtn = document.getElementById('send-otp-btn');
    const otpSection = document.getElementById('otp-section');

    sendBtn.onclick = async () => {
        const phone = document.getElementById('phone').value;
        const fullNumber = document.getElementById('country-code').value + phone;
        
        const res = await fetch('recovery_process.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ action: 'send_otp', whatsapp_no: fullNumber })
        });
        const result = await res.json();
        if(result.success) {
            alert("OTP generated! CHECK CONSOLE (F12) TO SEE CODE.");
            console.log("MASTER OTP:", result.debug_otp);
            sessionStorage.setItem('temp_otp', result.debug_otp);
            sessionStorage.setItem('recovery_phone', fullNumber);
            otpSection.style.display = 'block';
        } else { alert(result.message); }
    };

    document.getElementById('verify-btn').onclick = () => {
        if(document.getElementById('otp-input').value === sessionStorage.getItem('temp_otp')) {
            window.location.href = 'reset_password.html';
        } else { alert("Invalid OTP"); }
    };
</script>
</body>
</html>