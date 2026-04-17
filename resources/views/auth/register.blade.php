<!DOCTYPE html>
<html>
<head>
    <title>Register - Smart Vision</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="/css/register.css" rel="stylesheet">
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <div class="login-header">
            <h2><i class="fas fa-eye" style="color: #667eea;"></i> Smart Vision</h2>
            <p>Buat akun baru Anda</p>
        </div>

        <form id="registerForm">
            <div class="form-group">
                <label>Nama</label>
                <div class="form-icon">
                    <i class="fas fa-user"></i>
                    <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda" required>
                </div>
            </div>

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
                    <input type="password" class="form-control" id="password" placeholder="Masukkan password" required>
                </div>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <div class="form-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="form-control" id="password_confirm" placeholder="Konfirmasi password" required>
                </div>
            </div>

            <a href="/" class="btn btn-login" onclick="return validateRegister()">
                <i class="fas fa-user-plus me-2"></i>Daftar
            </a>
        </form>

        <div class="signup-section">
            <p>Sudah punya akun? <a href="/">Login</a></p>
        </div>
    </div>
</div>

<script>
    function validateRegister() {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const password_confirm = document.getElementById('password_confirm').value;

        if (!name || !email || !password || !password_confirm) {
            alert('Semua field harus diisi!');
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
        if (password !== password_confirm) {
            alert('Password dan konfirmasi tidak cocok!');
            return false;
        }

        // Jika valid, lanjutkan ke halaman login (atau ke dashboard jika ingin)
        return true;
    }
</script>

</body>
</html>