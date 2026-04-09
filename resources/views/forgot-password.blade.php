<!DOCTYPE html>
<html>

<head>
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 400px;">
            <h3 class="text-center mb-3">Lupa Password</h3>

            <form>
                <form method="POST" action="/send-otp">
                    @csrf
                    <input type="email" name="email" class="form-control mb-3" placeholder="Masukkan email">

                    <button class="btn btn-warning w-100">Kirim OTP</button>
                </form>
                <p class="text-center mt-3">
                    <a href="/">Kembali ke Login</a>
                </p>
        </div>
    </div>

</body>

</html>