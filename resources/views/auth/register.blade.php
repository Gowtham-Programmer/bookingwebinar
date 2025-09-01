<x-guest-layout>
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
</x-guest-layout>