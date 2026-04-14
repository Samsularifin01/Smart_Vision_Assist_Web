<div class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">

    <h4 class="text-center mb-4">Smart Vision</h4>

    <ul class="nav flex-column">

        <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('dashboard') ? 'bg-primary rounded' : '' }}" href="/dashboard">
                <i class="fa fa-home me-2"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('users*') ? 'bg-primary rounded' : '' }}" href="#">
                <i class="fa fa-users me-2"></i> Users
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('settings') ? 'bg-primary rounded' : '' }}" href="#">
                <i class="fa fa-cog me-2"></i> Settings
            </a>
        </li>

        <li class="nav-item mt-3">
            <a class="nav-link text-danger" href="/">
                <i class="fa fa-sign-out-alt me-2"></i> Logout
            </a>
        </li>

    </ul>

</div>