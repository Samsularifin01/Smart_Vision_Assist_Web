<!DOCTYPE html>
<html>

<head>
    <title>Verifikasi OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg border-0 p-4" style="width: 350px;">

            <h4 class="text-center mb-3">Verifikasi OTP</h4>
            <form method="POST" action="/verify-otp">
                @csrf
                <input type="hidden" name="email" value="{{ session('email') }}">
                <div class="mb-3">
                    <input type="text" name="otp" class="form-control text-center" placeholder="Masukkan OTP">
                </div>
                <button class="btn btn-primary w-100">Verifikasi</button>
            </form>
            <div class="text-center mt-2">
                <small id="timer" class="text-danger"></small>
            </div>
        </div>
    </div>
</body>
<script>
let time = 300; // 5 menit

let timer = setInterval(function() {
    let minutes = Math.floor(time / 60);
    let seconds = time % 60;

    document.getElementById("timer").innerHTML =
        "OTP berlaku: " + minutes + ":" + (seconds < 10 ? "0" : "") + seconds;

    time--;

    if (time < 0) {
        clearInterval(timer);
        document.getElementById("timer").innerHTML = "OTP sudah expired";
    }
}, 1000);
</script>
</html>