{{-- resources/views/webinar-details.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $webinar->title }} - Webinar Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f7f9fc;
            font-family: Arial, sans-serif;
        }

        .webinar-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .join-btn {
            background: #28a745;
            color: white;
            font-weight: bold;
        }

        .join-btn:hover {
            background: #218838;
        }

        .back-btn {
            background: #6c757d;
            color: white;
        }

        .back-btn:hover {
            background: #5a6268;
        }

        .webinar-header {
            background: #007bff;
            color: white;
            padding: 15px 25px;
            border-radius: 10px 10px 0 0;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <!-- Header -->
        <div class="webinar-header">
            <h2 class="mb-0">{{ $webinar->title }}</h2>
        </div>

        <!-- Webinar Details Card -->
        <div class="webinar-card mt-0">
            <p class="text-muted">{{ $webinar->description }}</p>

            <p><strong>📅 Date:</strong> {{ \Carbon\Carbon::parse($webinar->date)->format('d M Y') }}</p>
            <p><strong>⏰ Time:</strong> {{ date('h:i A', strtotime($webinar->time)) }}</p>

            @php
                $webinarDateTime = \Carbon\Carbon::parse($webinar->date . ' ' . $webinar->time);
                $now = \Carbon\Carbon::now();
            @endphp

            @if($webinarDateTime->isPast())
                <span class="badge bg-secondary">✅ Completed</span>
            @elseif($webinar->link)
                <a href="{{ $webinar->link }}" class="btn join-btn px-4" target="_blank">🎥 Join Webinar</a>
            @else
                <span class="text-muted">🔗 Join link coming soon</span>
            @endif

            <hr>

            <a href="{{ route('webinars.index') }}" class="btn back-btn">⬅ Back to All Webinars</a>
        </div>
    </div>
    @if(!Auth::check())
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            <span>Please <a href="{{ route('login') }}" class="fw-bold text-decoration-underline">login</a> to book this
                webinar.</span>
        </div>
    @else
        @php
            $alreadyBooked = \App\Models\WebinarBooking::where('user_id', Auth::id())
                ->where('webinar_id', $webinar->id)
                ->exists();
        @endphp

        @if($alreadyBooked)
            <div class="alert alert-info d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                ✅ You have already booked this webinar.
            </div>
        @else
        @endif
    @endif

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>