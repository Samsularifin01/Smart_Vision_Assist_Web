<!DOCTYPE html>
<html>
<head>
    <title>Settings - Smart Vision</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="/css/sidebar.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="d-flex" style="min-height: 100vh;">

    <!-- SIDEBAR -->
    @include('layouts.sidebar')

    <!-- MAIN CONTENT -->
    <div class="flex-grow-1 d-flex flex-column">

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">
                    <i class="fa fa-cog me-2"></i>Settings</span>
            </div>
        </nav>

        <!-- CONTENT -->
        <div class="container-fluid mt-4 px-4 flex-grow-1">

            <h4 class="mb-4">Settings</h4>

            <div class="row g-3">

                <!-- PROFILE -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <i class="fa fa-user me-2"></i>Profile
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" value="Admin">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="admin@gmail.com">
                                </div>

                                <button class="btn btn-primary">
                                    <i class="fa fa-save me-2"></i>Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- PASSWORD -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <i class="fa fa-lock me-2"></i>Ubah Password
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Password Lama</label>
                                    <input type="password" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password Baru</label>
                                    <input type="password" class="form-control">
                                </div>

                                <button class="btn btn-success">
                                    <i class="fa fa-check me-2"></i>Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-- SYSTEM SETTINGS -->
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-info text-white">
                    <i class="fa fa-cog me-2"></i>System Settings
                </div>

                <div class="card-body">
                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="notif" checked>
                        <label class="form-check-label" for="notif">Aktifkan Notifikasi</label>
                    </div>

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="darkmode">
                        <label class="form-check-label" for="darkmode">Mode Gelap</label>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>