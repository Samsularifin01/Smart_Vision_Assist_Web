<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi OTP - Smart Vision</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="/css/verify-otp.css" rel="stylesheet">
</head>

<body>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2><i class="fas fa-eye" style="color: #667eea;"></i> Smart Vision</h2>
                <p>Masukkan kode OTP yang dikirim ke email Anda</p>
            </div>

            <form id="otpForm" onsubmit="return false;">
                <div class="form-group otp-group">
                    <!-- GANTI: label lama diganti markup yang lebih menarik -->
                    <label class="form-label otp-label">
                        Kode <span class="otp-accent">OTP</span>
                        <span class="otp-sub">Masukkan 6 digit kode yang dikirim ke email Anda</span>
                    </label>

                    <div class="form-icon otp-icon">
                        <i class="fas fa-key"></i>
                        <input type="text" id="otp_code" class="form-control otp-input"
                            placeholder="Masukkan Kode" inputmode="numeric" pattern="\d{6}" maxlength="6"
                            required>
                    </div>

                    <div id="otp-timer" class="otp-timer mt-2">01:00</div>
                </div>

                <div class="forgot-password">
                    <a href="/forgot-password" class="text-decoration-none">Kirim ulang email?</a>
                </div>

                <button id="verifyBtn" type="button" class="btn btn-login" onclick="return handleVerify()">
                    <i class="fas fa-check me-2"></i>Verifikasi
                </button>
            </form>

            <div class="signup-section">
                <p>Ingin kembali? <a href="/">Login</a></p>
            </div>
        </div>
    </div>

    <script>
    /* timer 60 detik */
    let timeLeft = 60;
    const timerEl = document.getElementById('otp-timer');
    const verifyBtn = document.getElementById('verifyBtn');

    function formatTime(s) {
        const m = Math.floor(s / 60).toString().padStart(2, '0');
        const sec = (s % 60).toString().padStart(2, '0');
        return `${m}:${sec}`;
    }

    if (timerEl) {
        timerEl.textContent = formatTime(timeLeft);
        const countdown = setInterval(() => {
            timeLeft--;
            timerEl.textContent = formatTime(timeLeft);
            if (timeLeft <= 0) {
                clearInterval(countdown);
                timerEl.textContent = 'Waktu habis';
                verifyBtn.disabled = true;
                verifyBtn.classList.add('disabled');
            }
        }, 1000);
    }

    /* validasi OTP 6 digit numeric dan redirect ke reset-password */
    function handleVerify() {
        const otpEl = document.getElementById('otp_code');
        const otp = otpEl ? otpEl.value.trim() : '';

        if (verifyBtn.disabled) {
            alert('Waktu OTP habis. Silakan kirim ulang.');
            return false;
        }

        if (!otp) {
            alert('OTP harus diisi!');
            return false;
        }
        if (!/^\d{6}$/.test(otp)) {
            alert('OTP harus 6 digit angka!');
            return false;
        }

        // jika valid -> redirect ke reset-password
        window.location.href = '/reset-password';
        return true;
    }
    </script>

</body>

</html>