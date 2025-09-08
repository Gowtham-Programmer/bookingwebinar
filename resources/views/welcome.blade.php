<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <title>Gowtham's Portfolio</title>
</head>

<body id="bg-img">
<header>
    <div class="menu-btn">
        <div class="btn-line half start"></div>
        <div class="btn-line"></div>
        <div class="btn-line half end"></div>
    </div>

    <nav class="menu">
        <div class="menu-brand">
            <div class="portrait" style="background-image: url('{{ asset('uploads/img/welcome.jpeg') }}');
                                        width: 300px;
                                        height: 300px;
                                        background-size: cover;
                                        background-position: center;
                                        border-radius: 50%;">
            </div>
        </div>
        <ul class="menu-nav">
            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link active">Home</a></li>
            <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About Me</a></li>
            <li class="nav-item"><a href="work.html" class="nav-link">My Work</a></li>
            <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact Me</a></li>
        </ul>
    </nav>
</header>

<main id="home">
    <h1 class="lg-heading">Welcome to <span class="text-secondary">Webinar Content</span></h1>
    <h2 class="sm-heading">Web Developer</h2>

    <div class="icons">
        <a href="#"><i class="fab fa-github fa-2x"></i></a>
        <a href="https://x.com/home"><i class="fa-brands fa-x-twitter fa-2x"></i></a>
        <a href="https://www.instagram.com/"><i class="fab fa-instagram fa-2x"></i></a>
        <a href="#"><i class="fab fa-linkedin fa-2x"></i></a>
    </div>

    <div class="auth-section mt-3">
        <br>
        <a href="{{ url('/login') }}">Login</a>
        <p class="mt-2">Not registered? <a href="{{ url('/register') }}" class="text-decoration-none">Click here to register</a></p>
    </div>
</main>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font Awesome JS -->
<script src="https://kit.fontawesome.com/980a2af8f9.js" crossorigin="anonymous"></script>

<!-- Your Custom JS -->
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
