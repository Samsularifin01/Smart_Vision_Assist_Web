<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">

        <h4 class="text-center mb-4">Smart Vision</h4>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="/dashboard">
                    <i class="fa fa-home"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="fa fa-users"></i> Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="fa fa-chart-bar"></i> Analytics
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">
                    <i class="fa fa-cog"></i> Settings
                </a>
            </li>

            <li class="nav-item mt-3">
                <a class="nav-link text-danger" href="/">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- CONTENT -->
    <div class="flex-grow-1">
        <!-- NAVBAR -->
        <nav class="navbar navbar-light bg-light shadow-sm px-3">
            <span class="navbar-brand mb-0 h5">Dashboard</span>
        </nav>
        <!-- MAIN -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h6>Total Users</h6>
                            <h3>10</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h6>Status Sistem</h6>
                            <h3 class="text-success">Aktif</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- TABLE -->
            <div class="card mt-4 shadow-sm">
                <div class="card-header">
                    Data User
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Samsul</td>
                                <td>samsul@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>