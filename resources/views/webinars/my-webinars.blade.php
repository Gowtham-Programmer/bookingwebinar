<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>🎥 My Booked Webinars</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--  Custom Styles -->
    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .card {
            border-radius: 10px;
            overflow: hidden;
        }
        .table-hover tbody tr:hover {
            background: #eef3ff;
        }
        .join-btn {
            transition: 0.3s ease;
        }
        .join-btn:hover {
            background-color: #0d6efd !important;
            color: #fff;
            transform: scale(1.05);
        }
        .back-btn {
            background: #6c757d;
            color: white;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }
        .back-btn:hover {
            background: #5a6268;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <!-- <a href="{{ route('webinars.index') }}" class="btn btn-primary mb-4">⬅️ Back</a> -->
     <a href="{{ url()->previous() }}" class="btn btn-secondary mb-4">⬅️ Back</a>



    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">🎥 My Booked Webinars</h2>
        </div>
        <div class="card-body">
            
            {{--  Check if Bookings Exist --}}
            @if($bookings->isEmpty())
                <div class="alert alert-info">
                    You haven’t booked any webinars yet. 
                    <a href="{{ route('webinars.index') }}" class="alert-link">Browse webinars</a>
                </div>
            @else
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td class="fw-bold">{{ $booking->webinar->title }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->webinar->date)->format('d M, Y') }}</td>
                                <td>{{ date('h:i A', strtotime($booking->webinar->time)) }}</td>
                                <td>
                                    <a href="{{ $booking->webinar->link }}" target="_blank" 
                                       class="btn btn-success btn-sm join-btn">
                                       🔗 Join Webinar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!--  Custom JS -->
<script>
document.addEventListener("DOMContentLoaded", function(){
    console.log(" Page Loaded Successfully!");
    // Example: Animate table on load
    document.querySelector(".table")?.classList.add("animate__fadeIn");
});
</script>

</body>
</html>
