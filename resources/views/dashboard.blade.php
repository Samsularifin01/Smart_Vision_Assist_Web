<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    @include('layouts.sidebar')

    <!-- CONTENT -->
    <div class="flex-grow-1">

        

        <!-- MAIN CONTENT -->
        <div class="container-fluid mt-4 px-4">

            <div class="row g-3">

                <!-- CARD 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h6>Total Users</h6>
                            <h3>10</h3>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="col-md-6 col-lg-3">
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

                <div class="card-body table-responsive">

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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>