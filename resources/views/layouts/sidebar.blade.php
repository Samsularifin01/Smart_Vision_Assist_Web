<link href="/css/sidebar.css" rel="stylesheet">

<div class="sv-sidebar d-flex flex-column">

	<div class="sv-brand text-center mb-4">
		<i class="fa fa-eye sv-brand-icon"></i>
		<div class="sv-brand-title">Smart Vision</div>
	</div>

	<ul class="nav sv-nav flex-column">
		<li class="nav-item">
			<a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
				<i class="fa fa-home me-3"></i> <span>Dashboard</span>
			</a>
		</li>

		<li class="nav-item">
			<a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="\users">
				<i class="fa fa-users me-3"></i> <span>Users</span>
			</a>
		</li>

		<li class="nav-item">
			<a class="nav-link {{ request()->is('settings') ? 'active' : '' }}" href="/settings">
				<i class="fa fa-cog me-3"></i> <span>Settings</span>
			</a>
		</li>
	</ul>

	<div class="mt-auto sv-logout-wrap">
		<a class="nav-link sv-logout" href="/">
			<i class="fa fa-sign-out-alt me-2"></i> Logout
		</a>
	</div>

</div>