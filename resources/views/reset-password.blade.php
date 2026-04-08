<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 350px;">
        
        <h4 class="text-center mb-3">Reset Password</h4>

        <form method="POST" action="/reset-password">
            @csrf
            <input type="hidden" name="email" value="{{ session('email') }}">

            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password Baru">
            </div>

            <button class="btn btn-success w-100">Simpan</button>
        </form>

    </div>
</div>

</body>
</html>