<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

  <title>Gowtham's Portfolio</title>
</head>

<body class="bg-light">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">Gowtham</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="{{ url('/') }}" class="nav-link active">Home</a></li>
        <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About Me</a></li>
        <li class="nav-item"><a href="{{ url('/work') }}" class="nav-link">My Work</a></li>
        <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact Me</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<header class="bg-dark text-white text-center py-5">
  <div class="container">
    <img src="{{ asset('uploads/img/welcome.jpeg') }}" 
         alt="Portrait" 
         class="rounded-circle mb-3 shadow"
         width="200" height="200">
    <h1 class="display-4">Welcome to <span class="text-warning">Webinar Content</span></h1>
    <p class="lead">Web Developer</p>
    <div class="d-flex justify-content-center gap-3">
      <a href="#" class="text-white"><i class="fab fa-github fa-2x"></i></a>
      <a href="https://x.com/home" class="text-white"><i class="fa-brands fa-x-twitter fa-2x"></i></a>
      <a href="https://www.instagram.com/" class="text-white"><i class="fab fa-instagram fa-2x"></i></a>
      <a href="#" class="text-white"><i class="fab fa-linkedin fa-2x"></i></a>
    </div>
  </div>
</header>

<!-- Auth Section -->
<section class="py-5">
  <div class="container text-center">
    <a href="{{ url('/login') }}" class="btn btn-primary btn-lg">Login</a>
    <p class="mt-3">Not registered? <a href="{{ url('/register') }}" class="fw-bold">Click here to register</a></p>
  </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
  <p class="mb-0">&copy; 2025 Gowtham's Portfolio. All rights reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
