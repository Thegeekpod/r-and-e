<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Roy Infinity Edge</title>
    
    <!-- Bootstrap 5 CSS & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sidebar-bg: #0C2924;
            --sidebar-hover: #13443C;
            --primary-accent: #03594A;
            --lime-accent: #B9FF66;
            --body-bg: #F4F7F6;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--body-bg);
            color: #2D3748;
            overflow-x: hidden;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            min-height: 100vh;
            background-color: var(--sidebar-bg);
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px 20px;
            font-size: 1.15rem;
            font-weight: 700;
            color: #fff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .sidebar-brand span {
            color: var(--lime-accent);
        }

        .sidebar-nav {
            padding: 20px 0;
            list-style: none;
            margin: 0;
        }

        .sidebar-nav .nav-header {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255, 255, 255, 0.4);
            padding: 10px 24px 6px;
            font-weight: 700;
        }

        .sidebar-nav .nav-item .nav-link {
            padding: 12px 24px;
            color: rgba(255, 255, 255, 0.75);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: all 0.2s ease;
            border-left: 4px solid transparent;
        }

        .sidebar-nav .nav-item .nav-link:hover,
        .sidebar-nav .nav-item .nav-link.active {
            color: #fff;
            background-color: var(--sidebar-hover);
            border-left-color: var(--lime-accent);
        }

        .sidebar-nav .nav-item .nav-link i {
            width: 20px;
            font-size: 1.1rem;
        }

        /* Main Content */
        .admin-main {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .admin-topbar {
            height: 70px;
            background: #fff;
            border-bottom: 1px solid #E2E8F0;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .admin-content {
            padding: 30px;
            flex: 1;
        }

        /* Cards & Components */
        .admin-card {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #E2E8F0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .admin-card-header {
            padding: 20px 24px;
            border-bottom: 1px solid #E2E8F0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #FAFCFB;
        }

        .admin-card-header h5 {
            margin: 0;
            font-weight: 700;
            color: var(--sidebar-bg);
            font-size: 1.1rem;
        }

        .admin-card-body {
            padding: 24px;
        }

        .btn-primary-admin {
            background-color: var(--primary-accent);
            border-color: var(--primary-accent);
            color: #fff;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px 22px;
            transition: all 0.2s;
        }

        .btn-primary-admin:hover {
            background-color: var(--sidebar-bg);
            border-color: var(--sidebar-bg);
            color: #fff;
            transform: translateY(-1px);
        }

        .img-preview-box {
            border: 2px dashed #CBD5E1;
            border-radius: 12px;
            padding: 12px;
            text-align: center;
            background: #F8FAFC;
            margin-top: 10px;
            max-width: 260px;
        }

        .img-preview-box img {
            max-width: 100%;
            max-height: 140px;
            object-fit: contain;
            border-radius: 8px;
        }

        .nav-tabs .nav-link {
            color: #64748B;
            font-weight: 600;
            border: none;
            padding: 12px 20px;
            border-bottom: 3px solid transparent;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-accent);
            border-bottom-color: var(--primary-accent);
            background: transparent;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.9rem;
            color: #334155;
            margin-bottom: 6px;
        }

        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #CBD5E1;
            padding: 10px 14px;
            font-size: 0.95rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-accent);
            box-shadow: 0 0 0 3px rgba(3, 89, 74, 0.15);
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <i class="fa-solid fa-shield-halved"></i>
            <span>Roy Infinity</span> Admin
        </a>

        <ul class="sidebar-nav">
            <li class="nav-header">Main Menu</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-gauge-high"></i> Dashboard
                </a>
            </li>

            <li class="nav-header">Content Management</li>
            <li class="nav-item">
                <a href="{{ route('admin.home.index') }}" class="nav-link {{ request()->routeIs('admin.home.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-house-laptop"></i> Home Page Content
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.finance.index') }}" class="nav-link {{ request()->routeIs('admin.finance.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-coins"></i> Finance Page Content
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-comment-dots"></i> Testimonials
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.clients.index') }}" class="nav-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-handshake"></i> Client Partners
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.contacts.index') }}" class="nav-link d-flex justify-content-between align-items-center {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <span><i class="fa-solid fa-envelope-open-text"></i> Inquiries & Leads</span>
                    @php $unreadNavCount = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
                    @if($unreadNavCount > 0)
                        <span class="badge bg-danger rounded-pill">{{ $unreadNavCount }}</span>
                    @endif
                </a>
            </li>

            <li class="nav-header">Site Configuration</li>
            <li class="nav-item">
                <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-toggle-on text-success"></i> Page Visibility Manager
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-sliders"></i> Global Settings
                </a>
            </li>
            <li class="nav-item mt-3">
                <a href="{{ route('home') }}" target="_blank" class="nav-link text-warning">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i> View Live Site
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content Area -->
    <div class="admin-main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <div>
                <h5 class="m-0 fw-bold">@yield('page-title', 'Dashboard')</h5>
            </div>

            <div class="d-flex align-items-center gap-3">
                <span class="text-muted small">Logged in as: <strong class="text-dark">{{ Auth::user()->name ?? 'Admin' }}</strong></span>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                    </button>
                </form>
            </div>
        </header>

        <!-- Main Body -->
        <main class="admin-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm border-0" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm border-0" role="alert">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm border-0" role="alert">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
