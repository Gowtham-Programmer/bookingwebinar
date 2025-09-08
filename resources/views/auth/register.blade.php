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

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg rounded-4" style="width: 100%; max-width: 450px;">
            <div class="card-body p-5">
                <!-- Title -->
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-dark">Create an Account</h2>
                    <p class="text-muted">Join us and get started today!</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                            autocomplete="name" class="form-control rounded-3 @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            autocomplete="username" class="form-control rounded-3 @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input type="password" id="password" name="password" required autocomplete="new-password"
                            class="form-control rounded-3 @error('password') is-invalid @enderror">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            autocomplete="new-password" class="form-control rounded-3">
                    </div>
                    <!-- Submit Button -->
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-success rounded-3 py-2 fw-bold">
                            {{ __('Register') }}
                        </button>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between align-items-center">
                        {{ __('Already registered?') }}
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2 rounded-3">
                            {{ __('Login') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>