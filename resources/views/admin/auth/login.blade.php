<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Roy Infinity Edge</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #0C2924 0%, #03594A 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            max-width: 440px;
            width: 100%;
            padding: 40px;
        }

        .brand-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background-color: #03594A;
            color: #B9FF66;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            margin: 0 auto 20px;
        }

        .btn-login {
            background-color: #03594A;
            color: #fff;
            font-weight: 600;
            padding: 12px;
            border-radius: 12px;
            width: 100%;
            border: none;
            transition: all 0.2s ease;
        }

        .btn-login:hover {
            background-color: #0C2924;
            color: #fff;
            transform: translateY(-2px);
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            border: 1px solid #E2E8F0;
        }

        .form-control:focus {
            border-color: #03594A;
            box-shadow: 0 0 0 3px rgba(3, 89, 74, 0.15);
        }
    </style>
</head>

<body>
    <div class="login-card">
        <div class="brand-icon">
            <i class="fa-solid fa-shield-halved"></i>
        </div>
        <h4 class="text-center fw-bold mb-1 text-dark">Roy Infinity Edge</h4>
        <p class="text-center text-muted small mb-4">Sign in to your Admin Dashboard</p>

        @if($errors->any())
            <div class="alert alert-danger py-2 small rounded-3">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success py-2 small rounded-3">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold small text-secondary">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-regular fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control border-start-0" placeholder="admin@admin.com" value="{{ old('email') }}" required autofocus>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold small text-secondary">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" name="password" class="form-control border-start-0" placeholder="••••••••" required>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember" checked>
                    <label class="form-check-label small text-muted" for="remember">Remember me</label>
                </div>
            </div>

            <button type="submit" class="btn btn-login">
                <i class="fa-solid fa-right-to-bracket me-2"></i> Log In
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-muted small text-decoration-none">
                <i class="fa-solid fa-arrow-left me-1"></i> Return to live website
            </a>
        </div>
    </div>
</body>

</html>
