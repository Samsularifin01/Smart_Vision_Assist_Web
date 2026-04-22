<!DOCTYPE html>
<html>

<head>
    <title>User Management - Smart Vision</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="/css/sidebar.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/users.css" rel="stylesheet">
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
                        <i class="fa fa-users me-2"></i>User Management
                    </span>
                </div>
            </nav>

            <!-- CONTENT -->
            <div class="container-fluid mt-4 px-4 flex-grow-1">

                <!-- HEADER dengan button tambah -->
                <div class="users-header mb-4">
                    <h4 class="users-title">Kelola Pengguna</h4>
                    <button class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>Tambah User
                    </button>
                </div>

                <!-- FILTER SECTION -->
                <div class="users-filters mb-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="search-wrapper">
                                <i class="fa fa-search"></i>
                                <input type="text" id="searchInput" class="form-control" placeholder="Cari user...">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <select id="statusFilter" class="form-select">
                                <option value="">Semua Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Nonaktif">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- TABLE CARD -->
                <div class="card users-card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <i class="fa fa-table me-2"></i>Data User
                    </div>

                    <div class="card-body table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="25%">Nama</th>
                                    <th width="30%">Email</th>
                                    <th width="15%">Status</th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody id="userTable">
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="user-name">
                                            <i class="fa fa-circle-user me-2"></i>Samsul
                                        </div>
                                    </td>
                                    <td>samsul@gmail.com</td>
                                    <td>
                                        <span class="badge bg-success">Aktif</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm me-2">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="user-name">
                                            <i class="fa fa-circle-user me-2"></i>Budi
                                        </div>
                                    </td>
                                    <td>budi@gmail.com</td>
                                    <td>
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm me-2">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </td>
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

    <script>
        const searchInput = document.getElementById("searchInput");
        const statusFilter = document.getElementById("statusFilter");
        const rows = document.querySelectorAll("#userTable tr");

        function filterTable() {
            let search = searchInput.value.toLowerCase();
            let status = statusFilter.value;

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                let statusBadge = row.querySelector(".badge");
                let rowStatus = statusBadge ? statusBadge.innerText : "";

                let matchSearch = text.includes(search);
                let matchStatus = status === "" || rowStatus === status;

                if (matchSearch && matchStatus) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        searchInput.addEventListener("keyup", filterTable);
        statusFilter.addEventListener("change", filterTable);
    </script>

</body>

</html>