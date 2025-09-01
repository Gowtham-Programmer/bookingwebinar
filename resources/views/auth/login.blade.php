{{-- resources/views/auth/login.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-10 space-y-6">
        <!-- Title -->
        <div class="text-center">
            <h1 class="text-3xl font-bold text-gray-800">Welcome Back 👋</h1>
            <p class="text-gray-500 mt-2">Login to continue to your account</p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" class="form-control" required autofocus>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" class="form-control" required>
            </div>

            <!-- Remember + Forgot -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                    <label class="form-check-label" for="remember_me">Remember me</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-indigo-600 text-sm">Forgot password?</a>
            </div>

            <!-- Submit -->
            <div>
                <button type="submit" class="btn btn-primary w-100">Log in</button>
            </div>

            <!-- Divider -->
            <div class="d-flex align-items-center my-3">
                <hr class="flex-grow border-gray-300">
                <span class="mx-2 text-gray-400">OR</span>
                <hr class="flex-grow border-gray-300">
            </div>

            <!-- Social Login -->
            <div class="d-flex gap-2">
                <!-- <a href="https://www.facebook.com/" class="btn btn-primary flex-grow">Facebook</a> -->
                <!-- <a href="https://mail.google.com/mail" class="btn btn-danger flex-grow">Google</a> -->
                <a href="{{ route('google.login') }}" class="btn btn-danger w-100">
                    <i class="bi bi-google"></i> Login with Google
                </a>
            </div>

            <!-- Register -->
            <p class="text-center text-sm text-gray-600 mt-4">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-indigo-600">Sign up</a>
            </p>
        </form>
    </div>

</body>

</html>