<!DOCTYPE html>
<html>

<head>
    <title>Users</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">
    <link href="/css/sidebar.css" rel="stylesheet">
</head>

<body>

    <div class="d-flex">

        @include('layouts.sidebar')

        <div class="flex-grow-1">



            <div class="container-fluid mt-4 px-4">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>User Management</h4>
                    <button class="btn btn-primary">+ Tambah User</button>
                </div>

                <div class="row mb-3">

                    <!-- SEARCH -->
                    <div class="col-md-6">
                        <input type="text" id="searchInput" class="form-control" placeholder="Cari user...">
                    </div>

                    <!-- FILTER STATUS -->
                    <div class="col-md-3">
                        <select id="statusFilter" class="form-select">
                            <option value="">Semua Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Nonaktif">Nonaktif</option>
                        </select>
                    </div>

                </div>

                <!-- TABLE -->
                <div class="card shadow-sm">
                    <div class="card-body table-responsive">

                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody id="userTable">

                                <tr>
                                    <td>1</td>
                                    <td>Samsul</td>
                                    <td>samsul@gmail.com</td>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>Budi</td>
                                    <td>budi@gmail.com</td>
                                    <td><span class="badge bg-secondary">Nonaktif</span></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <script>
        const searchInput = document.getElementById("searchInput");
        const statusFilter = document.getElementById("statusFilter");
        const rows = document.querySelectorAll("#userTable tr");

        function filterTable() {
            let search = searchInput.value.toLowerCase();
            let status = statusFilter.value;

            rows.forEach(row => {
                let text = row.innerText.toLowerCase();
                let rowStatus = row.querySelector("span").innerText;

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