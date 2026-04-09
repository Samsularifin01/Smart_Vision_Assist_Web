<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 400px;">
        <h3 class="text-center mb-3">Login</h3>

        <form>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Masukkan email">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Masukkan password">
            </div>

            <div class="d-flex justify-content-between mb-3">
                <a href="/forgot-password">Lupa Password?</a>
            </div>

            <a href="/dashboard" class="btn btn-primary w-100">Login</a>
    
        </form>


        <p class="text-center mt-3">
            Belum punya akun? <a href="/register">Sign Up</a>
        </p>
    </div>
</div>

</body>
</html>