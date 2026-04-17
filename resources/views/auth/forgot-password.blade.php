<!DOCTYPE html>
<html>

<head>
    <title>Lupa Password - Smart Vision</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="/css/forgot-password.css" rel="stylesheet">
</head>

<body>

    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2><i class="fas fa-eye" style="color: #667eea;"></i> Smart Vision</h2>
                <p>Masukkan email Anda untuk menerima OTP</p>
            </div>

            <!-- replaced server POST with client-side navigation -->
            <form id="forgotForm" onsubmit="return false;">
                <div class="form-group">
                    <label>Email</label>
                    <div class="form-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" class="form-control" id="fp_email" name="email"
                            placeholder="Masukkan email Anda" required>
                    </div>
                </div>

                <div class="forgot-password">
                    <a href="/" class="text-decoration-none">Kembali ke Login</a>
                </div>

                <a href="/verify-otp" class="btn btn-login" onclick="return validateForgot()">
                    <i class="fas fa-paper-plane me-2"></i>Kirim OTP
                </a>
            </form>

            <div class="signup-section">
                <p>Belum punya akun? <a href="/register">Daftar sekarang</a></p>
            </div>
        </div>
    </div>

    <!-- optional: small client validation to prevent empty submits -->
    <script>
        function validateForgot() {
            const email = document.getElementById('fp_email').value.trim();
            if (!email) {
                alert('Email harus diisi!');
                return false;
            }
            if (!email.includes('@') || email.length < 5) {
                alert('Email tidak valid!');
                return false;
            }
            // valid -> allow navigation to /verify-otp
            return true;
        }
    </script>

</body>

</html>