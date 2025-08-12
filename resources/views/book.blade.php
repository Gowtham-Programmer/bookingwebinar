hi;{{ $webinar->title }}    {{ die('This is a test.') }}
    <div class="card shadow-sm mt-4">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0"><i class="bi bi-calendar-check"></i> Book Your Webinar</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('book', $webinar->id) }}" method="POST">
            @csrf

            {{-- First Name --}}
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="first_name" 
                       class="form-control" 
                       value="{{ Auth::check() ? Auth::user()->name : old('first_name') }}" 
                       required>
            </div>

            {{-- Surname --}}
            <div class="mb-3">
                <label class="form-label">Surname</label>
                <input type="text" name="surname" 
                       class="form-control" 
                       value="{{ old('surname') }}" 
                       placeholder="Enter your surname" 
                       required>
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" 
                       class="form-control" 
                       value="{{ Auth::check() ? Auth::user()->email : old('email') }}" 
                       required>
            </div>

            {{-- Phone --}}
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" 
                       class="form-control" 
                       value="{{ old('phone') }}" 
                       placeholder="Enter your phone number" 
                       required>
            </div>

            {{-- Submit --}}
            <div class="text-end">
                <button class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Confirm Booking
                </button>
            </div>
        </form>
    </div>
</div>
    @endif
@endif

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
