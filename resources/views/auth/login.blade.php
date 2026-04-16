<!DOCTYPE html>
<html>
<head>
    <title>Login - Smart Vision</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h2><i class="fas fa-eye" style="color: #667eea;"></i> Smart Vision</h2>
            <p>Masuk ke akun Anda</p>
        </div>

        <form id="loginForm">
            <div class="form-group">
                <label>Email</label>
                <div class="form-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda" required>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="form-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="form-control" id="password" placeholder="Masukkan password Anda" required>
                </div>
            </div>

            <div class="forgot-password">
                <a href="/forgot-password">Lupa password?</a>
            </div>

            <a href="/dashboard" class="btn btn-login" onclick="return validateLogin()">
                <i class="fas fa-sign-in-alt me-2"></i>Login
            </a>
        </form>

        <div class="signup-section">
            <p>Belum punya akun? <a href="/register">Daftar sekarang</a></p>
        </div>
    </div>
</div>

<script>
    function validateLogin() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        if (email === '' || password === '') {
            alert('Email dan Password harus diisi!');
            return false;
        }

        if (!email.includes('@')) {
            alert('Email tidak valid!');
            return false;
        }

        if (password.length < 6) {
            alert('Password minimal 6 karakter!');
            return false;
        }

        return true;
    }
</script>

</body>
</html>