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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
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
                                        <button class="btn btn-warning btn-sm me-2" onclick="editUser(this)">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm" onclick="deleteUser(this)">
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
                                        <button class="btn btn-warning btn-sm me-2" onclick="editUser(this)">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm" onclick="deleteUser(this)">
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

    <!-- MODAL TAMBAH USER -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Header Modal -->
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addUserLabel">
                        <i class="fa fa-user-plus me-2"></i>Tambah User Baru
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Body Modal -->
                <div class="modal-body">
                    <form id="addUserForm" onsubmit="handleAddUser(event)">

                        <!-- ROW 1: Nama & Phone -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-600">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" id="userName" placeholder="Masukkan nama" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-600">No. Telepon</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="userPhone" 
                                        placeholder="08xxxxxxxxxx" 
                                        inputmode="numeric" 
                                        maxlength="13"
                                        oninput="filterPhoneInput(this)"
                                        required>
                                </div>
                                <small class="text-muted d-block mt-1">Maksimal 13 digit (angka saja)</small>
                                <small id="phoneError" class="text-danger d-block" style="display: none;"></small>
                            </div>
                        </div>

                        <!-- ROW 2: Email & Gender -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-600">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="userEmail" placeholder="email@gmail.com" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-600">Jenis Kelamin</label>
                                <select class="form-select" id="userGender" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <!-- ROW 3: Password & Role -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-600">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" id="userPassword" placeholder="Minimal 6 karakter" required oninput="checkPasswordStrength()">
                                    <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordModal()">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </div>
                                <!-- Password strength indicator -->
                                <div id="pwStrength" class="mt-2 fw-600" style="font-size: 0.9rem;"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-600">Role</label>
                                <select class="form-select" id="userRole" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>

                        <!-- ROW 4: Status -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label fw-600">Status</label>
                                <div class="d-flex gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="userStatus" id="statusAktif" value="aktif" checked>
                                        <label class="form-check-label" for="statusAktif">
                                            <i class="fa fa-check-circle text-success me-1"></i>Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="userStatus" id="statusNonaktif" value="nonaktif">
                                        <label class="form-check-label" for="statusNonaktif">
                                            <i class="fa fa-times-circle text-danger me-1"></i>Nonaktif
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <!-- Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fa fa-times me-2"></i>Batal
                    </button>
                    <button type="button" class="btn btn-primary" onclick="submitAddUser()">
                        <i class="fa fa-save me-2"></i>Tambah User
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Delete user function
        function deleteUser(button) {
            const row = button.closest('tr');
            const userName = row.querySelector('.user-name').textContent.trim();

            // Konfirmasi delete
            if (confirm(`Apakah Anda yakin ingin menghapus user "${userName}"?`)) {
                // Hapus baris dari tabel
                row.remove();

                // Tampilkan toast notifikasi sukses
                showToast(`✓ User "${userName}" berhasil dihapus!`);

                // Update nomor urut
                updateTableNumbers();
            }
        }

        // Edit user function (placeholder untuk fitur edit)
        function editUser(button) {
            const row = button.closest('tr');
            const userName = row.querySelector('.user-name').textContent.trim();
            alert(`Fitur edit untuk "${userName}" akan segera tersedia.`);
        }

        // Update nomor urut di tabel setelah delete
        function updateTableNumbers() {
            const rows = document.querySelectorAll('#userTable tr');
            rows.forEach((row, index) => {
                row.querySelector('td:first-child').textContent = index + 1;
            });
        }

        // Filter phone input — hanya terima angka
        function filterPhoneInput(input) {
            const phoneError = document.getElementById('phoneError');
            
            // Simpan nilai asli
            const originalValue = input.value;
            
            // Hapus semua karakter non-numeric
            input.value = input.value.replace(/[^0-9]/g, '');
            
            // Jika ada perubahan, tampilkan error
            if (originalValue !== input.value && originalValue.length > 0) {
                phoneError.textContent = '⚠ Hanya angka yang diperbolehkan!';
                phoneError.style.display = 'block';
                
                // Hilangkan error message setelah 2 detik
                setTimeout(() => {
                    phoneError.style.display = 'none';
                }, 2000);
            } else {
                phoneError.style.display = 'none';
            }
        }

        // Check password strength dengan indikator visual
        function checkPasswordStrength() {
            const pwInput = document.getElementById('userPassword');
            const pwValue = pwInput.value;
            const strengthEl = document.getElementById('pwStrength');

            const hasUpper = /[A-Z]/.test(pwValue);
            const hasDigit = /[0-9]/.test(pwValue);
            const length = pwValue.length;

            if (length === 0) {
                strengthEl.textContent = '';
                strengthEl.className = 'mt-2 fw-600';
                return;
            }

            if (length < 6) {
                strengthEl.textContent = '✗ Password lemah';
                strengthEl.className = 'mt-2 fw-600 text-danger';
                return;
            }

            if (hasUpper && hasDigit) {
                strengthEl.textContent = '✓ Password kuat';
                strengthEl.className = 'mt-2 fw-600 text-success';
                return;
            }

            strengthEl.textContent = '⚠ Password sedang';
            strengthEl.className = 'mt-2 fw-600 text-warning';
        }

        // Toggle password visibility di modal
        function togglePasswordModal() {
            const pwInput = document.getElementById('userPassword');
            const icon = event.target.closest('button').querySelector('i');
            if (pwInput.type === 'password') {
                pwInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                pwInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Submit form tambah user
        function submitAddUser() {
            const form = document.getElementById('addUserForm');
            if (!form.checkValidity()) {
                alert('Mohon isi semua field yang diperlukan!');
                form.reportValidity();
                return;
            }

            handleAddUser();
        }

        function handleAddUser(event) {
            if (event) event.preventDefault();

            const name = document.getElementById('userName').value.trim();
            const phone = document.getElementById('userPhone').value.trim();
            const email = document.getElementById('userEmail').value.trim();
            const gender = document.getElementById('userGender').value;
            const password = document.getElementById('userPassword').value;
            const role = document.getElementById('userRole').value;
            const status = document.querySelector('input[name="userStatus"]:checked').value;

            // Validasi
            if (!name || !phone || !email || !gender || !password || !role) {
                alert('Semua field harus diisi!');
                return;
            }

            // Validasi phone — hanya angka dan panjang 10-13
            if (!/^\d+$/.test(phone)) {
                alert('Nomor telepon hanya boleh berisi angka!');
                return;
            }

            if (phone.length < 10 || phone.length > 13) {
                alert('Nomor telepon harus 10-13 digit!');
                return;
            }

            if (password.length < 6) {
                alert('Password minimal 6 karakter!');
                return;
            }

            if (!email.includes('@')) {
                alert('Email tidak valid!');
                return;
            }

            // Tambah ke tabel (sementara tanpa database)
            addUserToTable(name, email, status);

            // Tampilkan toast notifikasi
            showToast(`✓ User "${name}" berhasil ditambahkan!`);

            // Reset form & tutup modal
            document.getElementById('addUserForm').reset();
            document.getElementById('pwStrength').textContent = '';
            const modal = bootstrap.Modal.getInstance(document.getElementById('addUserModal'));
            modal.hide();
        }

        function addUserToTable(name, email, status) {
            const table = document.getElementById('userTable');
            const rowCount = table.rows.length + 1;
            const statusBadge = status === 'aktif' 
                ? '<span class="badge bg-success">Aktif</span>' 
                : '<span class="badge bg-secondary">Nonaktif</span>';

            const newRow = `
                <tr>
                    <td>${rowCount}</td>
                    <td>
                        <div class="user-name">
                            <i class="fa fa-circle-user me-2"></i>${name}
                        </div>
                    </td>
                    <td>${email}</td>
                    <td>${statusBadge}</td>
                    <td>
                        <button class="btn btn-warning btn-sm me-2" onclick="editUser(this)">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm" onclick="deleteUser(this)">
                            <i class="fa fa-trash"></i> Hapus
                        </button>
                    </td>
                </tr>
            `;

            table.innerHTML += newRow;
        }

        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'toast-notification';
            toast.textContent = message;
            toast.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: #28a745;
                color: white;
                padding: 16px 24px;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 9999;
                animation: slideInRight 0.4s ease-out;
            `;
            document.body.appendChild(toast);

            setTimeout(() => toast.remove(), 3000);
        }

        // Filter table (existing code)
        const searchInput = document.getElementById("searchInput");
        const statusFilter = document.getElementById("statusFilter");
        const rows = document.querySelectorAll("#userTable tr");

        function filterTable() {
            let search = searchInput.value.toLowerCase();
            let status = statusFilter.value;

            document.querySelectorAll("#userTable tr").forEach(row => {
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