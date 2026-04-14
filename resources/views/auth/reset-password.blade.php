<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg border-0 p-4" style="width: 380px;">
        
        <h4 class="text-center mb-3">Reset Password</h4>

        <!-- pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- pesan error -->
        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/reset-password">
            @csrf
            <input type="hidden" name="email" value="{{ session('email') }}">

            <div class="mb-3 position-relative">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password Baru">
                <span onclick="togglePassword()" style="position:absolute; right:10px; top:10px; cursor:pointer;">👁️</span>
            </div>
            <small id="strengthText" class="text-muted"></small>
            <div class="mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
            </div>

            <button class="btn btn-success w-100">Simpan Password</button>
        </form>

        <div class="text-center mt-3">
            <a href="/" class="text-decoration-none">Kembali ke Login</a>
        </div>
    </div>
</div>
<script>
document.getElementById("password").addEventListener("input", function() {
    let val = this.value;
    let text = document.getElementById("strengthText");

    if (val.length < 6) {
        text.innerHTML = "Password lemah";
        text.className = "text-danger";
    } else if (val.match(/[A-Z]/) && val.match(/[0-9]/)) {
        text.innerHTML = "Password kuat";
        text.className = "text-success";
    } else {
        text.innerHTML = "Password sedang";
        text.className = "text-warning";
    }
});
</script>
</body>
</html>