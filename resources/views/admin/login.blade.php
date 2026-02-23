<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Dinle.tm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'DM Sans', sans-serif; background: #0f0f0f; color: #fff;
            min-height: 100vh; display: flex; align-items: center; justify-content: center;
            background-image: radial-gradient(ellipse 60% 50% at 50% 0%, rgba(29,185,84,0.15) 0%, transparent 70%);
        }
        .login-box { width: 100%; max-width: 400px; padding: 2.5rem; background: #181818; border-radius: 16px; border: 1px solid #282828; }
        .logo { font-size: 1.5rem; font-weight: 900; color: #1db954; margin-bottom: 0.25rem; }
        .logo span { color: #fff; }
        .subtitle { font-size: 0.875rem; color: #b3b3b3; margin-bottom: 2rem; }
        label { display: block; font-size: 0.75rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.08em; color: #b3b3b3; margin-bottom: 6px; }
        input[type=email], input[type=password] {
            width: 100%; background: #282828; border: none; border-radius: 8px;
            padding: 0.75rem 1rem; color: #fff; font-size: 0.9375rem; outline: none;
            transition: background 0.15s; margin-bottom: 1.25rem; font-family: inherit;
        }
        input:focus { background: #333; outline: 2px solid #1db954; outline-offset: -2px; }
        .btn-login { width: 100%; background: #1db954; color: #000; border: none; border-radius: 500px; padding: 0.75rem; font-size: 0.9375rem; font-weight: 700; cursor: pointer; transition: background 0.15s; margin-top: 0.5rem; }
        .btn-login:hover { background: #1ed760; }
        .error { background: #3a1a1a; color: #fc8181; border-radius: 8px; padding: 0.75rem 1rem; font-size: 0.875rem; margin-bottom: 1.25rem; border: 1px solid #e53e3e; }
        .remember { display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1rem; font-size: 0.875rem; color: #b3b3b3; cursor: pointer; }
        .remember input { width: auto; margin: 0; accent-color: #1db954; }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="logo">dinle<span>.tm</span></div>
        <div class="subtitle">Admin Panel</div>

        @if($errors->any())
            <div class="error"><i class="bi bi-exclamation-circle me-1"></i>{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.store') }}">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="admin@dinle.tm" required autofocus>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>
            <label class="remember">
                <input type="checkbox" name="remember"> Remember me
            </label>
            <button type="submit" class="btn-login">Sign In</button>
        </form>
    </div>
</body>
</html>