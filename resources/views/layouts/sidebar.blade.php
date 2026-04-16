<div class="bg-dark text-white p-4" style="width:250px; min-height:100vh; box-shadow: 2px 0 10px rgba(0,0,0,0.1);">

    <h4 class="text-center mb-5 fw-bold" style="font-size: 1.5rem; letter-spacing: 1px;">
        <i class="fa fa-eye me-2" style="color: #007bff;"></i>Smart Vision
    </h4>
    <ul class="nav flex-column gap-2">
        <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('dashboard') ? 'bg-primary rounded-3' : '' }}"
                href="/dashboard" style="transition: all 0.3s ease; padding: 12px 16px; border-radius: 8px;">
                <i class="fa fa-home me-3"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('users*') ? 'bg-primary rounded-3' : '' }}" href="#"
                style="transition: all 0.3s ease; padding: 12px 16px; border-radius: 8px;">
                <i class="fa fa-users me-3"></i> Users
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white {{ request()->is('settings') ? 'bg-primary rounded-3' : '' }}" href="#"
                style="transition: all 0.3s ease; padding: 12px 16px; border-radius: 8px;">
                <i class="fa fa-cog me-3"></i> Settings
            </a>
        </li>

    </ul>

    <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">

    <div class="mt-auto">
        <a class="nav-link text-white bg-danger rounded-3" href="/"
            style="transition: all 0.3s ease; padding: 12px 16px; border-radius: 8px; text-align: center; margin-top: auto;">
            <i class="fa fa-sign-out-alt me-2"></i> Logout
        </a>
    </div>

</div>

<style>
    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1) !important;
        padding-left: 20px !important;
    }

    .nav-link.bg-primary:hover {
        background-color: #0056b3 !important;
    }

    .nav-link.bg-danger:hover {
        background-color: #c82333 !important;
        transform: translateX(5px);
    }
</style>