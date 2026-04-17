<!DOCTYPE html>
<html>
<head>
	<title>Reset Password - Smart Vision</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
	<link href="/css/reset-password.css" rel="stylesheet">
	<style>
		/* toast notification */
		.toast-notification {
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
		}

		@keyframes slideInRight {
			from { transform: translateX(400px); opacity: 0; }
			to { transform: translateX(0); opacity: 1; }
		}
	</style>
</head>
<body>

<div class="login-container">
	<div class="login-card">
		<div class="login-header">
			<h2><i class="fas fa-eye" style="color: #667eea;"></i> Smart Vision</h2>
			<p>Atur ulang password Anda</p>
		</div>

		<form id="resetForm" onsubmit="return false;">
			<div class="form-group">
				<label>Password Baru</label>
				<div class="password-wrapper">
					<div class="form-icon">
						<i class="fas fa-lock"></i>
						<input type="password" class="form-control" id="new_password" placeholder="Masukkan password baru" required>
					</div>
					<button type="button" class="password-toggle" id="toggleNew" aria-label="Toggle password" onclick="togglePassword('new_password','toggleNew')">
						<i class="fas fa-eye"></i>
					</button>
				</div>
				<!-- strength indicator -->
				<div id="pw_strength" class="mt-2"></div>
			</div>

			<div class="form-group">
				<label>Konfirmasi Password</label>
				<div class="password-wrapper">
					<div class="form-icon">
						<i class="fas fa-lock"></i>
						<input type="password" class="form-control" id="confirm_password" placeholder="Konfirmasi password" required>
					</div>
					<button type="button" class="password-toggle" id="toggleConfirm" aria-label="Toggle password" onclick="togglePassword('confirm_password','toggleConfirm')">
						<i class="fas fa-eye"></i>
					</button>
				</div>
			</div>

			<button type="button" class="btn btn-login" onclick="return handleReset()">
				<i class="fas fa-check me-2"></i>Simpan Password
			</button>
		</form>

		<div class="signup-section">
			<p>Ingin kembali? <a href="/">Login</a></p>
		</div>
	</div>
</div>

<script>
// toggle show/hide password
function togglePassword(inputId, btnId){
	const input = document.getElementById(inputId);
	const btn = document.getElementById(btnId);
	if(!input || !btn) return;
	const icon = btn.querySelector('i');
	if(input.type === 'password'){
		input.type = 'text';
		if(icon){ icon.classList.remove('fa-eye'); icon.classList.add('fa-eye-slash'); }
	} else {
		input.type = 'password';
		if(icon){ icon.classList.remove('fa-eye-slash'); icon.classList.add('fa-eye'); }
	}
}

// password strength evaluation
const newPw = document.getElementById('new_password');
const strengthEl = document.getElementById('pw_strength');

if(newPw){
	newPw.addEventListener('input', () => {
		const val = newPw.value;
		const hasUpper = /[A-Z]/.test(val);
		const hasDigit = /[0-9]/.test(val);

		if(val.length === 0){
			strengthEl.textContent = '';
			strengthEl.className = 'mt-2';
			return;
		}

		if(val.length < 6){
			strengthEl.textContent = 'Password lemah';
			strengthEl.className = 'mt-2 text-danger';
			return;
		}

		if(hasUpper && hasDigit){
			strengthEl.textContent = 'Password kuat';
			strengthEl.className = 'mt-2 text-success';
			return;
		}

		strengthEl.textContent = 'Password sedang';
		strengthEl.className = 'mt-2 text-warning';
	});
}

function handleReset(){
	const p = document.getElementById('new_password').value;
	const c = document.getElementById('confirm_password').value;
	if(!p || !c){
		alert('Semua field harus diisi!');
		return false;
	}
	if(p.length < 6){
		alert('Password minimal 6 karakter!');
		return false;
	}
	if(p !== c){
		alert('Password dan konfirmasi tidak cocok!');
		return false;
	}
	
	// tampilkan toast notif sukses, lalu redirect
	showToast('✓ Reset password berhasil! Silakan login dengan password baru Anda.');
	setTimeout(() => {
		window.location.href = '/';
	}, 2000);
	return true;
}

function showToast(message){
	const toast = document.createElement('div');
	toast.className = 'toast-notification';
	toast.textContent = message;
	document.body.appendChild(toast);
	
	setTimeout(() => {
		toast.remove();
	}, 3000);
}
</script>

</body>
</html>