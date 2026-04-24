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

        <form id="loginForm" method="POST" action="/login">
            @csrf
            
            <!-- Tampilkan Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Tampilkan Success Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div>{{ session('success') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Email Input -->
            <div class="form-group">
                <label for="email">Email</label>
                <div class="form-icon">
                    <i class="fas fa-envelope"></i>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" id="email" placeholder="Masukkan email Anda" 
                           value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Input dengan Toggle Show/Hide -->
            <div class="form-group">
                <label for="password">Password</label>
                <div class="form-icon">
                    <i class="fas fa-lock"></i>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" id="password" placeholder="Masukkan password Anda" required>
                    <button type="button" class="password-toggle" id="togglePassword" tabindex="-1">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <span class="invalid-feedback d-block">{{ $message }}</span>
                @enderror
            </div>

            <!-- Forgot Password -->
            <div class="forgot-password">
                <a href="/forgot-password">Lupa password?</a>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn btn-login">
                <i class="fas fa-sign-in-alt me-2"></i>Login
            </button>
        </form>

        <!-- Sign Up Link -->
        <div class="signup-section">
            <p>Belum punya akun? <a href="/register">Daftar sekarang</a></p>
        </div>
    </div>
</div>

<!-- Script untuk toggle show/hide password -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.getElementById('togglePassword');
        const toggleIcon = toggleButton.querySelector('i');

        // Event listener untuk tombol toggle
        toggleButton.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Cek tipe input saat ini
            const isPassword = passwordInput.type === 'password';
            
            // Toggle tipe input
            passwordInput.type = isPassword ? 'text' : 'password';
            
            // Toggle icon
            toggleIcon.classList.toggle('fa-eye');
            toggleIcon.classList.toggle('fa-eye-slash');
            
            // Optional: Add animation
            toggleButton.style.transform = 'translateY(-50%) scale(1.2)';
            setTimeout(() => {
                toggleButton.style.transform = 'translateY(-50%) scale(1)';
            }, 100);
        });

        // Optional: Keyboard shortcut (Alt + P untuk toggle password)
        document.addEventListener('keydown', function(e) {
            if (e.altKey && e.key === 'p') {
                toggleButton.click();
            }
        });

        // Optional: Auto-focus to email field
        document.getElementById('email').focus();

        // Close alert dengan tombol X
        const closeButtons = document.querySelectorAll('.btn-close');
        closeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const alert = this.closest('.alert');
                if (alert) {
                    alert.style.animation = 'slideOutUp 0.3s ease-in forwards';
                    setTimeout(() => {
                        alert.remove();
                    }, 300);
                }
            });
        });
    });
</script>

</body>
</html>
