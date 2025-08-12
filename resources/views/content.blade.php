<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Marketing Agency</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background: linear-gradient(#ff7a18, #ffb347); */
            font-family: 'Arial', sans-serif;
            color: #fff;
            margin: 0;
            height: 100vh;
            /* Full viewport height */
            display: flex;
            /* Enable flexbox */
            justify-content: center;
            /* Center horizontally */
            align-items: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .hero-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 60px 40px;
            background: linear-gradient(#ff7a18, #ffb347);
        }

        .hero-title {
            font-size: 5rem;
            font-weight: 1000;
            line-height: 1.1;
            text-transform: uppercase;
        }

        .hero-title span {
            display: block;
        }

        .vertical-dots {
            border-left: 3px dotted #fff;
            height: 50px;
            margin: 20px 0;
        }

        .btn-cta {
            background: #fff;
            color: #ff7a18;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-cta:hover {
            background: #ffe1c1;
        }

        .hero-image img {
            max-width: 400px;
            border-radius: 10px;
        }

        .logo img {
            max-height: 300px;
        }
    </style>
</head>

<body>
    <div class="container hero-section">
        <div class="hero-content">
            <div class="logo mb-3">
                <img src="{{ asset('/uploads/img/logo.jpg') }}" alt="Company Logo">
            </div>

            <h1 class="container hero-title">
                <span> Digital</span>
                <span style="color:#fff200;"> Marketing</span>
                <span>Agency</span>
            </h1>

            <!-- Register Button -->
        <form action="{{ route('webinars.book', $webinar->id) }}" method="POST">
            @if(isset($webinar))
                <div style="margin-top:15px; font-size:18px; color:#fff;">
                    <p><strong>📅 Date:</strong> {{ \Carbon\Carbon::parse($webinar->date)->format('d M Y') }}</p>
                    <p><strong>⏰ Time:</strong> {{ date('h:i A', strtotime($webinar->time)) }}</p>
                </div>
            @endif

            @csrf
            <a href="{{ route('book.create', $webinar->id) }}" class="btn btn-success">
    Book This Webinar
</a>
            <!-- Webinar Date and Time -->
        </form>

            <div class="vertical-dots"></div>

            <h3>Grow & nurture the ideas you have.</h3>
            <p><strong>322-517-4946</strong></p>
            <a href="{{ route('contact') }}" class="btn-cta">CONTACT US</a>
        </div>
        <div class="hero-image">
            <img src="{{ asset('/uploads/img/webinar-banner.jpg') }}" alt="Marketing Expert">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>