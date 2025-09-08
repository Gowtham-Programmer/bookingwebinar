<section>
    <div class="row">
        <div class="col-md-6">
            <div>
                <div class="card-body">
                    <h4 class="text-danger fw-bold">{{ __('Delete Account') }}</h4>
                    <p class="text-muted small">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please download any data you wish to keep.') }}
                    </p>

                    <!-- Delete Account Button -->
                    <button type="button" class="btn btn-danger fw-bold" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete Account Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
            <div class="modal-header">
                <h5 class="modal-title text-danger fw-bold" id="deleteAccountModalLabel">{{ __('Confirm Account Deletion') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted small">
                    {{ __('Please enter your password to confirm you want to permanently delete your account.') }}
                </p>

                <form method="POST" action="{{ route('profile.destroy') }}" id="deleteAccountForm">
                    @csrf
                    @method('delete')

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input type="password" id="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="{{ __('Enter your password') }}" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="submit" form="deleteAccountForm" class="btn btn-danger fw-bold">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </div>
    </div>
</div>
